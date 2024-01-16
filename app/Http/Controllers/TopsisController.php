<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Services\TopsisService;
use App\Http\Services\KriteriaService;
use App\Http\Services\PenilaianService;

class TopsisController extends Controller
{
    protected $topsisServices, $penilaianService, $kriteriaService;

    public function __construct(TopsisService $topsisServices, PenilaianService $penilaianService, KriteriaService $kriteriaService)
    {
        $this->topsisServices = $topsisServices;
        $this->penilaianService = $penilaianService;
        $this->kriteriaService = $kriteriaService;
    }

    public function hasilAkhir()
    {
        $judul = "Hasil Akhir";
        $hasilTopsis = $this->topsisServices->getHasilTopsis();

        return view('dashboard.hasil_akhir.index', [
            'judul' => $judul,
            'hasilTopsis' => $hasilTopsis,
        ]);
    }

    public function index()
    {
        $judul = "Perhitungan";

        $kriteria = $this->kriteriaService->getAll();
        $penilaian = $this->penilaianService->getAll();
        $matriksKeputusan = $this->topsisServices->getMatriksKeputusan();
        $matriksNormalisasi = $this->topsisServices->getMatriksNormalisasi();
        $matriksY = $this->topsisServices->getMatriksY();
        $solusiIdealPositif = $this->topsisServices->getSolusiIdealPositif();
        $solusiIdealNegatif = $this->topsisServices->getSolusiIdealNegatif();
        $idealPositif = $this->topsisServices->getIdealPositif();
        $idealNegatif = $this->topsisServices->getIdealNegatif();
        $hasilTopsis = $this->topsisServices->getHasilTopsis();

        return view('dashboard.perhitungan.index', [
            'judul' => $judul,
            'kriteria' => $kriteria,
            'penilaian' => $penilaian,
            'matriksKeputusan' => $matriksKeputusan,
            'matriksNormalisasi' => $matriksNormalisasi,
            'matriksY' => $matriksY,
            'idealPositif' => $idealPositif,
            'idealNegatif' => $idealNegatif,
            'solusiIdealPositif' => $solusiIdealPositif,
            'solusiIdealNegatif' => $solusiIdealNegatif,
            'hasilTopsis' => $hasilTopsis,
        ]);
    }

    public function pdf_topsis()
    {
        $judul = 'Laporan Hasil TOPSIS';

        $kriteria = $this->kriteriaService->getAll();
        $penilaian = $this->penilaianService->getAll();
        $matriksKeputusan = $this->topsisServices->getMatriksKeputusan();
        $matriksNormalisasi = $this->topsisServices->getMatriksNormalisasi();
        $matriksY = $this->topsisServices->getMatriksY();
        $solusiIdealPositif = $this->topsisServices->getSolusiIdealPositif();
        $solusiIdealNegatif = $this->topsisServices->getSolusiIdealNegatif();
        $idealPositif = $this->topsisServices->getIdealPositif();
        $idealNegatif = $this->topsisServices->getIdealNegatif();
        $hasilTopsis = $this->topsisServices->getHasilTopsis();

        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadview('dashboard.pdf.perhitungan', [
            'judul' => $judul,
            'kriteria' => $kriteria,
            'penilaian' => $penilaian,
            'matriksKeputusan' => $matriksKeputusan,
            'matriksNormalisasi' => $matriksNormalisasi,
            'matriksY' => $matriksY,
            'idealPositif' => $idealPositif,
            'idealNegatif' => $idealNegatif,
            'solusiIdealPositif' => $solusiIdealPositif,
            'solusiIdealNegatif' => $solusiIdealNegatif,
            'hasilTopsis' => $hasilTopsis,
        ]);

        // return $pdf->download('laporan-penilaian.pdf');
        return $pdf->stream();
    }

    public function pdf_hasil()
    {
        $judul = "Laporan Hasil Akhir";
        $hasilTopsis = $this->topsisServices->getHasilTopsis();

        $pdf = PDF::setOptions(['defaultFont' => 'sans-serif'])->loadview('dashboard.pdf.hasil_akhir', [
            'judul' => $judul,
            'hasilTopsis' => $hasilTopsis,
        ]);

        // return $pdf->download('laporan-penilaian.pdf');
        return $pdf->stream();
    }

    public function hitungTopsis()
    {
        $this->hitungMatriksKeputusan();
        $this->hitungMatriksNormalisasi();
        $this->hitungMatriksY();
        $this->hitungIdeal();
        $this->hitungSolusiIdeal();
        $this->hitungHasil();
        return redirect('dashboard/perhitungan')->with('berhasil', "Perhitungan TOPSIS Selesai!");
    }

    public function hitungTopsisSetelahHapus()
    {
        $this->hitungMatriksKeputusan();
        $this->hitungMatriksNormalisasi();
        $this->hitungMatriksY();
        $this->hitungIdeal();
        $this->hitungSolusiIdeal();
        $this->hitungHasil();
    }

    public function hitungMatriksKeputusan()
    {
        $penilaian = $this->penilaianService->getAll();
        foreach ($penilaian->unique('kriteria_id') as $item) {
            $penilaianKriteria = $penilaian->where('kriteria_id', $item->kriteria_id);
            $hitungMatriks = 0;

            foreach ($penilaianKriteria as $value) {
                if ($value->sub_kriteria_id == null) {
                    abort(403, "Masukkan nilai alternatif ". $value->alternatif->objek->nama ."!");
                }
                $hitungMatriks += pow($value->subKriteria->nilai, 2);
            }

            $hitungMatriks = sqrt($hitungMatriks);
            $data = [
                'kriteria_id' => $item->kriteria_id,
                'nilai' => $hitungMatriks,
            ];

            $this->topsisServices->simpanMatriksKeputusan($data);
        }
    }

