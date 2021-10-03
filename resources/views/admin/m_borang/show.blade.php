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
                        {{ trans('Elemen') }}
                    </th>
                    <td>
                        {{ $m_borang->elemen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('No Standar') }}
                    </th>
                    <td>
                        {{ $m_borang->no_stndr }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Indikator Penilaian') }}
                    </th>
                    <td>
                        @foreach ($data_detail as $item)
                        
                            {{ $item }}<br>
                        
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Skor PS') }}
                    </th>
                    <td>
                        {{ $m_borang->skor_PS }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Skor Auditor') }}
                    </th>
                    <td>
                        {{ $m_borang->skor_auditor }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Keterangan') }}
                    </th>
                    <td>
                        {{ $m_borang->ket }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Standar Unila') }}
                    </th>
                    <td>
                        {{ $m_borang->stnd_unila }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot') }}
                    </th>
                    <td>
                        {{ $m_borang->bobot }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Persen') }}
                    </th>
                    <td>
                        {{ $m_borang->persen }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Kinerja') }}
                    </th>
                    <td>
                        {{ $m_borang->kinerja }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Catatan') }}
                    </th>
                    <td>
                        {{ $m_borang->catatan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection