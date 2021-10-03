@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Masa Studi Lulusan Diploma
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tahun Masuk
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->thn_msk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa yang Diterima
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_mhs_diterima }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Lulus TS4
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_mhs_lulus_ts4 }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Lulus TS3
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_mhs_lulus_ts3 }}
                    </td>
                    </tr>
                
                <tr>
                    <th>
                        Jumlah Mahasiswa Lulus TS2
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_mhs_lulus_ts2 }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Lulus TS1
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_mhs_lulus_ts1 }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Lulus TS
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_mhs_lulus_ts }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Lulusan Akhir TS
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->jml_lulusan_akhir_ts }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Rata-rata Masa Studi
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->rata_masa_studi }}
                    </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection