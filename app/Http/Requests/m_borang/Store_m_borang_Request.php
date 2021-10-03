<?php

namespace App\Http\Requests\m_borang;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_borang_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'elemen' => [
                'required',
            ],
        ];
    }
}
