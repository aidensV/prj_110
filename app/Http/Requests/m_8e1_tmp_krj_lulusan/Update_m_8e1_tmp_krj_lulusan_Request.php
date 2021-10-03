<?php

namespace App\Http\Requests\m_8e1_tmp_krj_lulusan;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8e1_tmp_krj_lulusan_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'tahun_lulus' => [
                'required',
            ],
        ];
    }
}
