<?php

namespace App\Http\Requests\m_3a_1_dosen_tetap_pt;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_3a_1_dosen_tetap_pt_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
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
