<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use Illuminate\Http\Request;

class TokenController
{
    public function gerarToken(Request $request, TokenService $service)
    {
        return $service->getToken($request);
    }
}
