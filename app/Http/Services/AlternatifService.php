<?php

namespace App\Http\Services;

use App\Http\Repositories\AlternatifRepository;

class AlternatifService
{
    protected $alternatifRepository;
    
    public function __construct(AlternatifRepository $alternatifRepository)
    {
        $this->alternatifRepository = $alternatifRepository;
    }

    public function getAll()
    {
        $data = $this->alternatifRepository->getAll();
        return $data;
    }

    public function simpanPostData($request)
    {
        $validate = $request->validated();
        
        $alternatif = $this->alternatifRepository->getAll();
        foreach ($alternatif as $item) {
            if ($validate['objek_id'] == $item->objek_id) {
                $data = [false, "Data sudah ada di Alternatif"];
                return $data;
            }
        }

        $data = [true, $this->alternatifRepository->simpan($validate)];
        return $data;
    }

    public function hapusPostData($request)
    {
        $data = $this->alternatifRepository->hapus($request);
        return $data;
    }
}