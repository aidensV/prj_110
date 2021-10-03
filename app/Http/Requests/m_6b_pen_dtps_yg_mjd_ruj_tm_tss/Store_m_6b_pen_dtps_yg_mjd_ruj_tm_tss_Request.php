<?php

namespace App\Http\Requests\m_6b_pen_dtps_yg_mjd_ruj_tm_tss;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_6b_pen_dtps_yg_mjd_ruj_tm_tss_Request extends FormRequest
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
