@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Waktu Tunggu Lulusan Diploma
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tahun Lulusan
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->thn_lulusan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Lulusan
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah lulusan Terlacak
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_terlacak }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Lulusan yang dipesan sebelum Lulus
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_dipesan_sblm_luluss }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan < 3bln
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_pekerjaan_wt_krg3bln }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan 3-6bln
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_pekerjaan_wt_3blnsmp6bln }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan >6bln
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_pekerjaan_wt_lbh6bln }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection