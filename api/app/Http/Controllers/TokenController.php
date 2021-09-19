<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use App\Models\User;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->get('email'))->first();

        if (!$usuario || !Hash::check($request->get('password'), $usuario->password)) {
            return response()->json('', 401); //Não Autorizado.
        }

        $token = JWT::encode(['email' => $usuario->email], env('JWT_KEY'));

        return ['access_token' => $token];
    }
}
