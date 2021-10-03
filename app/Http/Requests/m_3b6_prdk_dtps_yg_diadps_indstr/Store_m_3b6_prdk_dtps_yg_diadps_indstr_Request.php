<?php

namespace App\Http\Requests\m_3b6_prdk_dtps_yg_diadps_indstr;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3b6_prdk_dtps_yg_diadps_indstr_Request extends FormRequest
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
