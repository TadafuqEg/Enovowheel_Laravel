<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;
    public $username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $password, $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }


  /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user_credentials')
                    ->subject('Monzer Elzenaidy')
                    ->with([
                        'email' => $this->email,
                        'password' => $this->password,
                        'username' => $this->username,
                    ]);
    }
}
