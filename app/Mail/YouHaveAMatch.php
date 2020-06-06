<?php

namespace App\Mail;

use App\Http\Middleware\Authenticate;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class YouHaveAMatch extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private User $authUser;
    private User $user;


    public function __construct($authUser, $user)
    {

        $this->authUser = $authUser;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.match', [
            'user' => $this->user,
            'authUser' => $this->authUser
        ]);
    }
}
