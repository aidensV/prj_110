<?php

namespace App\Http\Requests\m_3b7_3_lrn_pnltn_lnny_tknlg_cpt;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3b7_3_lrn_pnltn_lnny_tknlg_cpt_Request extends FormRequest
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
