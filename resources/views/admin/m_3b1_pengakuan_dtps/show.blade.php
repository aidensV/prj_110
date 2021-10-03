@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Pengakuan DTPS
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bidang Keahlian') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->bidang_keahlian }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Rekognisi Dan Bukti Pendukung') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->rekognisi_dan_bukti_pendukung }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Internasional') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->tingkat_internasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Nasional') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->tingkat_nasional }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Wilayah') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->tingkat_wilayah }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_3b1_pengakuan_dtps->tahun }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection