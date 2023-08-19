<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenilaianRequest extends FormRequest
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
            "alternatif_id" => "required|numeric",
            "kriteria_id" => "required|numeric",
            "sub_kriteria_id" => "required|numeric",
        ];
    }
}