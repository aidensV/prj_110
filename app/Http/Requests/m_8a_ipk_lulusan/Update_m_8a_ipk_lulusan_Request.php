<?php

namespace App\Http\Requests\m_8a_ipk_lulusan;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8a_ipk_lulusan_Request extends FormRequest
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
