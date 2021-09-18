<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $class = null;
    protected $rulesVallidate = [];

    public function index()
    {
        return $this->class::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rulesVallidate);

        return response()->json($this->class::create($request->all()), 201);
    }

    public function show($id)
    {
        $recurso = $this->class::find($id);
        if ($recurso) {
            return response()->json('', 204); //Sem conteúdo
        }

        return response()->json($recurso);
    }

    public function update(Request $request, $id)
    {
        $recurso = $this->class::find($id);
        if ($recurso) {
            return response()->json(['error' => 'Recurso não econtrado'], 404);
        }

        $this->validate($request, $this->rulesVallidate);

        $recurso->update($request->all());
        return response()->json($recurso);
    }

    public function destroy($id)
    {
        $qtdDeletado = $this->class::destroy($id);
        if ($qtdDeletado === 0) {
            return response()->json(['error' => 'Recurso não econtrado'], 404);
        }

        return response()->json('', 204); //Sem conteúdo.
    }
}
