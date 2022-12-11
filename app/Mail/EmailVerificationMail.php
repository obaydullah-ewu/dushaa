<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $verify_route;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verify_route)
    {
        $this->verify_route = $verify_route;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Dushaa Email Verifcation')
            ->view('mail.verification-mail');
    }
}