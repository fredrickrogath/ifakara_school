<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class trashClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trashClear:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear trash monthly';

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
        \Log::info("Trash cleaner is working fine!");

        \App\Models\Invoice::where('deleted_at', '<', Carbon::now()->subDays(29))->forceDelete();
        \App\Models\Tool::where('deleted_at', '<', Carbon::now()->subDays(29))->forceDelete();

        event(new \App\Events\NewPostPublished('created'));

        return 'Trash cleared successfully';

        // addMinute()
        // return 0;
    }
}
