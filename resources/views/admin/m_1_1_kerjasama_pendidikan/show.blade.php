@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kerjasama Pendidikan
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tingkat Internasional
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->tingkat_internasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat nasional
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->tingkat_nasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat Wilayah
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->tingkat_wilayah }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Judul Kegiatan Kerjasama
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->judul_kegiatan_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Manfaat Bagi Program Studi
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->manfaat_bagi_ps }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Waktu dan Durasi
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->waktu_dan_durasi }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Tahun Berakhirnya Kerjasama
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->tahun_berakhirnya_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Lembaga Mitra
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->lembaga_mitra }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Bukti kerjasama
                    </th>
                    <td>
                        {{ $m_1_1_kerjasama_pendidikan->bukti_kerjasama }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection