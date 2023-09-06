<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Objek;
use App\Models\Penilaian;
use App\Models\SubKriteria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            "name" => "Admin",
            "email" => "Admin@gmail.com",
            "password" => Hash::make("Admin123"),
        ]);

        $kode = ["A", "B", "C", "D"];
        $nama = ["Sangat Baik", "Baik", "Biasa", "Kurang Baik"];
        $nilai = [9, 8, 7, 6];
        
        $namaKriteria = ["Style", "Reliability", "Fuel-Economy", "Cost"];
        $bobot = [0.1, 0.4, 0.3, 0.2];

        for ($i = 0; $i < 4; $i++) {
            Kriteria::create([
                "kode" => $kode[$i],
                "nama" => $namaKriteria[$i],
                "bobot" => $bobot[$i],
            ]);
        }

        for ($j = 0; $j < 4; $j++) {
            for ($i = 0; $i < 4; $i++) {
                SubKriteria::create([
                    "kode" => $kode[$j] . $i+1,
                    "nama" => $nama[$i],
                    "nilai" => $nilai[$i],
                    "kriteria_id" => $j+1,
                ]);
            }
        }

        $namaObjek = ["Civic", "Saturn", "Ford", "Mazda", "Mercendez"];
        for ($i = 0; $i < 5; $i++) {
            Objek::create([
                "nama" => $namaObjek[$i],
            ]);
        }

        for ($i = 0; $i < 4; $i++) {
            Alternatif::create([
                "objek_id" => $i+1,
            ]);
        }

        $penilaian = [
            [7, 9, 9, 8],
            [8, 7, 8, 7],
            [9, 6, 8, 9],
            [6, 7, 8, 6],
        ];
        for ($j = 0; $j < 4; $j++) {
            for ($i = 0; $i < 4; $i++) {
                Penilaian::create([
                    "alternatif_id" => $j+1,
                    "kriteria_id" => $i+1,
                    "sub_kriteria_id" => SubKriteria::where('kriteria_id', $i+1)->where('nilai', $penilaian[$j][$i])->first('id')->id,
                ]);
            }
        }
    }
}
