<?php

namespace App\Http\Requests\m_8f2_kry_ilmiah_mhs_dsts;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8f2_kry_ilmiah_mhs_dsts_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
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
