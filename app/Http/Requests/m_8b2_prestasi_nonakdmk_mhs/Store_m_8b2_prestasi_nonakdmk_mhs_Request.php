<?php

namespace App\Http\Requests\m_8b2_prestasi_nonakdmk_mhs;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8b2_prestasi_nonakdmk_mhs_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'nama_kegiatan' => [
                'required',
            ],
        ];
    }
}
