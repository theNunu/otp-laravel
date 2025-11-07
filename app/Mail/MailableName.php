<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;

class MailableName extends Mailable
{
    use Queueable, SerializesModels;
    private $data;
    // private $expires_at;
    public $view;
    private $title;
    



    /**
     * Create a new message instance.
     */
    public function __construct($data, $view, $title)
    {
        $this->data = $data;
        $this->title = $title;
        $this->view = $view;
        // $this->expires_at = $expires_at;
        // $this->mi_otp = $otp;
        // $this->expires_at = $expires_at;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // subject: 'envio de otp',
            subject: $this->title,
        );
    }

    // public function generate_otp()
    // {
    //     // $otp = mt_rand(100000, 999999);
    //     // return $otp;
    //     return mt_rand(100000, 999999);
    // }


    /**
     * Devuelve el OTP generado.
     */
    // public function getOtp()
    // {
    //     return $this->mi_otp;
    // }

    /**
     * Devuelve el tiempo de expiración del OTP.
     */
    // public function getExpiration()
    // {
    //     return $this->expires_at;
    // }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // view: 'view.name',
            // view: 'mail.test-email',
            view: $this->view,
            with: [
                'data' => $this->data,
                // 'name' => $this->name,
                // 'mi_otp' => $this->mi_otp,
                // 'expires_at' => $this->expires_at->format('H:i:s')
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
