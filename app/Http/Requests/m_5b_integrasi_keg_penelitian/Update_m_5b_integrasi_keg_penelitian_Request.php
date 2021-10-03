<?php

namespace App\Http\Requests\m_5b_integrasi_keg_penelitian;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_5b_integrasi_keg_penelitian_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'judul_penelitian' => [
                'required',
            ],
        ];
    }
}
