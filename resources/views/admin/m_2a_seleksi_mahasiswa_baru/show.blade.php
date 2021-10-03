@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Seleksi Mahasiswa Baru
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tahun Akademik
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->tahun_akademik }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Daya Tampung
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->daya_tampung }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Calon Mahasiswa Pendaftar
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->jmlh_calon_mhs_pendftr }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Calon Mahasiswa Lulus Seleksi
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->jmlh_calon_mhs_lulus_seleksi }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Baru Reguler
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_baru_reg }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Baru Transfer
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_baru_trf }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Aktif Reguler
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_aktif_reg }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Aktif Transfer
                    </th>
                    <td>
                        {{ $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_aktif_trf }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection