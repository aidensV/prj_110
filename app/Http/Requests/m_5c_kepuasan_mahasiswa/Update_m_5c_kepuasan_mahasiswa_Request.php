<?php

namespace App\Http\Requests\m_5c_kepuasan_mahasiswa;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_5c_kepuasan_mahasiswa_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'aspek_yang_diukur' => [
                'required',
            ],
        ];
    }
}
