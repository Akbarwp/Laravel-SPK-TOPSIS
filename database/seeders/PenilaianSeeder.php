<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SubKriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatif = Alternatif::orderBy('id', 'asc')->get();
        $kriteria = Kriteria::orderBy('id', 'asc')->get();
        $penilaian = [
            [7, 9, 9, 8],
            [8, 7, 8, 7],
            [9, 6, 8, 9],
            [6, 7, 8, 6],
            [6, 7, 8, 6],
        ];
        foreach ($alternatif as $a => $item) {
            foreach ($kriteria as $k => $value) {
                Penilaian::create([
                    "alternatif_id" => $item->id,
                    "kriteria_id" => $value->id,
                    "sub_kriteria_id" => SubKriteria::where('kriteria_id', $value->id)->where('nilai', $penilaian[$a][$k])->first('id')->id,
                ]);
            }
        }
    }
}
