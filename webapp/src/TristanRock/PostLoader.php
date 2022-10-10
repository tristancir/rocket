<?php
namespace TristanRock;
use App\Models\Channel;
use App\Models\ChannelPost;
use Carbon\Carbon;

// new \TristanRock\PostLoader
class PostLoader
{
    protected $channelId = 1;
    public function loadFromFile(string $filename)
    {
        try {
            $fp = fopen($filename, 'r');
            if ( ! $fp ) {
                throw new \Exception("Unable to open file {$filename}");
            }
            while ( $line = fgets($fp) ) {
                $this->insertChannelPost($line);
            }
            fclose($fp);
        } catch ( \Exception $e ) {
            return false;
        }
    }

    public function insertChannelPost($content)
    {
        $trimmedContent = trim($content);
        if ( empty($trimmedContent) ) {
            return;
        }
        $post = new ChannelPost;
        $post->channel_id = $this->channelId;
        $post->content = $trimmedContent;
        $post->save();
    }
}