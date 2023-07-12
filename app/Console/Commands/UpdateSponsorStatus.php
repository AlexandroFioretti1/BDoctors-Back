<?php

namespace App\Console\Commands;

use App\Models\Profile;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateSponsorStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:sponsor-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
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
        $profiles = Profile::all();
        $now = Carbon::now()->addHours(2);
        $currentDateTime = $now->toDateTimeString();
        DB::table('profile_sponsor')
            ->where('end_time', '<', $currentDateTime)
            ->delete();

        foreach ($profiles as $profile) {


            Log::info("Tipo di dato di end_date: " . $currentDateTime);


            if ($profile->sponsors()->count() === 0) {

                $profile->isSponsored = 0;
                $profile->update();
            } else {
                $profile->isSponsored = 1;
                $profile->update();
            }
        }

        return Command::SUCCESS;
    }
}
