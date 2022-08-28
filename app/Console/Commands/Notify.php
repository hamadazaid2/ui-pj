<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send an email for users everyday.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $usersEmail = User::pluck('email')->toArray();
        $emailData = [
            'head' => 'Programming',
            'body' => 'This is an email for programming testing email notify'
        ];
        foreach($usersEmail as $email){
            //CODE for sending an email
            Mail::To($email)->send(new NotifyEmail($emailData));
        }
        return 1;
    }
}
