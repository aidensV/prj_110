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
                        @foreach ($m_borang->indikator as $item)
                        
                            {{ $item->value_indicator }}<br>
                        
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
                        {{ trans('Bobot Sumber') }}
                    </th>
                    <td>
                        {{ $m_borang->bobot_sumber }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Bobot Ami') }}
                    </th>
                    <td>
                        {{ $m_borang->bobot_ami }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Capaian') }}
                    </th>
                    <td>
                        {{ $m_borang->capaian }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Persen Kinerja') }}
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