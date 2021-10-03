<?php

namespace App\Http\Requests\m_8d1_wkt_llsn_dip;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8d1_wkt_llsn_dip_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'thn_lulusan' => [
                'required',
            ],
        ];
    }
}
