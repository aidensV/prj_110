@extends('layouts.admin')
@section('content')
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_8c_masastudi_llsn_dip.create") }}">
                Tambah Masa Studi Lulusan Diploma
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Masa Studi Lulusan Diploma
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Tahun Masuk
                        </th>
                        <th>
                            Jumlah Mahasiswa yang Diterima
                        </th>
                        <th>
                            Jumlah Mahasiswa Lulus TS4
                        </th>
                        <th>
                            Jumlah Mahasiswa Lulus TS3
                        </th>
                        <th>
                            Jumlah Mahasiswa Lulus TS2
                        </th>
                        <th>
                            Jumlah Mahasiswa Lulus TS1
                        </th>
                        <th>
                            Jumlah Mahasiswa Lulus TS
                        </th>
                        <th>
                            Jumlah Lulusan Akhir TS
                        </th>
                        <th>
                            Rata-rata Masa Studi
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_8c_masastudi_llsn_dip as $key => $m_8c_masastudi_llsn_dip)
                        <tr data-entry-id="{{ $m_8c_masastudi_llsn_dip->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->thn_msk ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_mhs_diterima ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_mhs_lulus_ts4 ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_mhs_lulus_ts3?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_mhs_lulus_ts2 ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_mhs_lulus_ts1 ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_mhs_lulus_ts ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->jml_lulusan_akhir_ts ?? '' }}
                            </td>
                            <td>
                                {{ $m_8c_masastudi_llsn_dip->rata_masa_studi ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8c_masastudi_llsn_dip.show', $m_8c_masastudi_llsn_dip->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_8c_masastudi_llsn_dip.edit', $m_8c_masastudi_llsn_dip->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_8c_masastudi_llsn_dip.destroy', $m_8c_masastudi_llsn_dip->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_8c_masastudi_llsn_dip.massDestroy') }}",
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
