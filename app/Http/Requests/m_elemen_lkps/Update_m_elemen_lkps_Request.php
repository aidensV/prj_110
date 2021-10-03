<?php

namespace App\Http\Requests\m_elemen_lkps;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_elemen_lkps_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'kriteria' => [
                'required',
            ],
        ];
    }
}
