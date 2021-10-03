<?php

namespace App\Http\Requests\m_2a_seleksi_mahasiswa_baru;

use Illuminate\Foundation\Http\FormRequest;

class Store_m_2a_seleksi_mahasiswa_baru_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_create');
    }

    public function rules()
    {
        return [
            'tahun_akademik' => [
                'required',
            ],
        ];
    }
}
