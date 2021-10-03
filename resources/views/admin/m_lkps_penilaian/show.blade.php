@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LKPS Penilaian
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('Elemen LKPS Id') }}
                    </th>
                    <td>
                        {{ $m_lkps_penilaian->elemen_lkps_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Skor') }}
                    </th>
                    <td>
                        {{ $m_lkps_penilaian->skor }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection