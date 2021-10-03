<?php

namespace App\Http\Requests\m_3b5_krya_ilmiah_dtps_yg_dstasi;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_3b5_krya_ilmiah_dtps_yg_dstasi_Request extends FormRequest
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
