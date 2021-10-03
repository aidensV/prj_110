@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Publikasi Ilmiah Mahasiswa
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Jenis Publikasi
                    </th>
                    <td>
                        {{ $m_8f1_1_publks_ilmiah_mhs->jenis_publikasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Judul TS2
                    </th>
                    <td>
                        {{ $m_8f1_1_publks_ilmiah_mhs->jumlah_judul_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Judul TS1
                    </th>
                    <td>
                        {{ $m_8f1_1_publks_ilmiah_mhs->jumlah_judul_ts1 }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Judul TS
                    </th>
                    <td>
                        {{ $m_8f1_1_publks_ilmiah_mhs->jumlah_judul_ts }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah 
                    </th>
                    <td>
                        {{ $m_8f1_1_publks_ilmiah_mhs->jumlah }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection