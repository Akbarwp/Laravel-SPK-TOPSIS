<?php

namespace App\Http\Services;

use App\Http\Repositories\PenilaianRepository;

class PenilaianService
{
    protected $penilaianRepository;
    
    public function __construct(PenilaianRepository $penilaianRepository)
    {
        $this->penilaianRepository = $penilaianRepository;
    }

    public function getAll()
    {
        $data = $this->penilaianRepository->getAll();
        return $data;
    }

    public function ubahGetData($request)
    {
        $data = $this->penilaianRepository->getDataById($request->id);
        return $data;
    }

    public function perbaruiPostData($request)
    {
        $validate = $request->validated();
        $data = [true, $this->penilaianRepository->perbarui($request->id, $validate)];
        return $data;
    }

    public function simpanFromAlternatif($request)
    {
        $data = $this->penilaianRepository->addFromAlternatif($request[1]->id);
        return $data;
    }
}