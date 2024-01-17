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
        $data = $this->penilaianRepository->getDataByAlternatif($request->alternatif_id);
        return $data;
    }

    public function perbaruiPostData($request)
    {
        // $validate = $request->validated();
        $data = $this->penilaianRepository->perbarui($request);
        return $data;
    }

    public function simpanFromAlternatif($request)
    {
        $data = $this->penilaianRepository->addFromAlternatif($request[1]);
        return $data;
    }
}
