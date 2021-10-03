@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Tetap Perguruan Tinggi
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Nama Dosen
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        NIDN/NIDK
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->nidn_nidk }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Pendidikan Pascasarjana Magister/Magister Terapan/Spesialis
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->psc_srjn_m_mt_sp }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Pendidikan Pascasarjana Doktor/Doktor Terapan/Spesialis
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->psc_srjn_d_dt_sp }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Bidang Keahlian
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->bidang_keahlian }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Kesesuaian dengan Kompetensi Inti PS
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->kssn_komptn_inti_ps }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jabatan Akademik
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->jabatan_akademik }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Sertifikat Pendidik Profesional
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->serti_pendidik_pro }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Sertifikat  Kompetensi/Profesi/Industri
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->serti_komptnsi_profesi_indstr }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mata Kuliah yang Diampu pada PS yang Diakreditasi
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->matkul_ps_akreditasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->kssn_bdg_keahlian_dg_matkul }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mata Kuliah yang Diampu pada PS Lain
                    </th>
                    <td>
                        {{ $m_3a_1_dosen_tetap_pt->matkul_ps_lain }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection