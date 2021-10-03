@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_5c_kepuasan_mahasiswa.create") }}">
            Tambah Kepuasan Mahasiswa
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Kepuasan Mahasiswa
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Aspek Yang Diukur
                        </th>
                        <th>
                            Tingkat Kepuasan Mahasiswa Sangat Baik
                        </th>
                        <th>
                            Tingkat Kepuasan Mahasiswa Baik
                        </th>
                        <th>
                            Tingkat Kepuasan Mahasiswa Cukup
                        </th>
                        <th>
                            Tingkat Kepuasan Mahasiswa Kurang
                        </th>
                        <th>
                            Rencana Tidak Lanjut Oleh UPPS
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_5c_kepuasan_mahasiswa as $key => $m_5c_kepuasan_mahasiswa)
                        <tr data-entry-id="{{ $m_5c_kepuasan_mahasiswa->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_5c_kepuasan_mahasiswa->aspek_yang_diukur ?? '' }}
                            </td>
                            <td>
                                {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_sangat_baik ?? '' }}
                            </td>
                            <td>
                                {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_baik ?? '' }}
                            </td>
                            <td>
                                {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_cukup ?? '' }}
                            </td>
                            <td>
                                {{ $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_kurang ?? '' }}
                            </td>
                            <td>
                                {{ $m_5c_kepuasan_mahasiswa->rencana_tidak_lanjut_oleh_upps ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_5c_kepuasan_mahasiswa.show', $m_5c_kepuasan_mahasiswa->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_5c_kepuasan_mahasiswa.edit', $m_5c_kepuasan_mahasiswa->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_5c_kepuasan_mahasiswa.destroy', $m_5c_kepuasan_mahasiswa->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_5c_kepuasan_mahasiswa.massDestroy') }}",
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
