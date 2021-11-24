@extends('layouts.admin')
@section('content')
@can('berita_acara_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
            Tambah
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
            {{-- @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
            <select name="akademik" class="form-control" id="akademik" onchange="setSession(this.value)">
                <option value="" disabled>Pilih Borang</option>
                <option {{ session()->get('strata') == 's1' ? 'selected' : ''}} value="s1">Borang S1</option>
                <option {{session()->get('strata') == 's2' ? 'selected' : ''}}  value="s2">Borang S2</option>
                <option {{session()->get('strata') == 's3' ? 'selected' : ''}} value="s3">Borang S3</option>
                <option {{session()->get('strata') == 'd3' ? 'selected' : ''}}  value="d3">Borang D3</option>
            </select>
            @endif
            <select class="form-control" id="select_borang" onchange="selectBorang()">
                <option value="">Pilih Element Borang</option>
                @foreach ($elementBorang as $item)
                @if (request()->get('borang_id') == $item->id)
                <option selected value="{{$item->id}}">{{$item->elemen}}</option>
                @else
                <option value="{{$item->id}}">{{$item->elemen}}</option>
                @endif
                    
                @endforeach
            </select> --}}
        </div>
        <div class="col-6">
            {{-- <form action="{{route('admin.r_elemen_led.index')}}"> --}}
                <div class="row mb-4">
                        <input type="date" name="start_date" id="start_date" class="form-control col-4 mr-2" value="{{\Carbon\Carbon::now()->subYears(10)->format('Y-m-d')}}">
                        <input type="date" name="end_date" id="end_date" class="form-control col-4 mr-2" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        <button type="button" onclick="changeDate()" class="btn btn-primary col-2">Cari</button>
                    </div>
                {{-- </form> --}}

        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>Tanggal</th>
                        <th>
                            Nilai
                        </th>
                        <th>
                            Persen
                        </th>
                      
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berita as $key => $br)
                        <tr data-entry-id="{{ $br->id }}">
                            <td>
                              

                            </td>
                            <td>
                              {{$br->tanggal}}

                            </td>
                            {{-- @can('led_nilai') --}}
                            
                            {{-- @endcan --}}
                            <td>
                                {{ $br->nilai }}
                            </td>
                            <td>
                                {{ $br->persen ?? '' }}
                            </td>
                         
                           
                            <td>
                              
                                    <a class="btn btn-xs btn-info" href="{{ url('admin/berita-acara/print/'. $br->id) }}">
                                      <i class="fas fa-print"></i>
                                    </a>
                                
                                @can('berita_acara_delete')
                                    <form action="{{ route('admin.berita-acara.destroy', $br->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

function setSession(strata) {
    var prodi_id = $('#select_prodi').val();
    var strata = strata;
    window.location.href = "{{url('admin/berita-acara?s=')}}"+strata+'&prodi_id='+prodi_id;
}

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/berita-acara?s=')}}"+strata+'&prodi_id='+prodi_id;
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/berita-acara/create?prodi_id=')}}"+prodi_id+'&&prodi_name='+prodi_name;
}

function selectBorang() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/berita-acara?s=')}}"+strata+'&prodi_id='+prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
}

function changeDate() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/berita-acara?s=')}}"+strata+'&prodi_id='+prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
}

</script>
@endsection
