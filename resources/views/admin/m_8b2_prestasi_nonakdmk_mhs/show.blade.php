@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Prestasi Non Akademik Mahasiswa
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                         Nama Kegiatan
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->nama_kegiatan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Waktu Perolehan
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->waktu_perolehan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        tingkat Lokal
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->tingkat_lokal }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Tingkat Nasional
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->tingkat_nasional }}
                    </td>
                    </tr>
                
                <tr>
                    <th>
                        Tingkat Internasional
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->tingkat_internasional }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Prestasi yang Dicapai
                    </th>
                    <td>
                        {{ $m_8b2_prestasi_nonakdmk_mhs->prestasi_yang_dicapai }}
                    </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection