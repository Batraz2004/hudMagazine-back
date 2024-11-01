<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\SlugHelper;

class fillSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SlugHelper::addedSlugToCategory();
        //return Command::SUCCESS;
    }
}
