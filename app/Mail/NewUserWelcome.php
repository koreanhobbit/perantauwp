<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewUserWelcome extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $fp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $fp)
    {
        $this->user = $user;
        $this->fp = $fp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.newuser');
    }
}
