<?php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
// use Illuminate\Queue\SerializesModels;

// use Carbon\Carbon;

// class Congratulations extends Mailable
// {
//     use Queueable, SerializesModels;
//     private $mi_otp;
//     private $expires_at;
    



//     /**
//      * Create a new message instance.
//      */
//     public function __construct(private $name,  $otp, $expires_at)
//     {
//         $this->mi_otp = $otp;
//         $this->expires_at = $expires_at;
//     }

//     /**
//      * Get the message envelope.
//      */
//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: 'Mailable Name',
//         );
//     }

//     public function generate_otp()
//     {
//         // $otp = mt_rand(100000, 999999);
//         // return $otp;
//         return mt_rand(100000, 999999);
//     }


//     /**
//      * Devuelve el OTP generado.
//      */
//     public function getOtp()
//     {
//         return $this->mi_otp;
//     }

//     /**
//      * Devuelve el tiempo de expiración del OTP.
//      */
//     public function getExpiration()
//     {
//         return $this->expires_at;
//     }

//     /**
//      * Get the message content definition.
//      */
//     public function content(): Content
//     {
//         return new Content(
//             // view: 'view.name',
//             view: 'mail.first-login',
//             with: [
//                 'name' => $this->name,
//                 'mi_otp' => $this->mi_otp,
//                 'expires_at' => $this->expires_at->format('H:i:s')
//             ], // Pasa el OTP a la vista],
//         );
//     }

//     /**
//      * Get the attachments for the message.
//      *
//      * @return array<int, \Illuminate\Mail\Mailables\Attachment>
//      */
//     public function attachments(): array
//     {
//         return [];
//     }
// }
