<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjekRequest;
use App\Http\Services\ObjekService;
use Illuminate\Http\Request;

class ObjekController extends Controller
{
    protected $objekService;

    public function __construct(ObjekService $objekService)
    {
        $this->objekService = $objekService;
    }

    public function index()
    {
        $judul = "Objek";

        $data = $this->objekService->getAll();

        return view('dashboard.objek.index', [
            "judul" => $judul,
            "data" => $data,
        ]);
    }

    public function simpan(ObjekRequest $request)
    {
        $data = $this->objekService->simpanPostData($request);
        return redirect('dashboard/objek')->with('berhasil', "Data berhasil disimpan!");
    }

    public function ubah(Request $request)
    {
        $data = $this->objekService->ubahGetData($request);
        return $data;
    }

    public function perbarui(ObjekRequest $request)
    {
        $data = $this->objekService->perbaruiPostData($request);
        return redirect('dashboard/objek')->with('berhasil', "Data berhasil diperbarui!");
    }

    public function hapus(Request $request)
    {
        try {
            $this->objekService->hapusPostData($request->id);
        } catch (\Throwable $th) {
            return abort(400);
        }
        return redirect('dashboard/objek')->with('berhasil', "Data berhasil diperbarui!");
    }

    public function import(Request $request)
    {
        // validasi
        $request->validate([
            'import_data' => 'required|mimes:xls,xlsx'
        ]);

        $this->objekService->import($request);

        // alihkan halaman kembali
        return redirect('dashboard/objek')->with('berhasil', "Data berhasil di import!");
    }
}
