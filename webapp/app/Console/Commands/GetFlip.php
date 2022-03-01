<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\{Flip, FlipItem};

class GetFlip extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flip:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get a flip and all its content';

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
        $flip = Flip::where('name', 'jo')->first();
        $items = $flip->items;
        // dd($items);
        if ( $items ) {
            foreach ( $items as $item ) {
                $this->line((string)$item->content);
                // $this->line($item->content);
            }
        }
        return 0;
    }
}
