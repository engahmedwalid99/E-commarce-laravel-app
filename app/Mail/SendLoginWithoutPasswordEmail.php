<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendLoginWithoutPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $url;
    public function __construct($url)
    {
        $this->url = $url;
    }
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send link to login without password',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'Auth.SendLoginLink',
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
