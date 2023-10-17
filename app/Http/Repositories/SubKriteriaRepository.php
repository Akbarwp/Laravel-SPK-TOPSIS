<?php

namespace App\Http\Repositories;

use App\Models\SubKriteria;

class SubKriteriaRepository
{
    protected $subKriteria;

    public function __construct(SubKriteria $subKriteria)
    {
        $this->subKriteria = $subKriteria;
    }

    public function getAll()
    {
        $data = $this->subKriteria->all();
        return $data;
    }

    public function getWhereKriteria($kriteria_id)
    {
        $data = $this->subKriteria->where('kriteria_id', $kriteria_id)->orderBy('nilai', 'desc')->get();
        return $data;
    }

    public function simpan($data)
    {
        $data = $this->subKriteria->create($data);
        return $data;
    }

    public function getDataById($id)
    {
        $data = $this->subKriteria->with('kriteria')->where('id', $id)->firstOrFail();
        return $data;
    }

    public function perbarui($id, $data)
    {
        $data = $this->subKriteria->where('id', $id)->update([
            "nama" => $data['nama'],
            "nilai" => $data['nilai'],
        ]);
        return $data;
    }

    public function hapus($id)
    {
        $data = $this->subKriteria->where('id', $id)->delete();
        return $data;
    }
}
