<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedor;

class VendedorController extends Controller
{
    private $vendedor = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Vendedor $vendedor)
    {
        $this->vendedor = $vendedor;
    }

    public function index()
    {
        return $this->vendedor->all();
    }

    public function show($id)
    {
        return $this->vendedor->with('vendas')->find($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required|email|unique:vendedores'
        ]);

        $this->vendedor->create($request->all());

        return response()->json(['data' => ['message' => 'Operação realizada com sucesso.']]);
    }
}
