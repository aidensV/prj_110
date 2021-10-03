@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Karya Ilmiah DTPS yang Disitasi
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_3b5_krya_ilmiah_dtps_yg_dstasi->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Judul Artikel yang Disitasi2') }}
                    </th>
                    <td>
                        {{ $m_3b5_krya_ilmiah_dtps_yg_dstasi->judul_artikel_yang_disitasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Sitasi') }}
                    </th>
                    <td>
                        {{ $m_3b5_krya_ilmiah_dtps_yg_dstasi->jumlah_sitasi }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection