<?php

namespace App\Http\Requests\m_led_penilaian;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_led_penilaian_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'skor' => [
                'required',
            ],
        ];
    }
}
