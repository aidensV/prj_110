@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Pagelaran Ilmiah DTPS
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Jenis Publikasi') }}
                    </th>
                    <td>
                        {{ $m_3b4_2_pagelaran_ilmiah_dtps->jenis_publikasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul TS2') }}
                    </th>
                    <td>
                        {{ $m_3b4_2_pagelaran_ilmiah_dtps->jmlh_judul_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul TS1') }}
                    </th>
                    <td>
                        {{ $m_3b4_2_pagelaran_ilmiah_dtps->jmlh_judul_ts1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul TS') }}
                    </th>
                    <td>
                        {{ $m_3b4_2_pagelaran_ilmiah_dtps->jmlh_judul_ts }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah') }}
                    </th>
                    <td>
                        {{ $m_3b4_2_pagelaran_ilmiah_dtps->jumlah }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection