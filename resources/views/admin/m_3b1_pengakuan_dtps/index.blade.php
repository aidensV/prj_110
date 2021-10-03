@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_3b1_pengakuan_dtps.create") }}">
            Tambah Pengakuan DTPS
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Pengakuan DTPS
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
                            Bidang Keahlian
                        </th>
                        <th>
                            Rekognisi Dan Bukti Pendukung
                        </th>
                        <th>
                            Tingkat Internasional
                        </th>
                        <th>
                            Tingkat Nasional
                        </th>
                        <th>
                            Tingkat Wilayah
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
                    @foreach($m_3b1_pengakuan_dtps as $key => $m_3b1_pengakuan_dtps)
                        <tr data-entry-id="{{ $m_3b1_pengakuan_dtps->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->nama_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->bidang_keahlian ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->rekognisi_dan_bukti_pendukung ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->tingkat_internasional ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->tingkat_nasional ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->tingkat_wilayah ?? '' }}
                            </td>
                            <td>
                                {{ $m_3b1_pengakuan_dtps->tahun ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b1_pengakuan_dtps.show', $m_3b1_pengakuan_dtps->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_3b1_pengakuan_dtps.edit', $m_3b1_pengakuan_dtps->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_3b1_pengakuan_dtps.destroy', $m_3b1_pengakuan_dtps->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_3b1_pengakuan_dtps.massDestroy') }}",
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
