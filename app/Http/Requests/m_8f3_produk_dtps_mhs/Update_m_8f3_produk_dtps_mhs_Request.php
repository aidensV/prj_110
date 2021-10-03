<?php

namespace App\Http\Requests\m_8f3_produk_dtps_mhs;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8f3_produk_dtps_mhs_Request extends FormRequest
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
