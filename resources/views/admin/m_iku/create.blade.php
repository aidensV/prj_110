@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        INDIKATOR KINERJA UTAMA
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_iku.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has( 'indikator') ? 'has-error' : '' }}">
                <label for="indikator">Indikator</label>
                <input type="text" id="indikator" name="indikator" class="form-control" value="{{ old('indikator', isset($m_iku) ? $m_iku->indikator : '') }}">
                <input type="hidden" id="prodi_id" name="prodi_id" class="form-control" value="{{request()->get('prodi_id')}}">
                <input type="hidden" id="element_id" name="element_id" value="{{session()->get('borang_id')}}">
                @if($errors->has('indikator'))
                    <p class="help-block">
                        {{ $errors->first('indikator') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Indikator 
                </p> -->
            </div>

            @php
            $yearSub = \Carbon\Carbon::now()->subYears(10);
            $yearNow = \Carbon\Carbon::now()->format('Y');
            
       @endphp
   <div class="form-group">
       <label for="tanggal">Tanggal<span class="text-danger">*</span></label>
       <select class="form-control select2" name="tanggal" id="tanggal" required>
           @for ($i = 0; $i < 20; $i++)
          
           @if($yearSub->copy()->addYear($i)->format('Y') == $yearNow)
           <option selected>{{$yearSub->copy()->addYear($i)->format('Y')}}</option>
           @else
           <option>{{$yearSub->copy()->addYear($i)->format('Y')}}</option>
           @endif
               
           @endfor
           
       </select>
   </div>

            <div class="form-group {{ $errors->has( 'jmlh') ? 'has-error' : '' }}">
                <label for="jmlh">Jumlah/Presentase</label>
                <input type="text" readonly id="jmlh" name="jmlh" class="form-control" value="{{ old('jmlh', isset($m_iku) ? $m_iku->jmlh : '0') }}">
                @if($errors->has('jmlh'))
                    <p class="help-block">
                        {{ $errors->first('jmlh') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection