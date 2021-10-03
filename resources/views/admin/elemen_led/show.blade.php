@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Elemen LED
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Kriteria') }}
                    </th>
                    <td>
                        {{ $elemen_led->kriteria }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Deskripsi') }}
                    </th>
                    <td>
                        {{ $elemen_led->deskripsi }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot') }}
                    </th>
                    <td>
                        {{ $elemen_led->bobot }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection