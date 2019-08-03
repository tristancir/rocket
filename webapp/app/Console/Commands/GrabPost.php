<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GrabPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grab:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $grabber =  new \TristanRock\PostGrabber;
        $channelId = 1;
        if ( mt_rand(1, 10) <= 4 ) {
            $post = $grabber->postNext($channelId);
        }
        

        // dd($post->toArray());

    }
}
