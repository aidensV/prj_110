@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LED
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Elemen LED') }}
                    </th>
                    <td>
                        {{ $m_led->elemen_led }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Ket') }}
                    </th>
                    <td>
                        {{ $m_led->ket }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Penjelasan') }}
                    </th>
                    <td>
                        {{ $m_led->penjelasan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection