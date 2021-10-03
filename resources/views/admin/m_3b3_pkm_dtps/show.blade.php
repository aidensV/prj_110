@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        PKM DTPS
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Sumber Pembiayaan') }}
                    </th>
                    <td>
                        {{ $m_3b3_pkm_dtps->sumber_pembiayaan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul PKM TS2') }}
                    </th>
                    <td>
                        {{ $m_3b3_pkm_dtps->jmlh_judul_pkm_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul PKM TS1') }}
                    </th>
                    <td>
                        {{ $m_3b3_pkm_dtps->jmlh_judul_pkm_ts1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul PKM TS') }}
                    </th>
                    <td>
                        {{ $m_3b3_pkm_dtps->jmlh_judul_pkm_ts }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah') }}
                    </th>
                    <td>
                        {{ $m_3b3_pkm_dtps->jumlah }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection