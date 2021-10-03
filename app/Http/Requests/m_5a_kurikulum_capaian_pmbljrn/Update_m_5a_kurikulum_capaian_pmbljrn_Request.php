<?php

namespace App\Http\Requests\m_5a_kurikulum_capaian_pmbljrn;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_5a_kurikulum_capaian_pmbljrn_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'semester' => [
                'required',
            ],
        ];
    }
}
