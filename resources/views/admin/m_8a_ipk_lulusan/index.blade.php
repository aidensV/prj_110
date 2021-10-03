@extends('layouts.admin')
@section('content')
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_8a_ipk_lulusan.create") }}">
                Tambah IPK LULUSAN
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        IPK LULUSAN
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Tahun Lulus
                        </th>
                        <th>
                            Jumlah Lulusan
                        </th>
                        <th>
                            IPK Minimum
                        </th>
                        <th>
                            IPK Rata-rata
                        </th>
                        <th>
                            IPK Maksimum
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_8a_ipk_lulusan as $key => $m_8a_ipk_lulusan)
                        <tr data-entry-id="{{ $m_8a_ipk_lulusan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_8a_ipk_lulusan->tahun_lulus ?? '' }}
                            </td>
                            <td>
                                {{ $m_8a_ipk_lulusan->jumlah_lulusan ?? '' }}
                            </td>
                            <td>
                                {{ $m_8a_ipk_lulusan->ipk_min ?? '' }}
                            </td>
                            <td>
                                {{ $m_8a_ipk_lulusan->ipk_rata_rata?? '' }}
                            </td>
                            <td>
                                {{ $m_8a_ipk_lulusan->ipk_maks ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8a_ipk_lulusan.show', $m_8a_ipk_lulusan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_8a_ipk_lulusan.edit', $m_8a_ipk_lulusan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_8a_ipk_lulusan.destroy', $m_8a_ipk_lulusan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_8a_ipk_lulusan.massDestroy') }}",
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
