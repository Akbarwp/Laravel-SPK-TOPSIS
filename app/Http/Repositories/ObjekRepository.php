<?php

namespace App\Http\Repositories;

use App\Models\Objek;

class ObjekRepository
{
    protected $objek;

    public function __construct(Objek $objek)
    {
        $this->objek = $objek;
    }

    public function getAll()
    {
        $data = $this->objek->orderBy('created_at', 'asc')->get();
        return $data;
    }

    public function simpan($data)
    {
        $data = $this->objek->create($data);
        return $data;
    }

    public function getDataById($id)
    {
        $data = $this->objek->where('id', $id)->firstOrFail();
        return $data;
    }

    public function perbarui($id, $data)
    {
        $data = $this->objek->where('id', $id)->update([
            "nama" => $data['nama'],
        ]);
        return $data;
    }

    public function hapus($id)
    {
        $data = $this->objek->where('id', $id)->delete();
        return $data;
    }
}