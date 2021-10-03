<?php

namespace App\Http\Requests\m_audit;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_audit_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'tgl_mulai' => [
                'required',
            ],
        ];
    }
}
