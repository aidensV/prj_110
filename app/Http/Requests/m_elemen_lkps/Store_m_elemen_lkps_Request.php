<?php

namespace App\Http\Requests\m_elemen_lkps;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_elemen_lkps_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'kriteria' => [
                'required',
            ],
        ];
    }
}
