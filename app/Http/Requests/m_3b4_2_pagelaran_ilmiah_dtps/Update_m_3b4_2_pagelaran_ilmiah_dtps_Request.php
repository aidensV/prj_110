<?php

namespace App\Http\Requests\m_3b4_2_pagelaran_ilmiah_dtps;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_3b4_2_pagelaran_ilmiah_dtps_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'jenis_publikasi' => [
                'required',
            ],
        ];
    }
}
