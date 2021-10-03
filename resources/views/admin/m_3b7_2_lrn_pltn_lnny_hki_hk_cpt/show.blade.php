@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian Lainnya HKI Hak Cipta
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Luaran Penelitian dan PKM') }}
                    </th>
                    <td>
                        {{ $m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->luaran_penelitian_dan_pkm }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tahun') }}
                    </th>
                    <td>
                        {{ $m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->tahun }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Keterangan') }}
                    </th>
                    <td>
                        {{ $m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->keterangan }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection