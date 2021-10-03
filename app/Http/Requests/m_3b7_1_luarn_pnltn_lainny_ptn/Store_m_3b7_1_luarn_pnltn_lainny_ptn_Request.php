<?php

namespace App\Http\Requests\m_3b7_1_luarn_pnltn_lainny_ptn;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3b7_1_luarn_pnltn_lainny_ptn_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
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
