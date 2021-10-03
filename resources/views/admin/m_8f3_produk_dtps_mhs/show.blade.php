@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Produk DTPS Mahasiswa
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nama Mahasiswa
                    </th>
                    <td>
                        {{ $m_8f3_produk_dtps_mhs->nama_mahasiswa }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Nama Produk
                    </th>
                    <td>
                        {{ $m_8f3_produk_dtps_mhs->nama_produk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Deskripsi Produk
                    </th>
                    <td>
                        {{ $m_8f3_produk_dtps_mhs->deskripsi_produk }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Bukti
                    </th>
                    <td>
                        {{ $m_8f3_produk_dtps_mhs->Bukti }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Tahun
                    </th>
                    <td>
                        {{ $m_8f3_produk_dtps_mhs->tahun }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection