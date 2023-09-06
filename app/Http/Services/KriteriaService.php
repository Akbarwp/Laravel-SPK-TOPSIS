<?php

namespace App\Http\Services;

use App\Http\Repositories\KriteriaRepository;
use App\Http\Repositories\PenilaianRepository;

class KriteriaService
{
    protected $kriteriaRepository, $penilaianRepository;
    
    public function __construct(KriteriaRepository $kriteriaRepository, PenilaianRepository $penilaianRepository)
    {
        $this->kriteriaRepository = $kriteriaRepository;
        $this->penilaianRepository = $penilaianRepository;
    }

    public function getAll()
    {
        $data = $this->kriteriaRepository->getAll();
        return $data;
    }

    public function getDataById($id)
    {
        $data = $this->kriteriaRepository->getDataById($id);
        return $data;
    }

    public function getPaginate($perData)
    {
        $data = $this->kriteriaRepository->getPaginate($perData);
        return $data;
    }

    public function simpanPostData($request)
    {
        $validate = $request->validated();

        $cekBobot = $validate['bobot'] + $this->getSumBobot()->total_bobot;
        if ($cekBobot > 1) {
            return $data = [false, "Jumlah maksimal keseluruhan bobot yaitu 1!"];
        }

        $data = [true, $this->kriteriaRepository->simpan($validate)];

        $cekPenilaian = $this->penilaianRepository->getDataByKriteria($data[1]->id);
        if ($cekPenilaian == null) {
            $this->penilaianRepository->addFromKriteria($data[1]->id);
        }

        return $data;
    }

    public function ubahGetData($request)
    {
        $data = $this->kriteriaRepository->getDataById($request->id);
        return $data;
    }

    public function perbaruiPostData($request)
    {
        $cekBobot = $request['bobot'] + $this->getSumBobot()->total_bobot - $this->kriteriaRepository->getDataById($request->id)->bobot;
        if ($cekBobot > 1) {
            return $data = [false, "Jumlah maksimal keseluruhan bobot yaitu 1!"];
        }
        
        $validate = $request->validated();
        $data = [true, $this->kriteriaRepository->perbarui($request->id, $validate)];
        return $data;
    }

    public function hapusPostData($request)
    {
        $data = $this->kriteriaRepository->hapus($request);
        return $data;
    }

    public function getSumBobot()
    {
        $data = $this->kriteriaRepository->getSumBobot();
        return $data;
    }
}