<?php

namespace App\Http\Requests\m_6a_pnltn_dtps_yg_mlbtkn_mhs;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_6a_pnltn_dtps_yg_mlbtkn_mhs_Request extends FormRequest
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
