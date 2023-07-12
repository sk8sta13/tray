<?php

namespace App\Services;

use Laravel\Lumen\Routing\ProvidesConvenienceMethods;
use App\Repositories\VendedorRepositoryInterface;
use Illuminate\Http\Request;

class VendedorService
{
    use ProvidesConvenienceMethods;

    private $rulesValidate = [
        'nome' => 'required',
        'email' => 'required|email|unique:vendedores'
    ];

    public function __construct(
        protected VendedorRepositoryInterface $repository
    )
    {
    }

    public function all()
    {
        return response()->json($this->repository->all(), 200);
    }

    public function find($id)
    {
        $recurso = $this->repository->find($id);
        if (!$recurso) {
            return response()->json([], 204);
        }

        return response()->json($recurso, 200);
    }

    public function create(Request $request)
    {
        $this->validate($request, $this->rulesValidate);

        $data = $this->repository->create($request->all());

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, $this->rulesValidate);

        $recurso = $this->repository->update($id, $request->all());

        return response()->json($recurso, 200);
    }

    public function delete($id)
    {
        $qtdDeletado = $this->repository->delete($id);
        if ($qtdDeletado === 0) {
            return response()->json(['error' => 'Resource not found'], 404);
        }

        return response()->json('', 204);
    }
}