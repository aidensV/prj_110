@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kurikulum Capaian Pembelajaran
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Semester') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->semester }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Kode Matkul') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->kode_matkul }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Nama Matkul') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->nama_matkul }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Matkul Kompetensi') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->matkul_kompetensi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot Kredit Kuliah') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_kuliah }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot Kredit Seminar') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_seminar }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot Kredit Praktikum') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_praktikum }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Konversi Kredit Ke jam') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->konversi_kredit_ke_jam }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Capaian Pembelajaran Sikap') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_sikap }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Capaian Pembelajaran Pengetahuan') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_pengetahuan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Capaian Pembelajaran Keterampilan Umum') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_keterampilan_umum }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Capaian Pembelajaran Keterampilan Khusus') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_keterampilan_khusus }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Dokumen Rencana Pembelajaran') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->dokummen_rencana_pembelajaran }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Unit Penyelenggara') }}
                    </th>
                    <td>
                        {{ $m_5a_kurikulum_capaian_pmbljrn->unit_penyelenggara }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection