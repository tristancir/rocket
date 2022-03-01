<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\{Http,Storage};
use App\ChannelPost;
use Carbon\Carbon;
class ImageCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks images to see if they are there`';

    const TIMEOUT = 9;
    const GUZZLE = 20;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ChannelPost::where([
            ['is_removed', '!=', 1],
            ['checked_at', null],
            ['http_status', null]
        ])
        ->orderBy('channel_post_id')->limit(10)
            ->chunk(10, function($posts) {
            foreach ( $posts as $post ) {
                try {

                    $response = Http::withOptions(['verify' => false])->timeout(5)->head($post->content);
                    if ( $response->status() == 405 ) {
                        $response = Http::withOptions(['verify' => false])->timeout(5)->get($post->content);
                    }
                    
                    $this->line(sprintf('%3d %5d  %s', $response->status(), $post->channel_post_id, $post->content));
                    $post->checked_at = Carbon::now();
                    $post->http_status = $response->status();
                    if ( in_array($post->http_status, [400, 403, 404]) ) {
                        $post->is_removed = 1;
                    }
                    $post->save();
                } catch ( \Illuminate\Http\Client\ConnectionException $e ) {
                    $this->line(sprintf('%3d %5d  %s', self::TIMEOUT, $post->channel_post_id, $post->content));
                    $post->checked_at = Carbon::now();
                    $post->http_status = self::TIMEOUT;
                    $post->error_msg = 'timeout: ' . $e->getMessage();
                    $post->is_removed = 1;
                    $post->save();
                } catch ( \GuzzleHttp\Exception\RequestException $e ) {
                    $this->line(sprintf('%3d %5d  %s', self::GUZZLE, $post->channel_post_id, $post->content));
                    $post->checked_at = Carbon::now();
                    $post->http_status = self::GUZZLE;
                    $post->error_msg = 'guzzle: ' . $e->getMessage();
                    $post->save();
                }
            }
        });

        // Storage::disk('thumbnails')->put('file.txt', 'Contents');
        return 0;
    }
}
