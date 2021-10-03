@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Produk DTPS yang Diadopsi Industri
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_3b6_prdk_dtps_yg_diadps_indstr->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Nama Produk') }}
                    </th>
                    <td>
                        {{ $m_3b6_prdk_dtps_yg_diadps_indstr->nama_produk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Deskripsi Produk') }}
                    </th>
                    <td>
                        {{ $m_3b6_prdk_dtps_yg_diadps_indstr->deskripsi_produk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bukti') }}
                    </th>
                    <td>
                        {{ $m_3b6_prdk_dtps_yg_diadps_indstr->bukti }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_3b6_prdk_dtps_yg_diadps_indstr->tahun }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection