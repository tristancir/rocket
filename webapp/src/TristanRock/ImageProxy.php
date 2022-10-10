<?php
namespace TristanRock;
use App\Models\ChannelPost;
use App\Models\FileCache;
use Illuminate\Support\Facades\{File, Http, Log};

// use TristanRock\ImageProxy;
// \TristanRock\ImageProxy::link($id)

class ImageProxy
{
    public static function src($url)
    {
        $me = new static;
        $f = $me->fetchUrl($url);
        return $f->link;
        $headers = [
            // 'Access-Control-Allow-Origin' => '*'
            'X-Rocket-Element' => $f->id
        ];
        if ( isset($contentType) ) {
            $headers['Content-Type'] = $contentType;
        }
        if ( isset($contentLength) ) {
            $headers['Content-Length'] = $contentLength;
        }        
        $pathToFile = $f->pathToFile ;
        $contentType = $f->contentType;
        $contentLength = $f->contentLength;

        return response()->file($pathToFile, $headers);
    }

    public function fetchCachedId($id)
    {
        $fileCache = FileCache::where('id', $id)->first();
        return $this->fetchUrl($fileCache);
    }

    //$url, $model=null)
    public function fetchUrl($arg)
    {
        $fileCache = null;
        if ( is_string($arg) ) {
            $url = $arg;
            $cacheFile = md5($url);
            $fileCache = FileCache::where('file', $cacheFile)->first();
        } elseif ( $arg instanceof FileCache ) {
            $fileCache = $arg;
            $url = $fileCache->url;
            $cacheFile = md5($url);
        } else {
            throw new \Exception("Unknown");
        }
        $pathToFile = storage_path('/urlcache/' . $cacheFile);
        if ( ! $fileCache ) {
            $id = FileCache::insertGetId(
                [
                    'url' => $url,
                    'file' => $cacheFile
                ]
            );
            $fileCache = FileCache::find($id);
            $meta = null;
            $needMeta = true;

        } else {
            $id = $fileCache->id;
            $meta = json_decode($fileCache->meta);
            $needMeta = ! $meta;

        }
        $needContent = ! file_exists($pathToFile);
        $response = null;
        $contentType = null;
        $contentLength = null;
        if ( $needContent || $needMeta ) {
            if ( ! $needContent ) {
                $response = Http::withOptions(['verify' => false])->timeout(10)->head($url);
                if ( $response->status() == 405 ) {
                    Log::info("HEAD failed. Downloading content to get content-type for {$url}");
                    $response = Http::withOptions(['verify' => false])->timeout(10)->get($url);
                }
            } else {
                Log::info("Downloading content to save file for {$url}");
                $response = Http::withOptions(['verify' => false])->timeout(10)->get($url);
            }
            $contentLength = $response->header('Content-Length');
            $contentType = $response->header('Content-Type');
            if ( $needContent ) {
                Log::info("Writing file {$cacheFile} for {$url}");
                file_put_contents($pathToFile, $response->body());
            }
            // Update content type in the database if needed.
            if ( $needMeta || ! isset($meta->{'Content-Type'}) ) {
                if ( ! $meta ) {
                    $meta = (object)['Content-Type' => $contentType];
                } else {
                    $meta->{'Content-Type'} = $contentType;
                }
                $fileCache->meta = json_encode($meta);
                $fileCache->save();
            }
        }
        if ( preg_match('/^image\/(.*)/', $contentType, $matches) ) {
            $ext = '.' . $matches[1];
        } else {
            $ext = null;
        }
        $link = "/content/httpget/cache/{$id}{$ext}";

        return (object)compact('id', 'link', 'url', 'ext', 'response', 'cacheFile', 'pathToFile', 'contentType','contentLength');
    }

    public static function link($id)
    {
        $proxy = new static;
        $result = $proxy->fetchId($id);
        return optional($result)->link;
    }
    
    public function fetchId($id)
    {
        $post = ChannelPost::where('channel_post_id', $id)->first();
        if ( ! $post ) {
            return null;
        }
        try {
            $url = $post->content;
            // $id = preg_replace('/^([^.]+)\.(.*)/', '\1', $id);
            $meta = json_decode($post->meta);
            $cacheFileName = md5($url);
            $pathToFile = storage_path('/images/' . $cacheFileName);

            $needContent = ! file_exists($pathToFile);
            $needMeta = ! $meta;
            $response = null;
            $contentType = null;
            $contentLength = null;
            if ( $needContent || $needMeta ) {
                // Might be able to send a HEAD request here just to get the headers
                // Then only request the content if we need it.
                // Sometimes the HEAD request fails and we need to get the content anyway
                // even though all we want is the content-type.

                if ( ! $needContent ) {
                    $response = Http::withOptions(['verify' => false])->timeout(10)->head($url);
                    if ( $response->status() == 405 ) {
                        Log::info("HEAD failed. Downloading content to get content-type for {$url}");
                        $response = Http::withOptions(['verify' => false])->timeout(10)->get($url);
                    }
                } else {
                    Log::info("Downloading content to save file for {$url}");
                    $response = Http::withOptions(['verify' => false])->timeout(10)->get($url);
                }
                
                // $response = Http::withHeaders([
                //     'Referer' => 'https://newtumbl.com/dashboard'
                // ])->get($url);
                $contentLength = $response->header('Content-Length');
                $contentType = $response->header('Content-Type');
                if ( $needContent ) {
                    Log::info("Writing file {$cacheFileName} for {$url}");
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
            $link = "/content/httpget/{$id}{$ext}";

            return (object)compact('link', 'url', 'ext', 'response', 'cacheFileName', 'pathToFile', 'contentType','contentLength');

        } catch ( \Exception $e ) {

        }
    }
}