@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Pembimbing Utama Tugas Akhir
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nama Dosen
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mahasiswa yg di bimbing PS diakreditasi TS2
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mahasiswa yg di bimbing PS diakreditasi TS1
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts1 }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Mahasiswa yg di bimbing PS diakreditasi TS
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Mahasiswa yg di bimbing PS lain TS2
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->ps_lain_ts2 }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Mahasiswa yg di bimbing PS lain TS1
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->ps_lain_ts1 }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Mahasiswa yg di bimbing PS lain TS
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->ps_lain_ts }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Rata-rata Jumlah Bimbingan
                    </th>
                    <td>
                        {{ $m_3a_2_dospem_utama_ta->rata_jmlh_bimbingan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection