<?php

namespace App\Http\Requests\m_4_penggunaan_data;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_4_penggunaan_data_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'jenis_penggunaan' => [
                'required',
            ],
        ];
    }
}
