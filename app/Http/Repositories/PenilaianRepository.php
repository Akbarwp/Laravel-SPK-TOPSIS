<?php

namespace App\Repositories;

use App\Models\Penilaian;

class PenilaianRepository
{
    protected $penilaian;

    public function __construct(Penilaian $penilaian)
    {
        $this->penilaian = $penilaian;
    }
}