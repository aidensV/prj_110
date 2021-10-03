<?php

namespace App\Http\Requests\m_8c_masastudi_llsn_dip;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8c_masastudi_llsn_dip_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'thn_msk' => [
                'required',
            ],
        ];
    }
}
