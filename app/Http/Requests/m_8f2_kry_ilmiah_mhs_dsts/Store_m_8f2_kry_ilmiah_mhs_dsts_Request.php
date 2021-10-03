<?php

namespace App\Http\Requests\m_8f2_kry_ilmiah_mhs_dsts;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_8f2_kry_ilmiah_mhs_dsts_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'nama_mahasiswa' => [
                'required',
            ],
        ];
    }
}
