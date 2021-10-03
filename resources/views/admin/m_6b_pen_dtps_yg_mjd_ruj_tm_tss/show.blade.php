@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Penelitian DTPS Yang Menjadi Rujukan Tema Tesis
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tema Penelitian Sesuai Roadmap') }}
                    </th>
                    <td>
                        {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->tema_penelitian_sesuai_roadmap }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Nama Mahasiswa') }}
                    </th>
                    <td>
                        {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->nama_mahasiswa }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Judul Kegiatan') }}
                    </th>
                    <td>
                        {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->judul_kegiatan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->tahun }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection