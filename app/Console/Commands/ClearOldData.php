<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ClearOldData extends Command
{
    protected $signature   = 'clear:reserve-seat';
    protected $description = 'Delete reserve seat data from the table.';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Calculate the date and time 5 minutes ago
        $fiveMinutesAgo = Carbon::now()->subMinutes(5);

        // Replace 'your_table_name' with the name of your table
        DB::table('reserve_seats')->where('created_at', '<', $fiveMinutesAgo)->delete();

        $this->info('Seat has been deleted.');
    }
}
