<?php

namespace App\Http\Requests\m_1_3_kerjasama_pengabdian_masyarakat;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_1_3_kerjasama_pengabdian_masyarakat_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'lembaga_mitra' => [
                'required',
            ],
        ];
    }
}
