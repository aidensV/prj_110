@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Penggunaan Data
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Jenis Penggunaan') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->jenis_penggunaan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('UPPS TS2') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->upps_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('UPPS TS1') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->upps_ts1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('UPPS TS') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->upps_ts }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Program Studi TS2') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->program_studi_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Program Studi TS1') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->program_studi_ts1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Program Studi TS') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->program_studi_ts }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Rata Rata') }}
                    </th>
                    <td>
                        {{ $m_4_penggunaan_data->rata_rata }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection