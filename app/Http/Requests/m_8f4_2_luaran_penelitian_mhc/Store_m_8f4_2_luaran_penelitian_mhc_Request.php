<?php

namespace App\Http\Requests\m_8f4_2_luaran_penelitian_mhc;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8f4_2_luaran_penelitian_mhc_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'luaran_penelitian_dan_pkm' => [
                'required',
            ],
        ];
    }
}
