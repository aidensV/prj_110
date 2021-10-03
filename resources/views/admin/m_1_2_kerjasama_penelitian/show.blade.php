@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kerjasama Penelitian
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tingkat Internasional
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->tingkat_internasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat nasional
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->tingkat_nasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat Wilayah
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->tingkat_wilayah }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Judul Kegiatan Kerjasama
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->judul_kegiatan_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Manfaat Bagi Program Studi
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->manfaat_bagi_ps }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Waktu dan Durasi
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->waktu_dan_durasi }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Bukti kerjasama
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->bukti_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Tahun Berakhirnya Kerjasama
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->tahun_berakhirnya_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Lembaga Mitra
                    </th>
                    <td>
                        {{ $m_1_2_kerjasama_penelitian->lembaga_mitra }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection