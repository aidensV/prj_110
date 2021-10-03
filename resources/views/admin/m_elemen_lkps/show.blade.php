@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Elemen LKPS
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Kriteria') }}
                    </th>
                    <td>
                        {{ $m_elemen_lkps->kriteria }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Deskripsi') }}
                    </th>
                    <td>
                        {{ $m_elemen_lkps->deskripsi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot') }}
                    </th>
                    <td>
                        {{ $m_elemen_lkps->bobot }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Kode Tabel') }}
                    </th>
                    <td>
                        {{ $m_elemen_lkps->kode_tabel }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection