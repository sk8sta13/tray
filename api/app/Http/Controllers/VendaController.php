<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Services\VendaService;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function __construct(
        private VendaService $service
    )
    {
    }

    public function index()
    {
        return $this->service->all();
    }

    public function store(Request $request)
    {
        return $this->service->create($request);
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($id, $request);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
