<?php

namespace App\Http\Requests\m_3a4_dosen_tidak_tetap;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_3a4_dosen_tidak_tetap_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'nama_dosen' => [
                'required',
            ],
        ];
    }
}
