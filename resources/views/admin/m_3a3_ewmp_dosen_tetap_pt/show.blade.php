@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        EWMP Dosen Tetap PT
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Nama Dosen') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->nama_dosen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('DTPS') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->dtps }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('PS Diakreditasi ') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->ps_diakreditasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('PS Lain Dalam PT') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->ps_lain_dalam_pt }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('PS Lain luar PT') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->ps_lain_luar_pt }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Penelitian') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->penelitian }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('PKM') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->pkm }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tugas Tambahan Penunjang') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->tugas_tambahan_penunjang }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->jumlah }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Rata Rata Per Semester') }}
                    </th>
                    <td>
                        {{ $m_3a3_ewmp_dosen_tetap_pt->rata_rata_per_semester }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection