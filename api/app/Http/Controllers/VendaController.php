<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendaController extends Controller
{
    private $venda = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'vendedor_id' => 'required',
            'valor_venda' => 'required|numeric|max:15|gt:0|regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'
        ]);
        $this->venda->create($request->all());

        return response()->json(['data' => ['message' => 'Cadastro realizado com sucesso.']]);
    }
}
