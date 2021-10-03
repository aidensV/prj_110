@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        PKM DTPS Yang Melibatkan Mahasiswa
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_7_pkm_dtps_yg_melibatkan_mhs->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tema Penelitian Sesuai Roadmap') }}
                    </th>
                    <td>
                        {{ $m_7_pkm_dtps_yg_melibatkan_mhs->tema_penelitian_sesuai_roadmap }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Nama Mahasiswa') }}
                    </th>
                    <td>
                        {{ $m_7_pkm_dtps_yg_melibatkan_mhs->nama_mahasiswa }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Judul Kegiatan') }}
                    </th>
                    <td>
                        {{ $m_7_pkm_dtps_yg_melibatkan_mhs->judul_kegiatan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_7_pkm_dtps_yg_melibatkan_mhs->tahun }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection