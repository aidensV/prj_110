@extends('layouts.admin')
@section('content')
@can('iku_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
            Tambah IKU
            </button>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header row">
        <div class="col-8">
            Indikator Kinerja Utama
        </div>
        <div class="col-4">
            <select class="form-control" id="select_prodi" onchange="selectProdi()">
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
                        <th>Nilai</th>
                        <th>
                            Indikator
                        </th>
                        <th>
                            Jumlah/Presentase
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_iku as $key => $m_iku)
                        <tr data-entry-id="{{ $m_iku->id }}">
                            <td>

                            </td>
                            {{-- @can('led_nilai') --}}
                            <td>
                                @can('iku_nilai')
                                <input type="number" id="{{$m_iku->id}}" onkeyup="changeNilai('{{$m_iku->id}}')" value="{{$m_iku->nilai}}" />    
                                @endcan
                                @cannot('iku_nilai')
                                <input type="text" class="text-muted form-control" readonly id="{{$m_iku->id}}" value="{{$m_iku->nilai}}" />    
                                @endcannot
                            </td>
                            {{-- @ --}}
                            <td>
                                {{ $m_iku->indikator ?? '' }}
                            </td>
                            <td>
                                {{ $m_iku->jmlh ?? '' }}
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_iku.show', $m_iku->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_iku.edit', $m_iku->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_iku.destroy', $m_iku->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_iku.massDestroy') }}",
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

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    window.location.href = "{{url('admin/r_iku?prodi_id=')}}"+prodi_id;
}

function changeNilai(id) {
    var nilai = $('#'+id).val();
    axios.post("{{url('api/iku/change/nilai')}}", {
    id: id,
    nilai: nilai
  })
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/r_iku/create?prodi_id=')}}"+prodi_id+'&&prodi_name='+prodi_name;
}



</script>
@endsection
