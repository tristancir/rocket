<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TristanRock\PostGrabber;
use App\Models\ChannelPost;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    /**
     *
     * Put a comment here.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function random(Request $request, $rand)
    {
        // $input = $request->input()
        $postsText = (new PostGrabber)->getRandomText($rand);
        // return ['message' => 'ok'];
        return response($postsText, 200)->header('Content-Type', 'text/plain');;
    }
    /**
     *
     * Put a comment here.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function randomView(Request $request, $rand)
    {
        // $input = $request->input()
        $posts = (new PostGrabber)->getRandom($rand);
        
        return view('feed.random', compact('posts', 'rand'));
    }

    /**
     *
     * Put a comment here.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $input = $request->input();
        $rand = $input['rand'] ?? 6;
        $filtered = array_filter(array_keys($input), function($item){
            return preg_match('/^remove-.*/', $item);
        });
        // dd($filtered);
        $list = array_map(function($item){
            return str_replace('remove-', '', $item);
        }, $filtered);
        // dd($list);
        ChannelPost::whereIn('channel_post_id', $list)->update(['is_removed' => true]);
        // Log::debug(print_r($posts->count(), true));
        return redirect("/view/random/{$rand}");
    }
}
