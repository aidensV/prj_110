@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Tidak Tetap
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('NIDN NIDK') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->nidn_nidk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Pendidikan Pasca Sarjana ') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->pendidikan_pasca_sarjana }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bidang Keahlian') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->bidang_keahlian }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jabatan Akademik') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->jabatan_akademik }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Sertifikat Pendidik Profesional') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->sertifikat_pendidik_profesional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Sertifikat Kompetensi Profesi Industri') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->sertifikat_kompetensi_profesi_industri }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Matkul PS Akreditasi') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->matkul_ps_akreditasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Kesesuaian Dengan Matkul') }}
                    </th>
                    <td>
                        {{ $m_3a4_dosen_tidak_tetap->kesesuaian_dengan_matkul }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection