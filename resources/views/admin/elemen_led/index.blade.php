@extends('layouts.admin')
@section('content')
@can('product_create')
@if(isset(request()->query()['s']))
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
                Tambah Elemen LED
                </button>
        </div>
    </div>
@endif
@endcan
<div class="card">
    <div class="card-header row">
        <div class="col-8">
        Elemen LED
        </div>
        <div class="col-4">
            {{-- <select class="form-control" id="select_prodi" onchange="selectProdi()">
                <option value="">Pilih Jurusan</option>
                @foreach ($user as $item)
                @if (request()->get('prodi_id') == $item->id)
                <option selected value="{{$item->id}}">{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
                    
                @endforeach
            </select> --}}
            
          
            @can('borang_select')
                    
                
            {{-- @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff') --}}
            <select name="akademik" class="form-control" id="akademik" onchange="setSession(this.value)">
                <option value="">Pilih Borang</option>
                <option {{ session()->get('strata') == 's1' ? 'selected' : ''}} value="s1">Borang S1</option>
                <option {{session()->get('strata') == 's2' ? 'selected' : ''}}  value="s2">Borang S2</option>
                <option {{session()->get('strata') == 's3' ? 'selected' : ''}} value="s3">Borang S3</option>
                <option {{session()->get('strata') == 'd3' ? 'selected' : ''}}  value="d3">Borang D3</option>
                <option {{session()->get('strata') == 'fakultas' ? 'selected' : ''}}  value="fakultas">Borang Fakultas</option>
            </select>
            {{-- @endcan --}}
            {{-- @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title != 'Staff') --}}
            {{-- <select class="form-control" id="select_borang" onchange="selectBorang()">
                <option value="">Pilih Element Borang</option>
                @foreach ($elementBorang as $item)
                @if (request()->get('borang_id') == $item->id)
                <option selected value="{{$item->id}}">{{$item->elemen}}</option>
                @else
                <option value="{{$item->id}}">{{$item->elemen}}</option>
                @endif
                    
                @endforeach
            </select> --}}
            {{-- @endif --}}
            @endcan
        </div>
    </div>
    

    <div class="card-body">
        {{-- <label for="">Filter</label>
        <form action="{{route('admin.r_elemen_led.index')}}">
        <div class="row mb-4">
                <input type="hidden" name="s" class="form-control col-4 mr-2" value="{{session()->get('strata')}}">
                <input type="date" name="start_date" class="form-control col-4 mr-2" value="{{\Carbon\Carbon::now()->subYears(10)->format('Y-m-d')}}">
                <input type="date" name="end_date" class="form-control col-4 mr-2" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                <button type="submit" class="btn btn-primary col-2">Cari</button>
            </div>
        </form> --}}
        <br>
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Kriteria
                        </th>
                        <th>
                            Deskripsi
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($elemen_led as $key => $elemen_led)
                        <tr data-entry-id="{{ $elemen_led->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $elemen_led->kriteria ?? '' }}
                            </td>
                            <td>
                            <table>
                                <tbody>
                                    
                            @foreach($elemen_led->detail as $detail)
                            <tr>
                                <td>
                                    {{ $detail->deskripsi ?? '' }}
                                </td>
                                <td>
                                    {{ $detail->bobot ?? '' }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_elemen_led.show', $elemen_led->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_elemen_led.edit', $elemen_led->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('lkps_delete')
                                    <form action="{{ route('admin.r_elemen_led.destroy', $elemen_led->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.r_elemen_led.massDestroy') }}",
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

function setSession(strata) {
    var prodi_id = $('#select_prodi').val();
    var strata = strata;
    window.location.href = "{{url('admin/r_elemen_led?s=')}}"+strata;
}

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_elemen_led?prodi_id=')}}"+prodi_id;
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var borang_id = $('#akademik').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/r_elemen_led/create?prodi_id=')}}"+prodi_id+'&s='+borang_id;
}

</script>
@endsection
