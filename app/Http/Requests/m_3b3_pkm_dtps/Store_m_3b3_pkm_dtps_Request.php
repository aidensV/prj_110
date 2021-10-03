<?php

namespace App\Http\Requests\m_3b3_pkm_dtps;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3b3_pkm_dtps_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'sumber_pembiayaan' => [
                'required',
            ],
        ];
    }
}
