<?php

namespace App\Http\Requests\m_led;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_led_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'elemen_led' => [
                'required',
            ],
        ];
    }
}
