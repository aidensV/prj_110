@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian Lainnya Buku
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Luaran Penelitian dan PKM') }}
                    </th>
                    <td>
                        {{ $m_3b7_4_lrn_pnltn_lnny_buku->luaran_penelitian_dan_pkm }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_3b7_4_lrn_pnltn_lnny_buku->tahun }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Keterangan') }}
                    </th>
                    <td>
                        {{ $m_3b7_4_lrn_pnltn_lnny_buku->keterangan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection