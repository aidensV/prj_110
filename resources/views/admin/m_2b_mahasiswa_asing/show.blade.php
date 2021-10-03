@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Mahasiswa Asing
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Program Studi
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->program_studi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Aktif TS2
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_aktif_ts2}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Aktif TS1
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_aktif_ts1}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Aktif TS
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_aktif_ts}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Asing Fulltime TS2
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_asing_fulltime_ts2}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Asing Fulltime TS1
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_asing_fulltime_ts1}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Asing Fulltime TS
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_asing_fulltime_ts}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Asing Parttime TS2
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_asing_parttime_ts2 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Asing Parttime TS1
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_asing_parttime_ts1 }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Mahasiswa Asing Parttime TS
                    </th>
                    <td>
                        {{ $m_2b_mahasiswa_asing->jml_mhs_asing_parttime_ts }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection