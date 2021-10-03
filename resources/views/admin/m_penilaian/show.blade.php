@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Penilaian
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Kategori Strata') }}
                    </th>
                    <td>
                        {{ $m_penilaian->kategori_strata }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Nilai Asesmen') }}
                    </th>
                    <td>
                        {{ $m_penilaian->nilai_asesmen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('SP Teakreditasi') }}
                    </th>
                    <td>
                        {{ $m_penilaian->sp_terakreditasi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('SP Unggul') }}
                    </th>
                    <td>
                        {{ $m_penilaian->sp_unggul }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('SP Baik Sekali') }}
                    </th>
                    <td>
                        {{ $m_penilaian->sp_baik_sekali }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection