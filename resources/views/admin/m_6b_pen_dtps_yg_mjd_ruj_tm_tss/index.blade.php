@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.create") }}">
            Tambah Penelitian DTPS Yang Menjadi Rujukan Tema Tesis
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Penelitian DTPS Yang Menjadi Rujukan Tema Tesis
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
                            Tema Penelitian Sesuai Roadmap
                        </th>
                        <th>
                            Nama Mahasiswa
                        </th>
                        <th>
                            Judul Kegiatan
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_6b_pen_dtps_yg_mjd_ruj_tm_tss as $key => $m_6b_pen_dtps_yg_mjd_ruj_tm_tss)
                        <tr data-entry-id="{{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->nama_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->tema_penelitian_sesuai_roadmap ?? '' }}
                            </td>
                            <td>
                                {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->nama_mahasiswa ?? '' }}
                            </td>
                            <td>
                                {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->judul_kegiatan ?? '' }}
                            </td>
                            <td>
                                {{ $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->tahun ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.show', $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.edit', $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.destroy', $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.massDestroy') }}",
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