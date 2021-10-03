<?php

namespace App\Http\Requests\m_8e2_kepuasan_pgn_llsn;

use Illuminate\Foundation\Http\FormRequest;

class Update_m_8e2_kepuasan_pgn_llsn_Request extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('lkps_edit');
    }

    public function rules()
    {
        return [
            'jenis_kemampuan' => [
                'required',
            ],
        ];
    }
}
