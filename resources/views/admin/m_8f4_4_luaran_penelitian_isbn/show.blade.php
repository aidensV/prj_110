@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian/PKM yang Dihasilkan Mahasiswa (Buku ber-ISBN)
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Luaran Penelitian dan PKM
                    </th>
                    <td>
                        {{ $m_8f4_4_luaran_penelitian_isbn->luaran_penelitian_dan_pkm }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tahun
                    </th>
                    <td>
                        {{ $m_8f4_4_luaran_penelitian_isbn->tahun }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Keterangan
                    </th>
                    <td>
                        {{ $m_8f4_4_luaran_penelitian_isbn->keterangan }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection