<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TristanRock\PostGrabber;
use App\ChannelPost;
use App\{Flip,FlipItem};
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

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
        $post = ChannelPost::where('channel_post_id', $id)->first();
        $url = $post->content;
        $response = Http::get($url);
        $contentLength = $response->header('Content-Length');
        return response($response->body())
            ->header('Content-Type', 'image/jpeg')
            ->header('Content-Length', $contentLength)
            ->header('Access-Control-Allow-Origin', '*')
            ;
    }


}