<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VendaController extends BaseController
{
    public function create()
    {
        $vendedores = Http::get('http://api/vendedores');

        return view('vendas.create', ['vendedores' => $vendedores->json()]);
    }

    public function store(Request $request)
    {
        $response = Http::post('http://api/vendas/store', [
            'vendedor_id' => $request->get('vendedor_id'),
            'valor_venda' => (float) str_replace(',', '.', str_replace('.', '', $request->get('valor_venda')))
        ]);

        if ($response->successful()) {
            return redirect('/vendedores/' . $request->get('vendedor_id'));
        } else {
            return back()->withInput()->with(['errors' => $response->json()]);
        }
    }
}
