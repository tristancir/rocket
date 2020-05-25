<?php
namespace TristanRock;
use App\Channel;
use App\ChannelPost;
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
}