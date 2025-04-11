<?php

namespace App\Http\Controllers;

use App\Http\Services\AlternatifService;
use App\Http\Services\KriteriaService;
use App\Http\Services\ObjekService;
use App\Http\Services\SubKriteriaService;
use App\Http\Services\TopsisService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $kriteriaService, $subKriteriaService, $objekService, $alternatifService, $topsisServices;

    public function __construct(KriteriaService $kriteriaService, SubKriteriaService $subKriteriaService, ObjekService $objekService, AlternatifService $alternatifService, TopsisService $topsisServices)
    {
        $this->kriteriaService = $kriteriaService;
        $this->subKriteriaService = $subKriteriaService;
        $this->objekService = $objekService;
        $this->alternatifService = $alternatifService;
        $this->topsisServices = $topsisServices;
    }

    public function index()
    {
        $judul = "Dashboard";

        $kriteria = $this->kriteriaService->getAll();
        $subKriteria = $this->subKriteriaService->getAll()->count();
        $objek = $this->objekService->getAll()->count();
        $alternatif = $this->alternatifService->getAll()->count();
        $hasilTopsis = $this->topsisServices->getHasilTopsis();

        return view('dashboard.index', [
            "judul" => $judul,
            "jml_kriteria" => $kriteria->count(),
            "subKriteria" => $subKriteria,
            "objek" => $objek,
            "alternatif" => $alternatif,
            "kriteria" => $kriteria,
            "hasilTopsis" => $hasilTopsis,
        ]);
    }
}
