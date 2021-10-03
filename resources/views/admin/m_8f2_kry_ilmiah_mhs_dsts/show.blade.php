@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Karya Ilmiah Mahasiswa yang Disitasi
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nama Mahasiswa
                    </th>
                    <td>
                        {{ $m_8f2_kry_ilmiah_mhs_dsts->nama_mahasiswa }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Judul Artikel yang Disitasi
                    </th>
                    <td>
                        {{ $m_8f2_kry_ilmiah_mhs_dsts->judul_artikel_yang_disitasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Sitasi
                    </th>
                    <td>
                        {{ $m_8f2_kry_ilmiah_mhs_dsts->jumlah_sitasi }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection