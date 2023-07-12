<?php

namespace App\Services;

use Laravel\Lumen\Routing\ProvidesConvenienceMethods;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use App\Repositories\UserRepositoryInterface;

class TokenService
{
    use ProvidesConvenienceMethods;

    public function __construct(
        protected UserRepositoryInterface $userRepository
    )
    {
    }

    public function getToken(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        $usuario = $this->userRepository->search(['email' => $request->get('email')]);
        $usuario = (empty($usuario)) ? null : $usuario[0];

        if (!$usuario || !Hash::check($request->get('password'), $usuario->password)) {
            return response()->json('Not authorized', 401);
        }

        $token = JWT::encode(['email' => $usuario->email], env('JWT_KEY'));

        return ['access_token' => $token];
    }
}