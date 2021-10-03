<?php

namespace App\Http\Requests\m_3b1_pengakuan_dtps;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_3b1_pengakuan_dtps_Request extends FormRequest
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
