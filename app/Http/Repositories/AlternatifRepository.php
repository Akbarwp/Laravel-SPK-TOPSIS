<?php

namespace App\Repositories;

use App\Models\Alternatif;

class AlternatifRepository
{
    protected $alternatif;

    public function __construct(Alternatif $alternatif)
    {
        $this->alternatif = $alternatif;
    }
}