<?php

namespace App\Services;

use App\Mail\MailableName;
use App\Models\Otp;
use App\repositories\UserRepository;
use App\Traits\SendEmail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected $users;
    use SendEmail;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function indexUsers()
    {
        return $this->users->getUsers();
    }

    public function conseguirOtps()
    {
        return $this->users->getAllOtps();
    }


    public function register(array $data)
    {
        // hashear password
        $data['password'] = Hash::make($data['password']);
        // crear usuario
        $user = $this->users->create($data);

        return [
            'user' => $user,
            'contrasena del user' => $user['password']
        ];
    }

    public function login(array $data)
    {

        $user = $this->users->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return null;
        }

        return [
            'user' => $user,
            // 'contrasena del user' => $user->getAttributes()['password']
        ];
    }

    public function reset(array $data)
    {

        $user = $this->users->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return null;
        }

        // Lógica para el restablecimiento (por ejemplo, generar un token de restablecimiento)
        $emailUser = $data['email']; // Esto podría venir de la solicitud o de la base de datos
        // $email = $data['email'];
        $otp = mt_rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(2);

        // $mailable = new MailableName($emailUser);

        // Guardar OTP en la base de datos
        // Otp::updateOrCreate(
        //     ['email' => $emailUser],
        //     [
        //         'otp_code' => $otp,
        //         'expires_at' =>  $expiresAt,
        //     ]
        // );

        // // Enviar el correo usando la clase MailableName
        // Mail::to($email)->send(new MailableName($emailUser, $otp, $expiresAt));
        $this->sendOtp($emailUser, $otp, $expiresAt);

        return [
            'user' => $user,
            'otp_code' => $otp,
            'expires_at' => $expiresAt->toDateTimeString()
            // 'contrasena del user' => $user->getAttributes()['password']
        ];
    }

    public function firstLogin(array $data)
    {

        $user = $this->users->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return null;
        }

        // Lógica para el restablecimiento (por ejemplo, generar un token de restablecimiento)
        $emailUser = $data['email']; // Esto podría venir de la solicitud o de la base de datos
        // $email = $data['email'];
        $otp = mt_rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(50);

        // $mailable = new MailableName($emailUser);

        // Guardar OTP en la base de datos
        $this->congratulations($emailUser, $otp, $expiresAt);


        // // Enviar el correo usando la clase MailableName
        // Mail::to($email)->send(new MailableName($email, $otp, $expiresAt, $data['password']));

        return [
            'user' => $user,
            'otp_code' => $otp,
            'expires_at' => $expiresAt->toDateTimeString()
            // 'contrasena del user' => $user->getAttributes()['password']
        ];
    }
}
