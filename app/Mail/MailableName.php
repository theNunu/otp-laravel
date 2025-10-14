<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailableName extends Mailable
{
    use Queueable, SerializesModels;
    private $mi_otp;


    public function generate_otp()
    {
        $otp = mt_rand(100000, 999999);
        return $otp;
    }

    /**
     * Create a new message instance.
     */
    public function __construct(private $name)
    {
        $this->mi_otp = $this->generate_otp(); // Llama a la función en el constructor
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mailable Name',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: 'view.name',
            view: 'mail.test-email',
            with: [
                'name' => $this->name,
                'mi_otp' => $this->mi_otp
            ], // Pasa el OTP a la vista],
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
