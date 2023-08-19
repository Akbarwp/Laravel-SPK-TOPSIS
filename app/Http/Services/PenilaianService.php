<?php

namespace App\Services;

use App\Repositories\PenilaianRepository;

class PenilaianService
{
    protected $penilaianRepository;
    
    public function __construct(PenilaianRepository $penilaianRepository)
    {
        $this->penilaianRepository = $penilaianRepository;
    }
}