<?php

namespace App\Http\Requests\m_iku;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_iku_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'indikator' => [
                'required',
            ],
        ];
    }
}
