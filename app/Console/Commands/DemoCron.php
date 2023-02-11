<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Events\NewPostPublished;

class DemoCron extends Command
{
    //1: CREATIND NEW CRON JOB COMMAND
    // php artisan make:command DemoCron --command=demo:cron

    //2: RUN SCHEDULE LOCALLY
    // php artisan schedule:work

    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

        \Event::dispatch(new NewPostPublished('fredrick shayo'));

        // event(new App\Events\NewPostPublished('fredrick shayo'));
        // return 0;
    }
}
