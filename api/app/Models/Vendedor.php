<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    public $table = 'vendedores';
    public $timestamps = false;
    public $fillable = ['nome', 'email'];
    
    public function vendas()
    {
        return $this->hasMany('App\Models\Venda', 'vendedor_id', 'id');
    }
}
