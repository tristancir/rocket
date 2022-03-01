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
    protected $signature = 'image:get {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets an image';

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

        try {
            $id = $this->argument('id');
            $post = ChannelPost::where('channel_post_id', $id)->first();
            $url = $post->content;
            $this->line(urlencode($url));
            $response = Http::withOptions(['verify' => false])->timeout(5)->get($url);
            dump($response);
            if ( $response->status() != 200 ) {

            }
            $this->line(sprintf('%3d %5d  %s', $response->status(), $id, $url));
        } catch ( \Illuminate\Database\Eloquent\ModelNotFoundException $e ) {
            $this->error("Post $id not found in database.");
        } catch ( \Illuminate\Http\Client\ConnectionException $e ) {
            $this->line(sprintf('%3d %5d  %s', self::TIMEOUT, $id, $url));
        } catch ( \GuzzleHttp\Exception\RequestException $e ) {
            $this->line(sprintf('%3d %5d  %s', self::GUZZLE, $id, $url));
        }
        

        // Storage::disk('thumbnails')->put('file.txt', 'Contents');
        return 0;
    }
}
