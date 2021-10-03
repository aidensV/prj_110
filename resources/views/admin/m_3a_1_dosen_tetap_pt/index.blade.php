@extends('layouts.admin')
@section('content')
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_3a_1_dosen_tetap_pt.create") }}">
                Tambah Dosen Tetap PT
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Dosen Tetap Perguruan Tinggi
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Nama Dosen
                        </th>
                        <th>
                            NIDN/NIDK
                        </th>
                        <th>
                            Pendidikan Pascasarjana Magister/Magister Terapan/Spesialis
                        </th>
                        <th>
                            Pendidikan Pascasarjana Doktor/Doktor Terapan/Spesialis
                        </th>
                        <th>
                            Bidang Keahlian
                        </th>
                        <th>
                            Kesesuaian dengan Kompetensi Inti PS
                        </th>
                        <th>
                            Jabatan Akademik
                        </th>
                        <th>
                            Sertifikat Pendidik Profesional
                        </th>
                        <th>
                            Sertifikat  Kompetensi/Profesi/Industri
                        </th>
                        <th>
                            Mata Kuliah yang Diampu pada PS yang Diakreditasi
                        </th>
                        <th>
                            Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu
                        </th>
                        <th>
                            Mata Kuliah yang Diampu pada PS Lain
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_3a_1_dosen_tetap_pt as $key => $m_3a_1_dosen_tetap_pt)
                        <tr data-entry-id="{{ $m_3a_1_dosen_tetap_pt->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->nama_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->nidn_nidk ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->psc_srjn_m_mt_sp ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->psc_srjn_d_dt_sp?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->bidang_keahlian ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->kssn_komptn_inti_ps ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->jabatan_akademik ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->serti_pendidik_pro ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->serti_komptnsi_profesi_indstr ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->matkul_ps_akreditasi ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->kssn_bdg_keahlian_dg_matkul ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_1_dosen_tetap_pt->matkul_ps_lain ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a_1_dosen_tetap_pt.show', $m_3a_1_dosen_tetap_pt->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_3a_1_dosen_tetap_pt.edit', $m_3a_1_dosen_tetap_pt->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_3a_1_dosen_tetap_pt.destroy', $m_3a_1_dosen_tetap_pt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.r_3a_1_dosen_tetap_pt.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('lkps_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
