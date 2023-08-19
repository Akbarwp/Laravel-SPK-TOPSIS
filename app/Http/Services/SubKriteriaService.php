<?php

namespace App\Services;

use App\Repositories\SubKriteriaRepository;

class SubKriteriaService
{
    protected $subKriteriaService;
    
    public function __construct(SubKriteriaRepository $subKriteriaService)
    {
        $this->subKriteriaService = $subKriteriaService;
    }
}