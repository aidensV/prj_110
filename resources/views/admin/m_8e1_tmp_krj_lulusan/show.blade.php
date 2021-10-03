@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tempat Kerja Lulusan
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tahun Lulusan
                    </th>
                    <td>
                        {{ $m_8e1_tmp_krj_lulusan->tahun_lulus }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Lulusan
                    </th>
                    <td>
                        {{ $m_8e1_tmp_krj_lulusan->jmlh_lulusan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah lulusan Terlacak
                    </th>
                    <td>
                        {{ $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Lulusan Terlacak Lokal
                    </th>
                    <td>
                        {{ $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak_lokal }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Lulusan Terlacak Nasional
                    </th>
                    <td>
                        {{ $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak_nasional }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Lulusan Terlacak Internasional
                    </th>
                    <td>
                        {{ $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak_internasional }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection