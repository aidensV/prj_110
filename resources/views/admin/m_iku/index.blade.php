@extends('layouts.admin')
@section('content')
@can('iku_create')
@if(isset(request()->query()['s']))
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button class="btn btn-success" onclick="createData()">
            Tambah IKU
            </button>
        </div>
    </div>
    @endif
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
            {{-- @can('borang_select') --}}
            {{-- @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
            
            <select name="akademik" class="form-control" id="akademik" onchange="setSession(this.value)">
                <option value="" disabled>Pilih Borang</option>
                
                <option {{ session()->get('strata') == 's1' ? 'selected' : ''}} value="s1">Borang S1</option>
                <option {{session()->get('strata') == 's2' ? 'selected' : ''}}  value="s2">Borang S2</option>
                <option {{session()->get('strata') == 's3' ? 'selected' : ''}} value="s3">Borang S3</option>
                <option {{session()->get('strata') == 'd3' ? 'selected' : ''}}  value="d3">Borang D3</option>
            </select>
            @endif --}}
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
                <option value="">Pilih Elemenmt Borang</option>
                @foreach ($elemntBorang as $item)
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
                                <input type="number" id="{{$m_iku->id}}" onkeyup="changeNilai('{{$m_iku->id}}','nilai',this.value)" value="{{$m_iku->nilai}}" />    
                                @endcan
                                @cannot('iku_nilai')
                                <input type="text" class="text-muted form-control" readonly id="{{$m_iku->id}}" value="{{$m_iku->nilai}}" />    
                                @endcannot
                            </td>
                            {{-- @ --}}
                            <td>
                                {{$m_iku->indikator}}
                                {{-- <input type="text" id="{{$m_iku->id}}" onkeyup="changeNilai('{{$m_iku->id}}','indikator',this.value)" value="{{$m_iku->indikator}}" />     --}}
                                
                            </td>
                            <td>
                                <input type="number" id="{{$m_iku->id}}" onkeyup="changeNilai('{{$m_iku->id}}','jumlah',this.value)" value="{{$m_iku->jmlh}}" />    
                                
                            </td>
                            <td>
                                @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_iku.show', $m_iku->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                {{-- @can('lkps_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.r_iku.edit', $m_iku->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan --}}
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
function setSession(strata) {
    var strata = strata;
    var prodi_id = $('#select_prodi').val();
    window.location.href = "{{url('admin/r_iku?s=')}}"+ strata;
}
function setSessionStaff(strata) {
    var strata = strata;
    var prodi_id = $('#select_prodi').val();
    window.location.href = "{{url('admin/r_iku?s=')}}"+ strata+'&prodi_id='+prodi_id;
}
function selectProdi() {
    var strata = "{{session()->get('strata')}}";
    var prodi_id = $('#select_prodi').val();
    window.location.href = "{{url('admin/r_iku?prodi_id=')}}"+prodi_id;
}



function selectBorang() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_iku?s=')}}"+ strata+'&prodi_id=' +prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
}

function selectBorangStaff() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_iku?s=')}}"+ strata+'&prodi_id=' +prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
}

function changeDate() {
    var borang_id = $('#select_borang').val();
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var strata = "{{session()->get('strata')}}";
    window.location.href = "{{url('admin/r_iku?s=')}}"+ strata+'&prodi_id=' +prodi_id+'&borang_id='+borang_id+'&start_date='+start_date+'&end_date='+end_date;
    
}

function changeNilai(id,type,val) {
    var nilai = val;

    axios.post("{{url('api/iku/change/nilai')}}", {
    id: id,
    nilai: nilai,
    type:type,
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
