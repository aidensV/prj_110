<?php

namespace App\Http\Requests\m_7_pkm_dtps_yg_melibatkan_mhs;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_7_pkm_dtps_yg_melibatkan_mhs_Request extends FormRequest
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
