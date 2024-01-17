<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenilaianRequest;
use App\Http\Services\PenilaianService;
use App\Http\Services\SubKriteriaService;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    protected $penilaianService, $subKriteriaService;

    public function __construct(PenilaianService $penilaianService, SubKriteriaService $subKriteriaService)
    {
        $this->penilaianService = $penilaianService;
        $this->subKriteriaService = $subKriteriaService;
    }

    public function index()
    {
        $judul = "Penilaian";

        $data = $this->penilaianService->getAll();
        $subKriteria = $this->subKriteriaService->getAll();

        return view('dashboard.penilaian.index', [
            "judul" => $judul,
            "data" => $data,
            "subKriteria" => $subKriteria,
        ]);
    }

    public function ubah(Request $request)
    {
        $judul = "Penilaian";

        $data = $this->penilaianService->ubahGetData($request)->first();
        $data2 = $this->penilaianService->ubahGetData($request);
        $subKriteria = $this->subKriteriaService->getAll();

        return view('dashboard.penilaian.edit', [
            "judul" => $judul,
            "data" => $data,
            "data2" => $data2,
            "subKriteria" => $subKriteria,
        ]);
    }

    public function perbarui(Request $request)
    {
        $data = $this->penilaianService->perbaruiPostData($request);
        return redirect('dashboard/penilaian')->with('berhasil', "Data berhasil diperbarui!");
    }
}
