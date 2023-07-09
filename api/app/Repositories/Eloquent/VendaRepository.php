<?php

namespace App\Repositories\Eloquent;

use App\Models\Venda;
use App\Repositories\VendaRepositoryInterface;

class VendaRepository extends BaseRepository implements VendaRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Venda());
    }
}
