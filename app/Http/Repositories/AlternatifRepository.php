<?php

namespace App\Http\Repositories;

use App\Models\Penilaian;
use App\Models\Alternatif;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AlternatifRepository
{
    protected $alternatif, $penilaian;

    public function __construct(Alternatif $alternatif, Penilaian $penilaian)
    {
        $this->alternatif = $alternatif;
        $this->penilaian = $penilaian;
    }

    public function getAll()
    {
        $data = $this->alternatif->with('objek')->orderBy('created_at', 'asc')->get();

        return $data;
    }

    public function simpan($data)
    {
        $input = [];
        foreach ($data as $item) {
            $input[] = $this->alternatif->create([
                'objek_id' => $item,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return $input;
    }

    public function getDataById($id)
    {
        $data = $this->alternatif->where('id', $id)->firstOrFail();
        return $data;
    }

    public function hapus($id)
    {
        $data = [
            DB::table('hasil_solusi_topsis')->where('alternatif_id', $id)->delete(),
            DB::table('solusi_ideal_positif')->where('alternatif_id', $id)->delete(),
            DB::table('solusi_ideal_negatif')->where('alternatif_id', $id)->delete(),
            DB::table('ideal_positif')->where('alternatif_id', $id)->delete(),
            DB::table('ideal_negatif')->where('alternatif_id', $id)->delete(),
            DB::table('matriks_normalisasi_bobot_keputusan')->where('alternatif_id', $id)->delete(),
            DB::table('matriks_normalisasi_keputusan')->where('alternatif_id', $id)->delete(),
            $this->penilaian->where('alternatif_id', $id)->delete(),
            $this->alternatif->where('id', $id)->delete(),
        ];
        return $data;
    }
}
