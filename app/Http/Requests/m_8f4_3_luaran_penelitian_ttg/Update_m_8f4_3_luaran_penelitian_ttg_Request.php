<?php

namespace App\Http\Requests\m_8f4_3_luaran_penelitian_ttg;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8f4_3_luaran_penelitian_ttg_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'luaran_penelitian_dan_pkm' => [
                'required',
            ],
        ];
    }
}
