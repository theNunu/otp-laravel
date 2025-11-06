<?php

namespace App\Traits;

use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailableName;
use App\Mail\Congratulations;

trait SendEmail
{
    public function sendOtp($email, $otp, $expires_at)
    {
        // dd('llego a send otp');
        //  dd('llego a congratulations');
        // Guardar OTP en la base de datos
        Otp::updateOrCreate(
            ['email' => $email],
            [
                'otp_code' => $otp,
                'expires_at' =>  $expires_at,
            ]
        );

        Mail::to($email)->send(new MailableName($email, $otp, $expires_at));
    }

    public function congratulations($email, $otp, $expires_at)
    {
        dd('llego a congratulations');
        Otp::updateOrCreate(
            ['email' => $email],
            [
                'otp_code' => $otp,
                'expires_at' =>  $expires_at,
                // 'password' => $data['password']
            ]
        );
        Mail::to($email)->send(new Congratulations($email, $otp, $expires_at));
    }

    // public function metodoUno()
    // {
       

    // public function metodoDos($parametro)
    // {
    //     dd("Este es el método dos con el parámetro: " . $parametro);
    // }
}
