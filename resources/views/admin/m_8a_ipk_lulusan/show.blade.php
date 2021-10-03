@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        IPK LULUSAN
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Tahun Lulus
                    </th>
                    <td>
                        {{ $m_8a_ipk_lulusan->tahun_lulus }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Jumlah Lulusan
                    </th>
                    <td>
                        {{ $m_8a_ipk_lulusan->jumlah_lulusan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        IPK Min
                    </th>
                    <td>
                        {{ $m_8a_ipk_lulusan->ipk_min }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        IPK Rata-rata
                    </th>
                    <td>
                        {{ $m_8a_ipk_lulusan->ipk_rata_rata }}
                    </td>
                    </tr>
                
                <tr>
                    <th>
                        IPK Maks
                    </th>
                    <td>
                        {{ $m_8a_ipk_lulusan->ipk_maks }}
                    </td>
                    </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection