<?php

namespace App\Http\Services;

use App\Http\Repositories\SubKriteriaRepository;

class SubKriteriaService
{
    protected $subKriteriaRepository;

    public function __construct(SubKriteriaRepository $subKriteriaRepository)
    {
        $this->subKriteriaRepository = $subKriteriaRepository;
    }

    public function getAll()
    {
        $data = $this->subKriteriaRepository->getAll();
        return $data;
    }

    public function getWhereKriteria($kriteria_id)
    {
        $data = $this->subKriteriaRepository->getWhereKriteria($kriteria_id);
        return $data;
    }

    public function simpanPostData($request)
    {
        $data = $request->validated();
        $data = [true, $this->subKriteriaRepository->simpan($data)];

        return $data;
    }

    public function ubahGetData($request)
    {
        $data = $this->subKriteriaRepository->getDataById($request->id);
        return $data;
    }

    public function perbaruiPostData($request)
    {
        $validate = $request->validated();
        $data = [true, $this->subKriteriaRepository->perbarui($request->id, $validate)];
        return $data;
    }

    public function hapusPostData($request)
    {
        $data = $this->subKriteriaRepository->hapus($request);
        return $data;
    }
}
