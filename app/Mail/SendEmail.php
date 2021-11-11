<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->title = $post->title;
        $this->description = $post->description;
        $this->id = $post->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // $this->post->update(array('notified' => 'asdasd'));
        return $this->from(env('MAIL_FROM_ADDRESS') ?? 'admin@admin.com')
                ->markdown('emails.subscribe', [
                    'title' => $this->title,
                    'description' => $this->description,
                ]);

                // $post->notified = 'yes';
                // $post->save();
    }
}
