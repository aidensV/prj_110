<?php

namespace App\Http\Requests\m_3a_1_dosen_tetap_pt;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3a_1_dosen_tetap_pt_Request extends FormRequest
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
