@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kepuasan Pengguna Lulusan
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Jenis Kemampuan
                    </th>
                    <td>
                        {{ $m_8e2_kepuasan_pgn_llsn->jenis_kemampuan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat Kepuasan Pengguna Sangat Baik
                    </th>
                    <td>
                        {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_sb }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat Kepuasan Pengguna Baik
                    </th>
                    <td>
                        {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_b }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Tingkat Kepuasan Pengguna Cukup
                    </th>
                    <td>
                        {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_c }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Tingkat Kepuasan Pengguna Kurang
                    </th>
                    <td>
                        {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_k }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Rencana Tindak Lanjut Oleh UPPS
                    </th>
                    <td>
                        {{ $m_8e2_kepuasan_pgn_llsn->rcn_tdk_lanjut_oleh_upps }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection