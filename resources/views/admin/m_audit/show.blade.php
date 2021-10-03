@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Audit
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        {{ trans('Prodi Id') }}
                    </th>
                    <td>
                        {{ $m_audit->prodi_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Auditor Id') }}
                    </th>
                    <td>
                        {{ $m_audit->auditor_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tanggal Mulai') }}
                    </th>
                    <td>
                        {{ $m_audit->tgl_mulai }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('Tanggal Selesai') }}
                    </th>
                    <td>
                        {{ $m_audit->tgl_selesai }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection