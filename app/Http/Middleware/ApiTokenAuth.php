<?php

// namespace App\Http\Middleware;

// use App\repositories\UserRepository;
// use Closure;
// use App\Repositories\UserRepositoryInterface;

// class ApiTokenAuth
// {
//     protected $users;

//     public function __construct(UserRepository $users)
//     {
//         $this->users = $users;
//     }

//     public function handle($request, Closure $next)
//     {
//         $header = $request->header('Authorization');
//         $token = null;
//         if ($header && preg_match('/Bearer\s+(.+)/', $header, $matches)) {
//             $token = $matches[1];
//         } else {
//             $token = $request->get('api_token');
//         }

//         if (!$token) {
//             return response()->json(['message' => 'Token no proporcionado.'], 401);
//         }

//         $user = $this->users->findByToken($token);
//         if (!$user) {
//             return response()->json(['message' => 'Token inválido.'], 401);
//         }

//         // inyectar usuario en la request (opcional)
//         $request->setUserResolver(function () use ($user) {
//             return $user;
//         });

//         return $next($request);
//     }
// }
