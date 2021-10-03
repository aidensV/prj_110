<?php

namespace App\Http\Requests\m_audit;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_audit_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
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
