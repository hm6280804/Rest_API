<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestingMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('hm6280804@gmail.com', 'Muhammad Hanif'),
            subject: 'Testing Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.testingMail',
        );
    }

    public function attachments(): array
    {
        if (!file_exists(storage_path('app/public/AS.jpg'))) {
            logger('Attachment file not found!');
        }
        return [
            Attachment::fromPath(storage_path('app/public/AS.jpg'))
            ,
        ];
    }
}
