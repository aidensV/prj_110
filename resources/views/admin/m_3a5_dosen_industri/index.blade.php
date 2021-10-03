@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_3a5_dosen_industri.create") }}">
            Tambah Dosen Industri
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Dosen Industri
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Nama Dosen Industri
                        </th>
                        <th>
                            NIDK
                        </th>
                        <th>
                            Perusahaan
                        </th>
                        <th>
                            Pendidikan Tertinggi
                        </th>
                        <th>
                            Bidang Keahlian
                        </th>
                        <th>
                            Sertifikat Profesi
                        </th>
                        <th>
                            Mata Kuliah
                        </th>
                        <th>
                            Bobot Kredit
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_3a5_dosen_industri as $key => $m_3a5_dosen_industri)
                        <tr data-entry-id="{{ $m_3a5_dosen_industri->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->nama_dosen_industri ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->nidk ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->perusahaan ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->pendidikan_tertinggi ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->bidang_keahlian ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->sertifikat_profesi ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->mata_kuliah ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a5_dosen_industri->bobot_kredit ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a5_dosen_industri.show', $m_3a5_dosen_industri->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_3a5_dosen_industri.edit', $m_3a5_dosen_industri->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_3a5_dosen_industri.destroy', $m_3a5_dosen_industri->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_3a5_dosen_industri.massDestroy') }}",
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
