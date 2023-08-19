<?php

namespace App\Services;

use App\Repositories\AlternatifRepository;

class AlternatifService
{
    protected $alternatifRepositories;
    
    public function __construct(AlternatifRepository $alternatifRepositories)
    {
        $this->alternatifRepositories = $alternatifRepositories;
    }
}