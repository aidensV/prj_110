@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Industri
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen Industri') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->nama_dosen_industri }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('NIDK') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->nidk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Perusahaan ') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->perusahaan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Pendidikan Tertinggi') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->pendidikan_tertinggi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bidang Keahlian') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->bidang_keahlian }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Sertifikat Profesi') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->sertifikat_profesi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Mata Kuliah') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->mata_kuliah }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot Kredit') }}
                    </th>
                    <td>
                        {{ $m_3a5_dosen_industri->bobot_kredit }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection