<?php

namespace App\Repositories;

use App\Models\Objek;

class ObjekRepository
{
    protected $objek;

    public function __construct(Objek $objek)
    {
        $this->objek = $objek;
    }
}