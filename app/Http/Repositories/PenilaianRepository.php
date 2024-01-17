<?php

namespace App\Http\Repositories;

use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Kriteria;
use Carbon\Carbon;

class PenilaianRepository
{
    protected $penilaian, $kriteria, $alternatif;

    public function __construct(Penilaian $penilaian, Kriteria $kriteria, Alternatif $alternatif)
    {
        $this->penilaian = $penilaian;
        $this->kriteria = $kriteria;
        $this->alternatif = $alternatif;
    }

    public function getAll()
    {
        $data = $this->penilaian->with('alternatif', 'kriteria', 'subKriteria')->orderBy('id', 'asc')->get();
        return $data;
    }

    public function getDataById($id)
    {
        $data = $this->penilaian->with('kriteria', 'subKriteria', 'alternatif')->where('id', $id)->firstOrFail();
        return $data;
    }

    public function perbarui($data)
    {
        // dd($data->all());
        $responses = [];
        foreach ($this->kriteria->get() as $value => $item) {
            $responses[] = $this->penilaian->where('alternatif_id', $data->alternatif_id)->where('kriteria_id', $item->id)->update([
                "sub_kriteria_id" => $data->kriteria_id[$value],
            ]);
        }
        return $responses;
    }

    public function addFromAlternatif($alternatif_id)
    {
        $kriteria = $this->kriteria->get();

        foreach ($alternatif_id as $value) {
            foreach ($kriteria as $item) {
                $this->penilaian->insert([
                    'alternatif_id' => $value->id,
                    'kriteria_id' => $item->id,
                    'sub_kriteria_id' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    public function getDataByKriteria($kriteria_id)
    {
        $data = $this->penilaian->where('kriteria_id', $kriteria_id)->first();
        return $data;
    }

    public function getDataByAlternatif($alternatif_id)
    {
        $data = $this->penilaian->where('alternatif_id', $alternatif_id)->get();
        return $data;
    }

    public function addFromKriteria($kriteria_id)
    {
        $alternatif = $this->alternatif->get();

        foreach ($alternatif as $item) {
            $this->penilaian->insert([
                'alternatif_id' => $item->id,
                'kriteria_id' => $kriteria_id,
                'sub_kriteria_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
