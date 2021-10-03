@extends('layouts.admin')
@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
                Tambah Borang Penilaian
            </button>
            {{-- <a class="btn btn-success" href="{{ url("admin/r_borang/create") }}">
            Tambah Borang Penilaian
            </a> --}}
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header row">
        <div class="col-8 row">
            <div class="col-3">
                Borang Penilaian

            </div>
        <div class="col-4">
            <a href="{{url('admin/borang/export-pdf?prodi_id=').request()->get('prodi_id')}}" class="btn btn-sm btn-primary">Export</a>
        </div>
        </div>
        
        <div class="col-4">
                <select name="" id="select_prodi" onchange="selectProdi()" class="form-control">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($user as $item)
                    @if (request()->get('prodi_id') == $item->id)
                        <option selected value="{{$item->id}}">{{$item->name}}</option>
                        @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                    @endforeach
                </select>
            
        </div>
    </div>
    

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Elemen
                        </th>
                        <th>
                            No Standar
                        </th>
                        <th>
                            Skor PS
                        </th>
                        <th>
                            Skor Auditor
                        </th>
                        <th>
                            Keterangan
                        </th>
                        <th>
                            Standar Unila
                        </th>
                        <th>
                            Bobot
                        </th>
                        <th>
                            Persen
                        </th>
                        <th>
                            Kinerja
                        </th>
                        <th>
                            Catatan
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_borang as $key => $m_borang)
                        <tr data-entry-id="{{ $m_borang->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $m_borang->elemen ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->no_stndr ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->skor_PS ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->skor_auditor ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->ket ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->stnd_unila ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->bobot ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->persen ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->kinerja ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->catatan ?? '' }}
                            </td>
                            <td>
                                @can('borang_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_borang.show', $m_borang->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('borang_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_borang.edit', $m_borang->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('borang_delete')
                                    <form action="{{ route('admin.r_borang.destroy', $m_borang->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_borang.massDestroy') }}",
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

  $('.datatable:not(.ajaxTable)').DataTable()
})

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    window.location.href = "{{url('admin/r_borang?prodi_id=')}}"+prodi_id;
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/r_borang/create?prodi_id=')}}"+prodi_id+'&&prodi_name='+prodi_name;
}

</script>
@endsection
