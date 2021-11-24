@extends('layouts.admin')
@section('content')
@can('borang_create')
@if(isset(request()->query()['s']))



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

@else
<div id="button_create" class="d-none">


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
</div>
@endif

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
            

            @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Super Admin')
                <select name="" id="select_prodi" onchange="selectProdi()" class="form-control">
                    @else
                    <select name="" id="select_prodi" onchange="changeProdi()" class="form-control">
                    @endif
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
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Super Admin')
                
                
                <select name="akademik" class="form-control" id="akademik" onchange="setSession(this.value)">
                    <option value="">Pilih Borang</option>
                    <option {{ session()->get('strata') == 's1' ? 'selected' : ''}} value="s1">Borang S1</option>
                    <option {{session()->get('strata') == 's2' ? 'selected' : ''}}  value="s2">Borang S2</option>
                    <option {{session()->get('strata') == 's3' ? 'selected' : ''}} value="s3">Borang S3</option>
                    <option {{session()->get('strata') == 'd3' ? 'selected' : ''}}  value="d3">Borang D3</option>
                </select>
            @else
            
            @if(request()->get('s') !== null)
            <div id="row_akademik">
                @elseif(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <div id="row_akademik">
            @else
            <div class="d-none" id="row_akademik">
                @endif
                <select name="akademik" class="form-control" id="akademik" onchange="setSession2(this.value)">
                    <option value="">Pilih Borang</option>
                    <option {{ session()->get('strata') == 's1' ? 'selected' : ''}} value="s1">Borang S1</option>
                    <option {{session()->get('strata') == 's2' ? 'selected' : ''}}  value="s2">Borang S2</option>
                    <option {{session()->get('strata') == 's3' ? 'selected' : ''}} value="s3">Borang S3</option>
                    <option {{session()->get('strata') == 'd3' ? 'selected' : ''}}  value="d3">Borang D3</option>
                </select>
            </div>
            @endif
                @endcan
                {{-- @endif --}}
            
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
                            Bobot Sumber
                        </th>
                        <th>
                            Bobot Ami
                        </th>
                        <th>
                            Capaian
                        </th>
                        <th>
                            Persen Kinerja
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
                                {{ $m_borang->bobot_sumber ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->bobot_ami ?? '' }}
                            </td>
                            <td>
                                {{ $m_borang->capaian ?? '' }}
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

function setSession(strata) {
    var prodi_id = $('#select_prodi').val();
    var strata = strata;
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    $('#button_create').removeClass('d-none');

    window.location.href = "{{url('admin/r_borang?s=')}}"+strata+'&start_date='+start_date+'&end_date='+end_date;
    

}

function setSession2(strata) {
    var prodi_id = $('#select_prodi').val();
    var strata = strata;
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    $('#button_create').removeClass('d-none');

    window.location.href = "{{url('admin/r_borang?s=')}}"+strata+'&prodi_id='+prodi_id+'&start_date='+start_date+'&end_date='+end_date;
    

}

function changeProdi() {
    $('#row_akademik').removeClass('d-none');
}

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    window.location.href = "{{url('admin/r_borang?prodi_id=')}}"+prodi_id+'&start_date='+start_date+'&end_date='+end_date;
}

function changeDate() {
    var prodi_id = $('#select_prodi').val();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    window.location.href = "{{url('admin/r_borang?prodi_id=')}}"+prodi_id+'&start_date='+start_date+'&end_date='+end_date;
}

function createData() {
    var prodi_id = $('#select_prodi').val();
    var prodi_name = $("#select_prodi option:selected").text();;
    window.location.href = "{{url('admin/r_borang/create?prodi_id=')}}"+prodi_id+'&&prodi_name='+prodi_name;
}

</script>
@endsection
