<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use TristanRock\PostGrabber;
use App\ChannelPost;
use App\{Flip,FlipItem};
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;


class ContentController extends Controller
{
    /**
     *
     * Show the form to create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $input = $request->input()
        return view('content.media-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flip = new FlipItem;
        $flip->content = $request->url;
        $flip->comments = $request->comments;
        $flip->flip_id = 1;
        $flip->posted_at = NOW();
        $flip->save();
        return redirect()->route('content.create');
    }


    /**
     *
     * Put a comment here.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function media(Request $request, $x)
    {
        // dd($x);
        // $input = $request->input()
        $content = (new \TristanRock\ImageSet)->get($x);

        return response($content, 200)->header('Content-Type', 'text/plain');
    }

    public function mediaView($x)
    {
        $content = (new \TristanRock\ImageSet)->get($x);
        return view('content.media-view', ['content' => explode("\n", $content)]);
    }

    public function httpgetUrl($url)
    {
        $response = Http::get(urldecode($url));
        return response($response->body)
            ->header('Content-Type', 'image/jpeg');
    }

    public function httpgetId(Request $request, $id)
    {
        $id = preg_replace('/^([^.]+)\.(.*)/', '\1', $id);
        $post = ChannelPost::where('channel_post_id', $id)->first();
        $url = $post->content;
        $tempFile = md5($url);
        $pathToFile = storage_path('/images/' . $tempFile);
        if ( ! file_exists($pathToFile) ) {
            $response = Http::withHeaders([
                'Referer' => 'https://newtumbl.com/dashboard'
            ])->get($url);
            $contentLength = $response->header('Content-Length');
            $contentType = $response->header('Content-Type');
            file_put_contents($pathToFile, $response->body());
            $meta = json_decode($post->meta);
            // Update content type in the database if needed.
            if ( ! $meta || ! isset($meta->{'Content-Type'}) ) {
                if ( ! $meta ) {
                    $meta = (object)['Content-Type' => $contentType];
                } else {
                    $meta->{'Content-Type'} = $contentType;
                }
                $post->meta = json_encode($meta);
                $post->save();
            }
        } else {
            $meta = json_decode($post->meta);
            $contentType = $meta->{'Content-Type'} ?? null;
        }
        // Save temp
        $headers = [
            // 'Access-Control-Allow-Origin' => '*'
            'X-Rocket-Element' => $id
        ];
        if ( isset($contentType) ) {
            $headers['Content-Type'] = $contentType;
        }
        if ( isset($contentLength) ) {
            $headers['Content-Length'] = $contentLength;
        }        
        
        return response()->file($pathToFile, $headers);
    
        // return response($response->body())
        //     ->header('Content-Type', $contentType)
        //     ->header('Content-Length', $contentLength)
        //     ;
    }
}
