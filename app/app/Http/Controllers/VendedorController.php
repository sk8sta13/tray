<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VendedorController extends BaseController
{
    public function index()
    {
        $response = Http::get('http://api/vendedores');

        return view('vendedores.index', ['vendedores' => $response->json()]);
    }

    public function create()
    {
        return view('vendedores.create');
    }

    public function store(Request $request)
    {
        $response = Http::post('http://api/vendedores/store', [
            'nome' => $request->get('nome'),
            'email' => $request->get('email')
        ]);

        if ($response->successful()) {
            return redirect('/vendedores');
        } else {
            return back()->withInput()->with(['errors' => $response->json()]);
        }
    }

    public function show($id)
    {
        $response = Http::get('http://api/vendedores/' . $id);

        return view('vendedores.show', ['vendedor' => $response->json()]);
    }
}
