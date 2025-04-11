<?php

namespace Database\Seeders;

use App\Models\Objek;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $namaObjek = ["Civic", "Saturn", "Ford", "Mazda", "Mercendez"];
        foreach ($namaObjek as $item) {
            Objek::create([
                "nama" => $item,
            ]);
        }
    }
}
