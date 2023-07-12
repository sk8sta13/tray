<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    public $fillable = ['data_venda', 'valor_venda', 'comissao', 'vendedor_id'];
    protected $date = ['data_venda'];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->comissao = $model->valor_venda * 0.085;
            $model->data_venda = date('Y-m-d');
        });
    }

    public function vendedor()
    {
        return $this->belongsTo('App\Models\Vendedor', 'vendedor_id', 'id');
    }
}
