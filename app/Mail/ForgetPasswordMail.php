<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $forgot_token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($forgot_token)
    {
        $this->forgot_token = $forgot_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Dushaa Forget password')
            ->view('mail.forgot-code');
    }
}
