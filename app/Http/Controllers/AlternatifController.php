<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ObjekService;
use App\Http\Services\PenilaianService;
use App\Http\Requests\AlternatifRequest;
use App\Http\Services\AlternatifService;
use App\Http\Controllers\TopsisController;

class AlternatifController extends Controller
{
    protected $alternatifService, $objekService, $penilaianService, $topsisService;

    public function __construct(AlternatifService $alternatifService, ObjekService $objekService, PenilaianService $penilaianService, TopsisController $topsisService)
    {
        $this->alternatifService = $alternatifService;
        $this->objekService = $objekService;
        $this->penilaianService = $penilaianService;
        $this->topsisService = $topsisService;
    }

    public function index()
    {
        $judul = "Alternatif";

        $data = $this->alternatifService->getAll();
        $objek = $this->objekService->getAll();

        return view('dashboard.alternatif.index', [
            "judul" => $judul,
            "data" => $data,
            "objek" => $objek,
        ]);
    }

    public function simpan(AlternatifRequest $request)
    {
        $data = $this->alternatifService->simpanPostData($request->input('objek_id'));
        if (!$data[0]) {
            return redirect('dashboard/alternatif')->with('gagal', $data[1]);
        }

        $this->penilaianService->simpanFromAlternatif($data);

        return redirect('dashboard/alternatif')->with('berhasil', "Data berhasil disimpan!");
    }

    public function hapus(Request $request)
    {
        $this->alternatifService->hapusPostData($request->id);
        $this->topsisService->hitungTopsisSetelahHapus();
        return redirect('dashboard/alternatif');
    }
}
