<?php

namespace App\Http\Requests\m_3a5_dosen_industri;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3a5_dosen_industri_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'nama_dosen_industri' => [
                'required',
            ],
        ];
    }
}
