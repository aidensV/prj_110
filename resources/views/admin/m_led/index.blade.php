@extends('layouts.admin')
@section('content')
@can('led_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
            Tambah LED
            </button>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header row">
        
        <div class="col-8">
            LED
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
                            Elemen LED
                        </th>
                        <th>
                            Ket
                        </th>
                      
                        <th>
                            Penjelasan
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($m_led as $key => $m_led)
                        <tr data-entry-id="{{ $m_led->id }}">
                            <td>

                            </td>
                            {{-- @can('led_nilai') --}}
                            <td>
                                @can('led_nilai')
                                    <input type="number" id="{{$m_led->id}}" onkeyup="changeNilai('{{$m_led->id}}')" value="{{$m_led->nilai}}" />
                                @endcan
                                @cannot('led_nilai')
                                <input type="text" class="text-muted form-control" id="{{$m_led->id}}" readonly  value="{{$m_led->nilai}}" />
                                @endcannot
                            </td>
                            {{-- @endcan --}}
                            <td>
                                {{ $m_led->elementLed->kriteria ?? '' }}
                            </td>
                            <td>
                                {{ $m_led->ket ?? '' }}
                            </td>
                         
                            <td>
                                <a href="{{ asset('file_record/'.$m_led->penjelasan)}}">Download</a>
                            </td>
                            <td>
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_led.edit', $m_led->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_led.destroy', $m_led->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    function changeNilai(id) {
    var nilai = $('#'+id).val();
    axios.post("{{url('api/led/change/nilai')}}", {
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

    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.r_led.massDestroy') }}",
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
    window.location.href = "{{url('admin/r_led?prodi_id=')}}"+prodi_id;
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/r_led/create?prodi_id=')}}"+prodi_id+'&&prodi_name='+prodi_name;
}

</script>
@endsection
