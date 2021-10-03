<?php

namespace App\Http\Requests\m_iku;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_iku_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'indikator' => [
                'required',
            ],
        ];
    }
}
