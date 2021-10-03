@extends('layouts.admin')
@section('content')
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_8e2_kepuasan_pgn_llsn.create") }}">
                Tambah Kepuasan Pengguna Lulusan
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Kepuasan Pengguna Lulusan
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Jenis Kemampuan
                        </th>
                        <th>
                            Tingkat Kepuasan Pengguna Sangat Baik
                        </th>
                        <th>
                            Tingkat Kepuasan Pengguna Baik
                        </th>
                        <th>
                            Tingkat Kepuasan Pengguna Cukup
                        </th>
                        <th>
                            Tingkat Kepuasan Pengguna Kurang
                        </th>
                        <th>
                            Rencana Tindak Lanjut Oleh UPPS
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_8e2_kepuasan_pgn_llsn as $key => $m_8e2_kepuasan_pgn_llsn)
                        <tr data-entry-id="{{ $m_8e2_kepuasan_pgn_llsn->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_8e2_kepuasan_pgn_llsn->jenis_kemampuan ?? '' }}
                            </td>
                            <td>
                                {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_sb ?? '' }}
                            </td>
                            <td>
                                {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_b ?? '' }}
                            </td>
                            <td>
                                {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_c ?? '' }}
                            </td>
                            <td>
                                {{ $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_k?? '' }}
                            </td>
                            <td>
                                {{ $m_8e2_kepuasan_pgn_llsn->rcn_tdk_lanjut_oleh_upps ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8e2_kepuasan_pgn_llsn.show', $m_8e2_kepuasan_pgn_llsn->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_8e2_kepuasan_pgn_llsn.edit', $m_8e2_kepuasan_pgn_llsn->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_8e2_kepuasan_pgn_llsn.destroy', $m_8e2_kepuasan_pgn_llsn->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_8e2_kepuasan_pgn_llsn.massDestroy') }}",
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
