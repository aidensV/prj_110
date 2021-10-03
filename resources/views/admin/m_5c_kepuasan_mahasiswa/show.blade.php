@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kepuasan Mahasiswa
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Aspek Yang Diukur') }}
                    </th>
                    <td>
                        {{ $m_5c_kepuasan_mahasiswa->aspek_yang_diukur }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Kepuasan Mahasiswa Sangat Baik') }}
                    </th>
                    <td>
                        {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_sangat_baik }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Kepuasan Mahasiswa Baik') }}
                    </th>
                    <td>
                        {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_baik }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Kepuasan Mahasiswa Cukup') }}
                    </th>
                    <td>
                        {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_cukup }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tingkat Kepuasan Mahasiswa Kurang') }}
                    </th>
                    <td>
                        {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_kurang }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Rencana Tidak Lanjut Oleh UPPS') }}
                    </th>
                    <td>
                        {{ $m_5c_kepuasan_mahasiswa->rencana_tidak_lanjut_oleh_upps }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection