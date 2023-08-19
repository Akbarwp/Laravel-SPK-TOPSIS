<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriks_keputusan', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("kriteria_id")->constrained("kriteria", "id");
            $table->timestamps();
        });
        Schema::create('matriks_normalisasi_keputusan', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->foreignId("kriteria_id")->constrained("kriteria", "id");
            $table->timestamps();
        });
        Schema::create('matriks_normalisasi_bobot_keputusan', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->foreignId("kriteria_id")->constrained("kriteria", "id");
            $table->timestamps();
        });
        Schema::create('ideal_positif', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->foreignId("kriteria_id")->constrained("kriteria", "id");
            $table->timestamps();
        });
        Schema::create('ideal_negatif', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->foreignId("kriteria_id")->constrained("kriteria", "id");
            $table->timestamps();
        });
        Schema::create('solusi_ideal_positif', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->timestamps();
        });
        Schema::create('solusi_ideal_negatif', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->timestamps();
        });
        Schema::create('hasil_solusi_topsis', function (Blueprint $table) {
            $table->id();
            $table->double("nilai");
            $table->foreignId("alternatif_id")->constrained("alternatif", "id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriks_keputusan');
        Schema::dropIfExists('matriks_normalisasi_keputusan');
        Schema::dropIfExists('matriks_normalisasi_bobot_keputusan');
        Schema::dropIfExists('ideal_positif');
        Schema::dropIfExists('ideal_negatif');
        Schema::dropIfExists('solusi_ideal_positif');
        Schema::dropIfExists('solusi_ideal_negatif');
        Schema::dropIfExists('hasil_solusi_topsis');
    }
};
