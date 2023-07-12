<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\VendaRepositoryInterface;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VendaService
{
    use ProvidesConvenienceMethods;

    protected $rulesValidate = [
        'vendedor_id' => 'required',
        'valor_venda' => 'required|numeric|max:15|gt:0|regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'
    ];

    public function __construct(
        protected VendaRepositoryInterface $repository
    )
    {
    }

    public function create(Request $request)
    {
        $this->validate($request, $this->rulesValidate);

        $data = $this->repository->create($request->all());

        return response()->json($data, 201);
    }
}
