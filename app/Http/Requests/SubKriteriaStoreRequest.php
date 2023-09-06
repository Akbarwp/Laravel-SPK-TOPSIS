<?php

namespace App\Http\Requests;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Foundation\Http\FormRequest;

class SubKriteriaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "kode" => "required|string|max:255",
            "nama" => "required|string|max:255",
            "nilai" => "required|numeric|min:0|max:9",
            "kriteria_id" => "required|numeric",
        ];
    }

    protected function prepareForValidation(): void
    {
        $cekKode = SubKriteria::where('kriteria_id', $this->kriteria_id)->get();
        if ($cekKode->first() != null) {
            $ctr = 1;
            foreach ($cekKode as $item) {
                $ctr = substr($item->kode, 1) + 1;
            }
            $kode = rtrim($cekKode[0]->kode, "1") . $ctr;
        } else {
            $kode = Kriteria::where('id', $this->kriteria_id)->first()['kode'] . 1;
        }

        $this->merge([
            'kode' => $kode,
        ]);
    }
}
