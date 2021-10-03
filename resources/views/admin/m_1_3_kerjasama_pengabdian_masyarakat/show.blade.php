@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kerjasama Pengabdian Masyarakat
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tingkat Internasional
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->tingkat_internasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat nasional
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->tingkat_nasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tingkat Wilayah
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->tingkat_wilayah }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Judul Kegiatan Kerjasama
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->judul_kegiatan_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Manfaat Bagi Program Studi
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->manfaat_bagi_ps }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Waktu dan Durasi
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->waktu_dan_durasi }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Bukti kerjasama
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->bukti_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Tahun Berakhirnya Kerjasama
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->tahun_berakhirnya_kerjasama }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Lembaga Mitra
                    </th>
                    <td>
                        {{ $m_1_3_kerjasama_pengabdian_masyarakat->lembaga_mitra }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection