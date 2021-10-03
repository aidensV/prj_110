<?php

namespace App\Http\Requests\m_lkps_penilaian;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_lkps_penilaian_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'skor' => [
                'required',
            ],
        ];
    }
}
