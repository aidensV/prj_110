@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_5a_kurikulum_capaian_pmbljrn.create") }}">
            Tambah Kurikulum Capaian Pembelajaran
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Kurikulum Capaian Pembelajaran
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Semester
                        </th>
                        <th>
                            Kode Matkul
                        </th>
                        <th>
                            Nama Matkul
                        </th>
                        <th>
                            Matkul Kompetensi
                        </th>
                        <th>
                            Bobot Kredit Kuliah
                        </th>
                        <th>
                            Bobot Kredit Seminar
                        </th>
                        <th>
                            Bobot Kredit Praktikum
                        </th>
                        <th>
                            Konversi Kredit Ke jam
                        </th>
                        <th>
                            Capaian Pembelajaran Sikap
                        </th>
                        <th>
                            Capaian Pembelajaran Pengetahuan
                        </th>
                        <th>
                            Capaian Pembelajaran Keterampilan Umum
                        </th>
                        <th>
                            Capaian Pembelajaran Keterampilan Khusus
                        </th>
                        <th>
                            Dokumen Rencana Pembelajaran
                        </th>
                        <th>
                            Unit Penyelenggara
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_5a_kurikulum_capaian_pmbljrn as $key => $m_5a_kurikulum_capaian_pmbljrn)
                        <tr data-entry-id="{{ $m_5a_kurikulum_capaian_pmbljrn->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->semester ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->kode_matkul ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->nama_matkul ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->matkul_kompetensi ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_kuliah ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_seminar ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_praktikum ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->konversi_kredit_ke_jam ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_sikap ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_pengetahuan ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_keterampilan_umum ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_keterampilan_khusus ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->dokummen_rencana_pembelajaran ?? '' }}
                            </td>
                            <td>
                                {{ $m_5a_kurikulum_capaian_pmbljrn->unit_penyelenggara ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_5a_kurikulum_capaian_pmbljrn.show', $m_5a_kurikulum_capaian_pmbljrn->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_5a_kurikulum_capaian_pmbljrn.edit', $m_5a_kurikulum_capaian_pmbljrn->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_5a_kurikulum_capaian_pmbljrn.destroy', $m_5a_kurikulum_capaian_pmbljrn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_5a_kurikulum_capaian_pmbljrn.massDestroy') }}",
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
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
