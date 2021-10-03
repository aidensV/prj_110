<?php

namespace App\Http\Requests\m_2b_mahasiswa_asing;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_2b_mahasiswa_asing_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'program_studi' => [
                'required',
            ],
        ];
    }
}
