<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = "sub_kriteria";
    protected $primaryKey = "id";
    public $incrementing = "true";
    // protected $keyType = "string";
    public $timestamps = "true";
    protected $fillable = [
        "kode",
        "nama",
        "nilai",
        "kriteria_id",
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
}
