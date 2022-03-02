<?php
namespace TristanRock;
use App\ChannelPost;
use Illuminate\Support\Facades\{File, Http, Log};

// use TristanRock\ImageProxy;
// \TristanRock\ImageProxy::link($id)

class ImageProxy
{
    
    public static function link($id)
    {
        $proxy = new static;
        return $proxy->makeLink($id);
    }

    public function makeLink($id)
    {
        try {
            // $id = preg_replace('/^([^.]+)\.(.*)/', '\1', $id);
            $post = ChannelPost::where('channel_post_id', $id)->first();
            if ( ! $post ) {
                return null;
            }
            $url = $post->content;
            $meta = json_decode($post->meta);
            $tempFile = md5($url);
            $pathToFile = storage_path('/images/' . $tempFile);

            $needContent = ! file_exists($pathToFile);
            $needMeta = ! $meta;

            if ( $needContent || $needMeta ) {
                // Might be able to send a HEAD request here just to get the headers
                // Then only request the content if we need it.
                // Sometimes the HEAD request fails and we need to get the content anyway
                // even though all we want is the content-type.

                if ( ! $needContent ) {
                    $response = Http::withOptions(['verify' => false])->timeout(10)->head($url);
                    if ( $response->status() == 405 ) {
                        $response = Http::withOptions(['verify' => false])->timeout(10)->get($url);
                    }
                } else {
                    $response = Http::withOptions(['verify' => false])->timeout(10)->get($url);
                }

                // $response = Http::withHeaders([
                //     'Referer' => 'https://newtumbl.com/dashboard'
                // ])->get($url);
                $contentLength = $response->header('Content-Length');
                $contentType = $response->header('Content-Type');
                if ( $needContent ) {
                    file_put_contents($pathToFile, $response->body());
                }
                // Update content type in the database if needed.
                if ( $needMeta || ! isset($meta->{'Content-Type'}) ) {
                    if ( ! $meta ) {
                        $meta = (object)['Content-Type' => $contentType];
                    } else {
                        $meta->{'Content-Type'} = $contentType;
                    }
                    $post->meta = json_encode($meta);
                    $post->save();
                }
            } else {
                $contentType = $meta->{'Content-Type'} ?? null;
            }
            if ( preg_match('/^image\/(.*)/', $contentType, $matches) ) {
                $ext = '.' . $matches[1];
            } else {
                $ext = null;
            }

            return "/content/httpget/{$id}{$ext}";

        } catch ( \Exception $e ) {

        }

    }
}