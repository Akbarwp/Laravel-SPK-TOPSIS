<?php

namespace App\Http\Services;

use App\Http\Repositories\TopsisRepository;

class TopsisService
{
    protected $topsisRepository;

    public function __construct(TopsisRepository $topsisRepository)
    {
        $this->topsisRepository = $topsisRepository;
    }

    // Matriks Keputusan
    public function getMatriksKeputusan()
    {
        $data = $this->topsisRepository->getMatriksKeputusan();
        return $data;
    }
    public function getMatriksKeputusanKriteria($kriteria_id)
    {
        $data = $this->topsisRepository->getMatriksKeputusanKriteria($kriteria_id);
        return $data;
    }
    public function simpanMatriksKeputusan($data)
    {
        $validate = $this->topsisRepository->getMatriksKeputusanKriteria($data['kriteria_id']);
        if ($validate == null) {
            $result = $this->topsisRepository->addMatriksKeputusan($data);

        } elseif ($validate != null) {
            $result = $this->topsisRepository->updateMatriksKeputusan($data);
        }

        return $result;
    }

    // Matriks Normalisasi
    public function getMatriksNormalisasi()
    {
        $data = $this->topsisRepository->getMatriksNormalisasi();
        return $data;
    }
    public function simpanMatriksNormalisasi($data)
    {
        $validate = $this->topsisRepository->getMatriksNormalisasiKriteriaAlternatif($data['kriteria_id'], $data['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addMatriksNormalisasi($data);

        } elseif ($validate != null) {
            $this->topsisRepository->updateMatriksNormalisasi($data);
        }
    }

    // Matriks Y
    public function getMatriksY()
    {
        $data = $this->topsisRepository->getMatriksY();
        return $data;
    }
    public function getMatriksYKriteria($kriteria_id)
    {
        $data = $this->topsisRepository->getMatriksYKriteria($kriteria_id);
        return $data;
    }
    public function simpanMatriksY($data)
    {
        $validate = $this->topsisRepository->getMatriksYKriteriaAlternatif($data['kriteria_id'], $data['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addMatriksY($data);

        } elseif ($validate != null) {
            $this->topsisRepository->updateMatriksY($data);
        }
    }

    // Ideal
    public function getIdealPositif()
    {
        $data = $this->topsisRepository->getIdealPositif();
        return $data;
    }
    public function simpanIdealPositif($data)
    {
        $validate = $this->topsisRepository->getIdealPositifKriteriaAlternatif($data['kriteria_id'], $data['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addIdealPositif($data);

        } elseif ($validate != null) {
            $this->topsisRepository->updateIdealPositif($data);
        }
    }
    public function getIdealNegatif()
    {
        $data = $this->topsisRepository->getIdealNegatif();
        return $data;
    }
    public function simpanIdealNegatif($data)
    {
        $validate = $this->topsisRepository->getIdealNegatifKriteriaAlternatif($data['kriteria_id'], $data['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addIdealNegatif($data);

        } elseif ($validate != null) {
            $this->topsisRepository->updateIdealNegatif($data);
        }
    }

    // Solusi Ideal
    public function getSolusiIdealPositif()
    {
        $data = $this->topsisRepository->getSolusiIdealPositif();
        return $data;
    }
    public function simpanSolusiIdealPositif($solusiIdealPositif)
    {
        $validate = $this->topsisRepository->getSolusiIdealPositifKriteria($solusiIdealPositif['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addSolusiIdealPositif($solusiIdealPositif);

        } elseif ($validate != null) {
            $this->topsisRepository->updateSolusiIdealPositif($solusiIdealPositif);
        }
    }
    public function getSolusiIdealNegatif()
    {
        $data = $this->topsisRepository->getSolusiIdealNegatif();
        return $data;
    }
    public function simpanSolusiIdealNegatif($solusiIdealNegatif)
    {
        $validate = $this->topsisRepository->getSolusiIdealNegatifKriteria($solusiIdealNegatif['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addSolusiIdealNegatif($solusiIdealNegatif);

        } elseif ($validate != null) {
            $this->topsisRepository->updateSolusiIdealNegatif($solusiIdealNegatif);
        }
    }

    // Hasil Topsis
    public function getHasilTopsis()
    {
        $data = $this->topsisRepository->getHasilTopsis();
        return $data;
    }
    public function simpanHasilTopsis($data)
    {
        $validate = $this->topsisRepository->getHasilTopsisAlternatif($data['alternatif_id']);
        if ($validate == null) {
            $this->topsisRepository->addHasilTopsis($data);

        } elseif ($validate != null) {
            $this->topsisRepository->updateHasilTopsis($data);
        }
    }
}