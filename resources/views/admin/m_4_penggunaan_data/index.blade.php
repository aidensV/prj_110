@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_4_penggunaan_data.create") }}">
            Tambah Penggunaan Data
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Penggunaan Data
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Jenis Penggunaan
                        </th>
                        <th>
                            UPPS TS2
                        </th>
                        <th>
                            UPPS TS1
                        </th>
                        <th>
                            UPPS TS
                        </th>
                        <th>
                            Program Studi TS2
                        </th>
                        <th>
                            Program Studi TS1
                        </th>
                        <th>
                            Program Studi TS
                        </th>
                        <th>
                            Rata Rata
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_4_penggunaan_data as $key => $m_4_penggunaan_data)
                        <tr data-entry-id="{{ $m_4_penggunaan_data->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->jenis_penggunaan ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->upps_ts2 ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->upps_ts1 ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->upps_ts ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->program_studi_ts2 ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->program_studi_ts1 ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->program_studi_ts ?? '' }}
                            </td>
                            <td>
                                {{ $m_4_penggunaan_data->rata_rata ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_4_penggunaan_data.show', $m_4_penggunaan_data->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_4_penggunaan_data.edit', $m_4_penggunaan_data->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_4_penggunaan_data.destroy', $m_4_penggunaan_data->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_4_penggunaan_data.massDestroy') }}",
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
