@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_3a3_ewmp_dosen_tetap_pt.create") }}">
                Tambah EWMP Dosen Tetap PT
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        EWMP Dosen Tetap PT
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
                            DTPS
                        </th>
                        <th>
                            PS Diakreditasi
                        </th>
                        <th>
                            PS Lain Dalam PT
                        </th>
                        <th>
                            PS Lain luar PT
                        </th>
                        <th>
                            Penelitian
                        </th>
                        <th>
                            PKM
                        </th>
                        <th>
                            Tugas Tambahan Penunjang
                        </th>
                        <th>
                            Jumlah
                        </th>
                        <th>
                        Rata Rata Per Semester
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_3a3_ewmp_dosen_tetap_pt as $key => $m_3a3_ewmp_dosen_tetap_pt)
                        <tr data-entry-id="{{ $m_3a3_ewmp_dosen_tetap_pt->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->nama_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->dtps ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->ps_diakreditasi ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->ps_lain_dalam_pt ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->ps_lain_luar_pt ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->penelitian ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->pkm ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->tugas_tambahan_penunjang ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->jumlah ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a3_ewmp_dosen_tetap_pt->rata_rata_per_semester ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a3_ewmp_dosen_tetap_pt.show', $m_3a3_ewmp_dosen_tetap_pt->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_3a3_ewmp_dosen_tetap_pt.edit', $m_3a3_ewmp_dosen_tetap_pt->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_3a3_ewmp_dosen_tetap_pt.destroy', $m_3a3_ewmp_dosen_tetap_pt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_3a3_ewmp_dosen_tetap_pt.massDestroy') }}",
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
