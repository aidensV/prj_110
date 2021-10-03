<?php

namespace App\Http\Requests\m_3a_2_dospem_utama_ta;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3a_2_dospem_utama_ta_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'nama_dosen' => [
                'required',
            ],
        ];
    }
}
