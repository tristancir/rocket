<?php
namespace TristanRock;
use App\Models\Channel;
use App\Models\ChannelPost;
use Ryantxr\Discord\Webhook\Client;
use Carbon\Carbon;

class PostGrabber
{
    public function getNext($channelId)
    {
        $post = ChannelPost::where([['posted_at', null],['channel_id', $channelId]])->with('channel')->limit(1)->first();
        return $post;
    }

    public function postNext($channelId)
    {
        $post = $this->getNext($channelId);
        if ( $post ) {
            $this->postToChannel($post);
            $this->updatePost($post);
        }
    }

    public function postToChannel(ChannelPost $post)
    {
        $client = new Client($post->channel->webhook);
        $client->message($post->content);
    }
    public function updatePost(ChannelPost $post)
    {
        $post->update(['posted_at' => Carbon::now()]);
    }

    public function getRandomText($limit)
    {
        $posts = $this->getRandom($limit);
        $text = '';
        foreach ( $posts as $post ) {
            
            $text .= $post->content . "\n";
        }
        return $text;
    }

    public function getRandom($limit)
    {
        $channelId = 1;
        $count = ChannelPost::count();
        if ( $count == 0 ) return '';
        $posts = [];
        $list = [];
        $n = 0;
        while ( count($posts) < $limit && $n < 1000 ) {
            ++$n;
            $id = mt_rand(1, $count);
            if ( in_array($id, $list) ) {
                continue;
            }
            $row = ChannelPost::where([['channel_id', $channelId], ['channel_post_id', $id], ['is_removed', 0]])->with('channel')->first();
            if ( $row ) {
                $posts[] = $row;
                $list[] = $id;
            }
        }


        // $offset = mt_rand(0, $count - $limit); //
        // $posts = ChannelPost::where([['channel_id', $channelId]])->with('channel')->offset($offset)->limit($limit)->get();
        return $posts;
    }
}