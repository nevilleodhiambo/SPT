<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class sayNeville extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sayHi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('hi');
        $project = Project::pluck('title');
        $this->info($project);
    }
}
