@extends('layouts.admin')
@section('content')
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_3a_2_dospem_utama_ta.create") }}">
                Tambah Dospem Utama TA
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Dosen Pembimbing Utama Tugas Akhir
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
                            Mahasiswa yg di bimbing PS diakreditasi TS2
                        </th>
                        <th>
                            Mahasiswa yg di bimbing PS diakreditasi TS1
                        </th>
                        <th>
                            Mahasiswa yg di bimbing PS diakreditasi TS
                        </th>
                        <th>
                            Mahasiswa yg di bimbing PS lain TS2
                        </th>
                        <th>
                            Mahasiswa yg di bimbing PS lain TS1
                        </th>
                        <th>
                            Mahasiswa yg di bimbing PS lain TS
                        </th>
                        <th>
                            Rata-rata Jumlah Bimbingan
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_3a_2_dospem_utama_ta as $key => $m_3a_2_dospem_utama_ta)
                        <tr data-entry-id="{{ $m_3a_2_dospem_utama_ta->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->nama_dosen ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts2 ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts1 ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->ps_lain_ts2 ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->ps_lain_ts1 ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->ps_lain_ts ?? '' }}
                            </td>
                            <td>
                                {{ $m_3a_2_dospem_utama_ta->rata_jmlh_bimbingan ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a_2_dospem_utama_ta.show', $m_3a_2_dospem_utama_ta->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_3a_2_dospem_utama_ta.edit', $m_3a_2_dospem_utama_ta->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_3a_2_dospem_utama_ta.destroy', $m_3a_2_dospem_utama_ta->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_3a_2_dospem_utama_ta.massDestroy') }}",
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
