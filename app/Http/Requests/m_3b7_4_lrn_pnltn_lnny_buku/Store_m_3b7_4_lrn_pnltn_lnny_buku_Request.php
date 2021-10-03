<?php

namespace App\Http\Requests\m_3b7_4_lrn_pnltn_lnny_buku;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_3b7_4_lrn_pnltn_lnny_buku_Request extends FormRequest
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
