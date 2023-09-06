<?php

namespace App\Http\Repositories;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\DB;

class KriteriaRepository
{
    protected $kriteria, $subKriteria, $penilaian;

    public function __construct(Kriteria $kriteria, SubKriteria $subKriteria, Penilaian $penilaian)
    {
        $this->kriteria = $kriteria;
        $this->subKriteria = $subKriteria;
        $this->penilaian = $penilaian;
    }

    public function getAll()
    {
        $data = $this->kriteria->orderBy('created_at', 'asc')->get();
        return $data;
    }

    public function getPaginate($perData)
    {
        $data = $this->kriteria->paginate($perData);
        return $data;
    }

    public function simpan($data)
    {
        $data = $this->kriteria->create($data);
        return $data;
    }

    public function getDataById($id)
    {
        $data = $this->kriteria->where('id', $id)->firstOrFail();
        return $data;
    }

    public function perbarui($id, $data)
    {
        $data = $this->kriteria->where('id', $id)->update([
            "kode" => $data['kode'],
            "nama" => $data['nama'],
            "bobot" => $data['bobot'],
        ]);
        return $data;
    }

    public function hapus($id)
    {
        $data = [
            $this->penilaian->where('kriteria_id', $id)->delete(),
            $this->subKriteria->where('kriteria_id', $id)->delete(),
            $this->kriteria->where('id', $id)->delete(),
        ];
        return $data;
    }

    public function getSumBobot()
    {
        $data = $this->kriteria->select(DB::raw("SUM(bobot) as total_bobot"))->first();
        return $data;
    }
}