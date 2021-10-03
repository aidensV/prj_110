@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Integrasi Kegiatan Penelitian
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Judul Penelitian') }}
                    </th>
                    <td>
                        {{ $m_5b_integrasi_keg_penelitian->judul_penelitian }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_5b_integrasi_keg_penelitian->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Mata Kuliah') }}
                    </th>
                    <td>
                        {{ $m_5b_integrasi_keg_penelitian->mata_kuliah }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bentuk Integrasi') }}
                    </th>
                    <td>
                        {{ $m_5b_integrasi_keg_penelitian->bentuk_integrasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_5b_integrasi_keg_penelitian->tahun }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection