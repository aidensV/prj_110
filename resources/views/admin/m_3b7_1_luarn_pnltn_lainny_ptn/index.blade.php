@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_3b7_1_luarn_pnltn_lainny_ptn.create") }}">
            Tambah Luaran Penelitian Lainnya Paten
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Luaran Penelitian Lainnya Paten
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Luaran Penelitian dan PKM
                        </th>
                        <th>
                            Tahun
                        </th>
                        <th>
                            Keterangan
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_3b7_1_luarn_pnltn_lainny_ptn as $key => $m_3b7_1_luarn_pnltn_lainny_ptn)
                        <tr data-entry-id="{{ $m_3b7_1_luarn_pnltn_lainny_ptn->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_3b7_1_luarn_pnltn_lainny_ptn->luaran_penelitian_dan_pkm ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b7_1_luarn_pnltn_lainny_ptn->tahun ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b7_1_luarn_pnltn_lainny_ptn->keterangan ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.show', $m_3b7_1_luarn_pnltn_lainny_ptn->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.edit', $m_3b7_1_luarn_pnltn_lainny_ptn->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.destroy', $m_3b7_1_luarn_pnltn_lainny_ptn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.massDestroy') }}",
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
