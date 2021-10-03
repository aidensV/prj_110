@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Indikator Kinerja Utama
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Indikator') }}
                    </th>
                    <td>
                        {{ $m_iku->indikator }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Jumlah/Presentase') }}
                    </th>
                    <td>
                        {{ $m_iku->jmlh }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection