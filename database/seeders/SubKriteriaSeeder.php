<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kode = ["A", "B", "C", "D"];
        $nama = ["Sangat Baik", "Baik", "Biasa", "Kurang Baik"];
        $nilai = [9, 8, 7, 6];

        foreach ($kode as $k => $item) {
            foreach ($nama as $n => $value) {
                SubKriteria::create([
                    "kode" => $item . $n+1,
                    "nama" => $value,
                    "nilai" => $nilai[$n],
                    "kriteria_id" => $k+1,
                ]);
            }
        }
    }
}
