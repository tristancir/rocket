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
    protected $signature = 'grab:post {--rand=} {--dryrun}';

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
        if ( ! empty($this->option('rand')) ) {
            $percent = $this->option('rand');
            // $this->line($percent);
            $rand = mt_rand(1, 100);
            // $this->line("fire {$rand} <= {$percent}");
            if ( $percent > 1 && $percent < 100 && $rand <= $percent ) {
                if ( $this->option('dryrun') ) {
                    $this->line("fire {$rand} <= {$percent}");
                } else {
                    $post = $grabber->postNext($channelId);
                }
            }
        } else {
            if ( $this->option('dryrun') ) {
                $this->line('fire all');
            } else {
                $post = $grabber->postNext($channelId);
            }
        }

        // dd($post->toArray());
    }
}
