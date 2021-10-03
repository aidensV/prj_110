@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Waktu Tunggu Lulusan Sarjana
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tahun Lulusan
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->thn_lulus }}
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
                        Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan < 6bln
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_wt_krg6bln }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan 6-18bln
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_wt_6smp18bln }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan >18bln
                    </th>
                    <td>
                        {{ $m_8d1_wkt_llsn_dip->jmlh_lulusan_wt_lbh18bln }}
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection