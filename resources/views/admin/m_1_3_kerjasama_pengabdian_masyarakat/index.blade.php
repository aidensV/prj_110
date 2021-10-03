@extends('layouts.admin')
@section('content')
<div class="card collapsed-card">
    <div class="card-header">
        Skor LKPS
        <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
    </div>
        <div class="card-body">
            <form action="{{ route("admin.r_1_1_kerjasama_pendidikan.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has( 'tingkat_internasional') ? 'has-error' : '' }}">
                        <label for="tingkat_internasional">Kode</label>
                        <input type="text" id="tingkat_internasional" name="tingkat_internasional" class="form-control">
                        @if($errors->has('tingkat_internasional'))
                            <p class="help-block">
                                {{ $errors->first('tingkat_internasional') }}
                            </p>
                        @endif
                        <!-- <p class="helper-block">
                            Isikan Kerjasama Tingkat Internasional
                        </p> -->
                    </div>
                    <div class="form-group {{ $errors->has( 'tingkat_internasional') ? 'has-error' : '' }}">
                        <label for="tingkat_internasional">Skor</label>
                        <input type="number" id="tingkat_internasional" name="tingkat_internasional" class="form-control">
                        @if($errors->has('tingkat_internasional'))
                            <p class="help-block">
                                {{ $errors->first('tingkat_internasional') }}
                            </p>
                        @endif
                        <!-- <p class="helper-block">
                            Isikan Kerjasama Tingkat Internasional
                        </p> -->
                    </div>
                    <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
            </form>
        </div>
</div>
@can('lkps_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.r_1_3_kerjasama_pkm.create") }}">
                Tambah Kerjasama Pengabdian Masyarakat
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Kerjasama Penelitian
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

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
                            Judul Kegiatan Kerjasama
                        </th>
                        <th>
                            Manfaat Bagi Program Studi
                        </th>
                        <th>
                            Waktu dan Durasi
                        </th>
                        <th>
                            Bukti Kerjasama
                        </th>
                        <th>
                            Tahun Berakhirnya Kerjasama
                        </th>
                        <th>
                            Lembaga Mitra
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_1_3_kerjasama_pengabdian_masyarakat as $key => $m_1_3_kerjasama_pengabdian_masyarakat)
                        <tr data-entry-id="{{ $m_1_3_kerjasama_pengabdian_masyarakat->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->tingkat_internasional ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->tingkat_nasional ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->tingkat_wilayah ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->judul_kegiatan_kerjasama ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->manfaat_bagi_ps ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->waktu_dan_durasi ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->bukti_kerjasama ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->tahun_berakhirnya_kerjasama ?? '' }}
                            </td>
                            <td>
                                {{ $m_1_3_kerjasama_pengabdian_masyarakat->lembaga_mitra ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_1_3_kerjasama_pkm.show', $m_1_3_kerjasama_pengabdian_masyarakat->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_1_3_kerjasama_pkm.edit', $m_1_3_kerjasama_pengabdian_masyarakat->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_1_3_kerjasama_pkm.destroy', $m_1_3_kerjasama_pengabdian_masyarakat->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_1_3_kerjasama_pkm.massDestroy') }}",
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
