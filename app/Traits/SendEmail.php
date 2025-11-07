<?php

namespace App\Traits;

use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailableName;
use App\Mail\Congratulations;

trait SendEmail
{
    public function sendMessage($email, $data,$view, $title)
    {
        Mail::to($email)->send(new MailableName( $data,$view, $title)); //no repite el parametro email
    }
}
