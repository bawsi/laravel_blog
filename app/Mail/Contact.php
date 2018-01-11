<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $msgBody;

    /**
     * Create a new msgBody instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $msgBody)
    {
        $this->name    = $name;
        $this->email   = $email;
        $this->subject = $subject;
        $this->msgBody = $msgBody;
    }

    /**
     * Build the msgBody.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('petekblaz94@gmail.com')->from($this->email)->replyTo($this->email)->subject($this->subject)->view('emails.contact');
    }
}
