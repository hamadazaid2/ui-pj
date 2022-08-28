<?php

namespace App\Console\Commands;

use App\Models\User;
use DateTime;
use Illuminate\Console\Command;

class expirnation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire user every 6 minute'; // الغاء تفعيل حساب المشترك كل 5 دقائق

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('expired', 0)->get(); // RETRIVE ALL USERS THERE ACCOUNT ARE ACTIVE

        
        foreach ($users as $user) {
            $todaysDate = $user->created_at;
            $subscriptionDate = date('Y-m-d');
            $datetime1 = new DateTime($subscriptionDate);
            $datetime2 = new DateTime($todaysDate);
            $interval = $datetime2->diff($datetime1);
            $days = $interval->format('%a'); //now do whatever you like with $days
            // return $days;
            if ($days >= 31) {
                $user->update(['expired' => 1]);
                return 1;
            } else {
                # DO NOT DO ANYTHING
                return 0;
            }
        }
    }
}
