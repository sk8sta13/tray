<?php

namespace App\Repositories\Eloquent;

use App\Models\Vendedor;
use App\Repositories\VendedorRepositoryInterface;

class VendedorRepository extends BaseRepository implements VendedorRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Vendedor());
    }
}
