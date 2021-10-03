@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian/PKM yang Dihasilkan Mahasiswa
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Luaran Penelitian dan PKM
                    </th>
                    <td>
                        {{ $m_8f4_1_luaran_penelitian_mp->luaran_penelitian_dan_pkm }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Tahun
                    </th>
                    <td>
                        {{ $m_8f4_1_luaran_penelitian_mp->tahun }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Keterangan
                    </th>
                    <td>
                        {{ $m_8f4_1_luaran_penelitian_mp->keterangan }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection