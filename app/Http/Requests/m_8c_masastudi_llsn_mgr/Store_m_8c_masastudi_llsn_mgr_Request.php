<?php

namespace App\Http\Requests\m_8c_masastudi_llsn_mgr;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8c_masastudi_llsn_mgr_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
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
