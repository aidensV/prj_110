@extends('layouts.admin')
@section('content')
@can('led_create')
@if(isset(request()->query()['s']))
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
            Tambah LED
            </button>
        </div>
    </div>
    @endif
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
            
          
            @can('borang_select')
                    
                
            {{-- @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff') --}}
            @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title != 'Auditor')
            @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
            <select name="akademik" class="form-control" id="akademik" onchange="setSessionStaff(this.value)">
                @else
                <select name="akademik" class="form-control" id="akademik" onchange="setSession(this.value)">
                @endif
                <option value="">Pilih Borang</option>
                <option {{ session()->get('strata') == 's1' ? 'selected' : ''}} value="s1">Borang S1</option>
                <option {{session()->get('strata') == 's2' ? 'selected' : ''}}  value="s2">Borang S2</option>
                <option {{session()->get('strata') == 's3' ? 'selected' : ''}} value="s3">Borang S3</option>
                <option {{session()->get('strata') == 'd3' ? 'selected' : ''}}  value="d3">Borang D3</option>
                <option {{session()->get('strata') == 'fakultas' ? 'selected' : ''}}  value="fakultas">Borang Fakultas</option>
            </select>
            @endif
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
        <div class="col-6">
            {{-- <form action="{{route('admin.r_elemen_led.index')}}"> --}}
                <div class="row mb-4">
                    @php
                        $yearSub = \Carbon\Carbon::now()->subYears(10);
                        $yearNow = \Carbon\Carbon::now()->format('Y');
                        $yearAdd = \Carbon\Carbon::now()->addYear(10)->format('Y');
                        if(request()->get('start_date')){
                            $yearNow = request()->get('start_date');
                        }

                        if(request()->get('end_date')){
                            $yearAdd = request()->get('end_date');
                        }
                    @endphp

                    <select class="form-control select2 col-4 mr-2" id="start_date">
                        @for ($i = 0; $i <= 20; $i++)
                    
                        @if($yearSub->copy()->addYear($i)->format('Y') == $yearNow)
                        <option selected>{{$yearSub->copy()->addYear($i)->format('Y')}}</option>
                        @else
                        <option>{{$yearSub->copy()->addYear($i)->format('Y')}}</option>
                        @endif
                            
                        @endfor
                        
                    </select>

                    <select class="form-control select2 col-4 mr-2" id="end_date">
                        @for ($i = 0; $i <= 20; $i++)
                    
                        @if($yearSub->copy()->addYear($i)->format('Y') == $yearAdd)
                        <option selected>{{$yearSub->copy()->addYear($i)->format('Y')}}</option>
                        @else
                        <option>{{$yearSub->copy()->addYear($i)->format('Y')}}</option>
                        @endif
                            
                        @endfor
                        
                    </select>
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
                                @if($m_led->penjelasan)
                                    <a href="{{ asset('file_record/'.$m_led->penjelasan)}}">Download</a>
                                    @else
                                    -
                                    @endif

                                
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

function setSession(strata) {
    var prodi_id = $('#select_prodi').val();
    var strata = strata;
    window.location.href = "{{url('admin/r_led?s=')}}"+strata;
}

function setSessionStaff(strata) {
    var prodi_id = $('#select_prodi').val();
    var strata = strata;
    window.location.href = "{{url('admin/r_led?s=')}}"+strata+'&prodi_id='+prodi_id;
}

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_led?prodi_id=')}}"+prodi_id;
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/r_led/create?prodi_id=')}}"+prodi_id+'&&prodi_name='+prodi_name;
}

function selectBorang() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_led?s=')}}"+strata+'&prodi_id='+prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
}

function changeDate() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_led?s=')}}"+strata+'&prodi_id='+prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
}

</script>
@endsection
