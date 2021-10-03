@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LED Penilaian
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('Elemen LED Id') }}
                    </th>
                    <td>
                        {{ $m_led_penilaian->elemen_led_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Skor') }}
                    </th>
                    <td>
                        {{ $m_led_penilaian->skor }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bukti Kinerja') }}
                    </th>
                    <td>
                        {{ $m_led_penilaian->bukti_kinerja }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection