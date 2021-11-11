<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\Models\Post;
use App\Models\Subscription;
use App\Notifications\SendEmailNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to users';

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
        $posts = Post::where('notified', 'no')->get();

        foreach($posts as  $post){
            $subs = Subscription::with('user')->where('website_id', $post->website_id)->get();

            foreach($subs as $sub){
                Mail::to($sub->user->email)
                ->queue(new SendEmail($post));

            }
            $post->update(array('notified' => 'yes'));
        }

    }
}
