@extends('layouts.admin')
@section('content')
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_8b1_prestasi_akdmk_mhs.create") }}">
                Tambah Prestasi Akademik Mahasiswa
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Prestasi Akademik Mahasiswa
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Nama Kegiatan
                        </th>
                        <th>
                            Waktu Perolehan
                        </th>
                        <th>
                            Tingkat Lokal
                        </th>
                        <th>
                            Tingkat Nasional
                        </th>
                        <th>
                            Tingkat Internasional
                        </th>
                        <th>
                            Prestasi yang Telah Dicapai
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_8b1_prestasi_akdmk_mhs as $key => $m_8b1_prestasi_akdmk_mhs)
                        <tr data-entry-id="{{ $m_8b1_prestasi_akdmk_mhs->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_8b1_prestasi_akdmk_mhs->nama_kegiatan ?? '' }}
                            </td>
                            <td>
                                {{ $m_8b1_prestasi_akdmk_mhs->waktu_perolehan ?? '' }}
                            </td>
                            <td>
                                {{ $m_8b1_prestasi_akdmk_mhs->tingkat_lokal ?? '' }}
                            </td>
                            <td>
                                {{ $m_8b1_prestasi_akdmk_mhs->tingkat_nasional?? '' }}
                            </td>
                            <td>
                                {{ $m_8b1_prestasi_akdmk_mhs->tingkat_internasional ?? '' }}
                            </td>
                            <td>
                                {{ $m_8b1_prestasi_akdmk_mhs->prestasi_yang_dicapai ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8b1_prestasi_akdmk_mhs.show', $m_8b1_prestasi_akdmk_mhs->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_8b1_prestasi_akdmk_mhs.edit', $m_8b1_prestasi_akdmk_mhs->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_8b1_prestasi_akdmk_mhs.destroy', $m_8b1_prestasi_akdmk_mhs->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_8b1_prestasi_akdmk_mhs.massDestroy') }}",
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
