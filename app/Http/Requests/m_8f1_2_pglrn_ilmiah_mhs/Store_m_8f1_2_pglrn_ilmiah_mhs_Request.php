<?php

namespace App\Http\Requests\m_8f1_2_pglrn_ilmiah_mhs;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8f1_2_pglrn_ilmiah_mhs_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'jenis_publikasi' => [
                'required',
            ],
        ];
    }
}
