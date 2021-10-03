<?php

namespace App\Http\Requests\elemen_led;

use Illuminate\Foundation\Http\FormRequest;

class Update_elemen_led_Request extends FormRequest
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
