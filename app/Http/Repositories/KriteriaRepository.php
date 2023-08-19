<?php

namespace App\Repositories;

use App\Models\Kriteria;

class KriteriaRepository
{
    protected $kriteria;

    public function __construct(Kriteria $kriteria)
    {
        $this->kriteria = $kriteria;
    }
}