    public function hitungMatriksNormalisasi()
    {
        $penilaian = $this->penilaianService->getAll();
        foreach ($penilaian->unique('kriteria_id') as $item) {
            $penilaianKriteria = $penilaian->where('kriteria_id', $item->kriteria_id);
            $matriksKeputusan = $this->topsisServices->getMatriksKeputusanKriteria($item->kriteria_id);

            foreach ($penilaianKriteria as $value) {
                $matriksNormalisasi = $value->subKriteria->nilai / $matriksKeputusan->nilai;
                $data = [
                    'nilai' => $matriksNormalisasi,
                    'kriteria_id' => $value->kriteria_id,
                    'alternatif_id' => $value->alternatif_id,
                ];
                $this->topsisServices->simpanMatriksNormalisasi($data);
            }
        }
    }

    public function hitungMatriksY()
    {
        $matriksNormalisasi = $this->topsisServices->getMatriksNormalisasi();
        foreach ($matriksNormalisasi->unique('kriteria_id') as $item) {
            $matriksNormalisasiKriteria = $matriksNormalisasi->where('kriteria_id', $item->kriteria_id);
            $bobotKriteria = $this->kriteriaService->getDataById($item->kriteria_id);

            foreach ($matriksNormalisasiKriteria as $value) {
                $matriksY = $value->nilai * $bobotKriteria->bobot;
                $data = [
                    'nilai' => $matriksY,
                    'kriteria_id' => $value->kriteria_id,
                    'alternatif_id' => $value->alternatif_id,
                ];
                $this->topsisServices->simpanMatriksY($data);
            }
        }
    }

    public function hitungIdeal()
    {
        $solusiIdeal = $this->topsisServices->getMatriksY();
        foreach ($solusiIdeal->unique('kriteria_id') as $item) {
            $solusiIdealKriteria = $solusiIdeal->where('kriteria_id', $item->kriteria_id);

            $solusiIdealA = [];
            foreach ($solusiIdealKriteria as $value) {
                $solusiIdealA[] = $value->nilai;
            }
            $solusiIdealPositif = ['nilai' => max($solusiIdealA), 'kriteria_id' => $item->kriteria_id];
            $solusiIdealNegatif = ['nilai' => min($solusiIdealA), 'kriteria_id' => $item->kriteria_id];

            foreach ($solusiIdealKriteria as $value) {
                $idealPositif = pow($value->nilai - $solusiIdealPositif['nilai'], 2);
                $dataPositif = [
                    'nilai' => $idealPositif,
                    'kriteria_id' => $value->kriteria_id,
                    'alternatif_id' => $value->alternatif_id,
                ];
                $this->topsisServices->simpanIdealPositif($dataPositif);

                $idealNegatif = pow($value->nilai - $solusiIdealNegatif['nilai'], 2);
                $dataNegatif = [
                    'nilai' => $idealNegatif,
                    'kriteria_id' => $value->kriteria_id,
                    'alternatif_id' => $value->alternatif_id,
                ];
                $this->topsisServices->simpanIdealNegatif($dataNegatif);
            }
        }
    }

    public function hitungSolusiIdeal()
    {
        $jarakIdealPositif = $this->topsisServices->getIdealPositif();
        $jarakIdealNegatif = $this->topsisServices->getIdealNegatif();

        foreach ($jarakIdealPositif as $item) {
            $jarakIdealPositifSi = $jarakIdealPositif->where('alternatif_id', $item->alternatif_id);
            $nilaiPositifSi = 0;

            foreach ($jarakIdealPositifSi as $value) {
                $nilaiPositifSi += $value->nilai;
            }
            $data = [
                'nilai' => sqrt($nilaiPositifSi),
                'alternatif_id' => $item->alternatif_id,
            ];
            $this->topsisServices->simpanSolusiIdealPositif($data);
        }

        foreach ($jarakIdealNegatif as $item) {
            $jarakIdealNegatifSi = $jarakIdealNegatif->where('alternatif_id', $item->alternatif_id);
            $nilaiNegatifSi = 0;

            foreach ($jarakIdealNegatifSi as $value) {
                $nilaiNegatifSi += $value->nilai;
            }
            $data = [
                'nilai' => sqrt($nilaiNegatifSi),
                'alternatif_id' => $item->alternatif_id,
            ];
            $this->topsisServices->simpanSolusiIdealNegatif($data);
        }
    }

    public function hitungHasil()
    {
        $solusiIdealPositif = $this->topsisServices->getSolusiIdealPositif();
        $solusiIdealNegatif = $this->topsisServices->getSolusiIdealNegatif();

        $dataPositif = [];
        $dataNegatif = [];
        $hitung = [];

        foreach ($solusiIdealPositif as $item) {
            $dataPositif[] = [
                'alternatif_id' => $item->alternatif_id,
                'nilai' => $item->nilai,
            ];
        }

        foreach ($solusiIdealNegatif as $item) {
            $dataNegatif[] = [
                'alternatif_id' => $item->alternatif_id,
                'nilai' => $item->nilai,
            ];
        }

        foreach ($dataPositif as $item) {
            foreach ($dataNegatif as $value) {
                if ($value['alternatif_id'] == $item['alternatif_id']) {
                    $hitung = [
                        'alternatif_id' => $item['alternatif_id'],
                        'nilai' => $value['nilai'] / ($item['nilai'] + $value['nilai']),
                    ];
                }
            }
            $this->topsisServices->simpanHasilTopsis($hitung);
            $hitung = [];
        }
    }
}
