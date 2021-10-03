@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Penelitian DTPS
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Sumber Pembiayaan') }}
                    </th>
                    <td>
                        {{ $m_3b2_penelitian_dtps->sumber_pembiayaan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul Penelitian TS2') }}
                    </th>
                    <td>
                        {{ $m_3b2_penelitian_dtps->jumlah_judul_penelitian_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul Penelitian TS1') }}
                    </th>
                    <td>
                        {{ $m_3b2_penelitian_dtps->jumlah_judul_penelitian_ts1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah Judul Penelitian TS') }}
                    </th>
                    <td>
                        {{ $m_3b2_penelitian_dtps->jumlah_judul_penelitian_ts }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah') }}
                    </th>
                    <td>
                        {{ $m_3b2_penelitian_dtps->jumlah }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection