<?php

namespace App\Repositories;

use App\Models\SubKriteria;

class SubKriteriaRepository
{
    protected $subKriteria;

    public function __construct(SubKriteria $subKriteria)
    {
        $this->subKriteria = $subKriteria;
    }
}