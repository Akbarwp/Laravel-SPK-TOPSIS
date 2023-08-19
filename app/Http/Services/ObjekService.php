<?php

namespace App\Services;

use App\Repositories\ObjekRepository;

class ObjekService
{
    protected $objekRepositories;
    
    public function __construct(ObjekRepository $objekRepositories)
    {
        $this->objekRepositories = $objekRepositories;
    }
}