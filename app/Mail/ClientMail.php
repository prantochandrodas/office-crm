<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;
    public $clientEmail;
    public $clientName;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @param string $messageContent
     * @param string $clientEmail
     */
    public function __construct($messageContent, $clientEmail,$clientName,$subject)
    {
        $this->messageContent = $messageContent; // Assigning the message content
        $this->clientEmail = $clientEmail;       // Assigning the client email
        $this->clientName = $clientName;       // Assigning the client email
        $this->subject = $subject;   
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.client_mail',  // The Blade view for your email
            with: [
                'messageContent' => $this->messageContent,  // Passing data to the view
                'clientName' => $this->clientName,  // Passing data to the view
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
