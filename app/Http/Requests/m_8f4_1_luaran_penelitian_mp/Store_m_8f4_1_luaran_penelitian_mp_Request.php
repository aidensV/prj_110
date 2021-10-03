<?php

namespace App\Http\Requests\m_8f4_1_luaran_penelitian_mp;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8f4_1_luaran_penelitian_mp_Request extends FormRequest
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
