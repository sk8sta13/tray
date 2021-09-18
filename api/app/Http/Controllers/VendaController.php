<?php

namespace App\Http\Controllers;

class VendaController extends Controller
{
    public function __construct()
    {
        $this->class = App\Models\Venda::class;
        $this->rulesVallidate = [
            'vendedor_id' => 'required',
            'valor_venda' => 'required|numeric|max:15|gt:0|regex:/^-?[0-9]+(?:.[0-9]{1,2})?$/'
        ];
    }
}
