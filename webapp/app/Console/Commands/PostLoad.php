<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PostLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:load {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads posts';

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
        $loader = new \TristanRock\PostLoader;
        $loader->loadFromFile($this->argument('file'));
    }
}
