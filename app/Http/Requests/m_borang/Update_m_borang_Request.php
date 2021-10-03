<?php

namespace App\Http\Requests\m_borang;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_borang_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'elemen' => [
                'required',
            ],
        ];
    }
}
