<?php

namespace App\Http\Controllers;

use App\Services\KriteriaService;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    protected $kriteriaService;

    public function __construct(KriteriaService $kriteriaService)
    {
        $this->kriteriaService = $kriteriaService;
    }
}
