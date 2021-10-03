<?php

namespace App\Http\Requests\m_1_1_kerjasama_pendidikan;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_1_1_kerjasama_pendidikan_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'lembaga_mitra' => [
                'required',
            ],
        ];
    }
}
