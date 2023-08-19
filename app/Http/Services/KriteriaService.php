<?php

namespace App\Services;

use App\Repositories\KriteriaRepository;

class KriteriaService
{
    protected $kriteriaRepositories;
    
    public function __construct(KriteriaRepository $kriteriaRepositories)
    {
        $this->kriteriaRepositories = $kriteriaRepositories;
    }
}