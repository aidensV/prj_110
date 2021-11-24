@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header row">
        <div class="col-6">
           Berita Acara

        </div>
        <div class="col-4">
            @php
                $namaProdi = '';   
            @endphp
            <select class="form-control" id="select_prodi" onchange="selectProdi()">
                <option value="">Pilih Jurusan</option>
                @foreach ($user as $item)
                @if (request()->get('prodi_id') == $item->id)
                    @php
                     $namaProdi = $item->name;   
                    @endphp
                <option selected value="{{$item->id}}">{{$item->name}}</option>
                @else
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endif
                    
                @endforeach
            </select>
           
            </div>
            <div class="col-2">
              <a class="btn btn-info" href="{{ url('admin/berita-acara/print/'. request()->get('prodi_id')) }}">
                <i class="fas fa-print"></i>
              </a>
            </div>
    </div>
   
    <div class="card-body">
        {{-- <label for="">Filter</label>
        <form action="{{route('admin.r_elemen_led.index')}}">
        <div class="row mb-4">
                <input type="date" name="start_date" class="form-control col-4 mr-2" value="{{\Carbon\Carbon::now()->subYears(10)->format('Y-m-d')}}">
                <input type="date" name="end_date" class="form-control col-4 mr-2" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                <button type="submit" class="btn btn-primary col-2">Cari</button>
            </div>
        </form>
        <br> --}}
        <form action="{{url('admin/berita-acara/store')}}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Tanggal</label>
                
                <input type="date" name="date" class="form-control" value="@if($berita){{\Carbon\Carbon::parse($berita->tanggal)->format('Y-m-d')}}@else{{\Carbon\Carbon::now()->format('Y-m-d')}}@endif">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Nama Unit Pengelola</label>
                <input type="text" class="form-control" name="unit_name" readonly value="{{$namaProdi}}">
                <input type="hidden" class="form-control" name="user_id" readonly value="{{request()->get('prodi_id')}}">
                <input type="hidden" class="form-control" name="prodi_id" readonly value="{{request()->get('prodi_id')}}">
              </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Nila Kesiapan Akreditasi</label>
                  <input type="text" class="form-control" name="nilai" value="@if($berita){{$berita->nilai}}@endif">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Persentase Capain Kerja</label>
                  <input type="text" class="form-control" name="persen" value="@if($berita){{$berita->persen}}@endif">
                </div>
              </div>
            <div class="form-group">
              <label for="inputAddress">Dengan Catatan</label>
              <textarea name="catatan" id="" class="form-control" cols="15" rows="5"> @foreach ($elementBorang as $item){{$item->catatan ."\r\n"}} @endforeach</textarea>
            </div>

            <div class="form-group">
                <label for="inputAddress">Rekomendasi</label>
                <textarea name="rekomendasi" id="" class="form-control" cols="15" rows="5">@if($berita){{$berita->rekomendasi}}@endif </textarea>
              </div>
              @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title != 'Staff')
            <button type="submit" class="btn btn-primary">Simpan</button>
            @endif
          </form>
      
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>

function selectProdi() {
    var prodi_id = $('#select_prodi').val();
    window.location.href = "{{url('admin/berita-acara/create/?prodi_id=')}}"+prodi_id;
}

</script>
@endsection
