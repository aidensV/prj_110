@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian Lainnya Paten
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Luaran Penelitian dan PKM') }}
                    </th>
                    <td>
                        {{ $m_3b7_1_luarn_pnltn_lainny_ptn->luaran_penelitian_dan_pkm }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_3b7_1_luarn_pnltn_lainny_ptn->tahun }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Keterangan') }}
                    </th>
                    <td>
                        {{ $m_3b7_1_luarn_pnltn_lainny_ptn->keterangan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection