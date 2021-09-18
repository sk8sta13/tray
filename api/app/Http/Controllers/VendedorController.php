<?php

namespace App\Http\Controllers;

class VendedorController extends Controller
{
    public function __construct()
    {
        $this->class = \App\Models\Vendedor::class;
        $this->rulesVallidate = [
            'nome' => 'required',
            'email' => 'required|email|unique:vendedores'
        ];
    }
}
