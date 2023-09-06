<?php

namespace App\Http\Controllers;

use App\Http\Services\KriteriaService;
use App\Http\Services\ObjekService;
use App\Http\Services\SubKriteriaService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $kriteriaService, $subKriteriaService, $objekService;

    public function __construct(KriteriaService $kriteriaService, SubKriteriaService $subKriteriaService, ObjekService $objekService)
    {
        $this->kriteriaService = $kriteriaService;
        $this->subKriteriaService = $subKriteriaService;
        $this->objekService = $objekService;
    }

    public function index()
    {
        $judul = "Dashboard";

        $kriteria = $this->kriteriaService->getAll()->count();
        $subKriteria = $this->subKriteriaService->getAll()->count();
        $objek = $this->objekService->getAll()->count();
        
        return view('dashboard.index', [
            "judul" => $judul,
            "kriteria" => $kriteria,
            "subKriteria" => $subKriteria,
            "objek" => $objek,
        ]);
    }
}
