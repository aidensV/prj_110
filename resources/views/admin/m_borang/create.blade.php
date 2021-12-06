@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            BORANG PENILAIAN
        </div>

        <div class="card-body">
            <form action="{{ route('admin.r_borang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('elemen') ? 'has-error' : '' }}">
                    <label for="elemen">Elemen</label>
                    <input type="text" id="elemen" name="elemen" class="form-control"
                        value="{{ old('elemen', isset($m_borang) ? $m_borang->elemen : '') }}">
                    @if ($errors->has('elemen'))
                        <p class="help-block">
                            {{ $errors->first('elemen') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Isikan Indikator 
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('no_stndr') ? 'has-error' : '' }}">
                    <label for="no_stndr">No Standar</label>
                    <input type="text" id="no_stndr" name="no_stndr" class="form-control"
                        value="{{ old('no_stndr', isset($m_borang) ? $m_borang->no_stndr : '') }}">
                    @if ($errors->has('no_stndr'))
                        <p class="help-block">
                            {{ $errors->first('no_stndr') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Isikan Elemen
                        </p> -->
                </div>

                <div class="form-group {{ $errors->has('no_stndr') ? 'has-error' : '' }}">
                    <label for="kode_elemen">Kode Elemen</label>
                    <input type="text" id="kode_elemen" name="kode_elemen" class="form-control"
                        value="{{ old('kode_elemen', isset($m_borang) ? $m_borang->kode_elemen : '') }}">
                   
                    <!-- <p class="helper-block">
                            Isikan Elemen
                        </p> -->
                </div>
                <div class="form-group">
                    <label for="indi_penilai">Program Studi</label>
                    <input readonly value="{{$prodi_name}}"  class="form-control" type="text">
                    <input name="prodi_id" id="prodi_id" value="{{$prodi_id}}"  class="form-control" type="hidden">
                </div>
                <div class="form-group">
                    <label for="indi_penilai">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control" onchange="changeType(this.value)">
                        <option value="lkps">LKPS</option>
                        <option value="iku">IKU</option>
                        <option value="led">LED</option>
                    </select>
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
                <div class=" form-group {{ $errors->has('indi_penilai') ? 'has-error' : '' }}">
                    <label for="indi_penilai">Indikator Penilaian</label>
                    <div class="row_indicator">
                        <div class="row ">
                            <div class="col-6">
                                <textarea row="1" type="text" class="form-control" id="indi_penilai" name="indi_penilai[]"> </textarea>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-success" onclick="addRowIndi()" type="button"><i
                                        class="fas fa-plus"></i> Add</button>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('skor_PS') ? 'has-error' : '' }}">
                    <label for="skor_PS">Skor PS</label>
                    <input  id="skor_PS" readonly name="skor_PS" type="number" class="form-control"
                        value="{{ old('skor_PS', isset($m_borang) ? $m_borang->skor_PS : '') }}">
                    @if ($errors->has('skor_PS'))
                        <p class="help-block">
                            {{ $errors->first('skor_PS') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('skor_auditor') ? 'has-error' : '' }}">
                    <label for="skor_auditor">Skor_Auditor</label>
                    <input  id="skor_auditor" readonly name="skor_auditor" type="number" class="form-control"
                        value="{{ old('skor_auditor', isset($m_borang) ? $m_borang->skor_auditor : '') }}">
                    @if ($errors->has('skor_auditor'))
                        <p class="help-block">
                            {{ $errors->first('skor_auditor') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('ket') ? 'has-error' : '' }}">
                    <label for="ket">Keterangan</label>
                    <input type="text" id="ket" name="ket" class="form-control"
                        value="{{ old('ket', isset($m_borang) ? $m_borang->ket : '') }}">
                    @if ($errors->has('ket'))
                        <p class="help-block">
                            {{ $errors->first('ket') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('stnd_unila') ? 'has-error' : '' }}">
                    <label for="stnd_unila">Standar Unila</label>
                    <input  id="stnd_unila" name="stnd_unila" type="number" class="form-control"
                        value="{{ old('stnd_unila', isset($m_borang) ? $m_borang->stnd_unila : '') }}">
                    @if ($errors->has('stnd_unila'))
                        <p class="help-block">
                            {{ $errors->first('stnd_unila') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('bobot_sumber') ? 'has-error' : '' }}">
                    <label for="bobot_sumber">Bobot Sumber</label>
                    <input  id="bobot_sumber" name="bobot_sumber" type="number" class="form-control"
                        value="{{ old('bobot_sumber', isset($m_borang) ? $m_borang->bobot_sumber : '') }}">
                    @if ($errors->has('bobot_sumber'))
                        <p class="help-block">
                            {{ $errors->first('bobot_sumber') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('bobot_ami') ? 'has-error' : '' }}">
                    <label for="bobot_ami">Bobot AMI</label>
                    <input id="bobot_ami" name="bobot_ami" type="number" class="form-control"
                        value="{{ old('bobot_ami', isset($m_borang) ? $m_borang->bobot_ami : '') }}">
                    @if ($errors->has('bobot_ami'))
                        <p class="help-block">
                            {{ $errors->first('bobot_ami') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('capaian') ? 'has-error' : '' }}">
                    <label for="capaian">Capaian</label>
                    <input id="capaian" readonly name="capaian" type="number" class="form-control"
                        value="{{ old('capaian', isset($m_borang) ? $m_borang->capaian : '') }}">
                    @if ($errors->has('capaian'))
                        <p class="help-block">
                            {{ $errors->first('capaian') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('kinerja') ? 'has-error' : '' }}">
                    <label for="kinerja">Persen Kinerja</label>

                    <input  id="kinerja" readonly name="kinerja" type="number" class="form-control"
                        value="{{ old('kinerja', isset($m_borang) ? $m_borang->kinerja : '') }}">
                    @if ($errors->has('kinerja'))
                        <p class="help-block">
                            {{ $errors->first('kinerja') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div class="form-group {{ $errors->has('catatan') ? 'has-error' : '' }}">
                    <label for="catatan">Catatan</label>
                    <input type="text" id="catatan" name="catatan"  class="form-control"
                        value="{{ old('catatan', isset($m_borang) ? $m_borang->catatan : '') }}">
                    @if ($errors->has('catatan'))
                        <p class="help-block">
                            {{ $errors->first('catatan') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                            Penilaian
                        </p> -->
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function changeIndicator(idIndicator) {
            console.log(idIndicator);
            axios.get("{{ url('api/indicator-by-type?tipe=') }}"+$('#tipe').val())
                .then(function(response) {
                    $("#"+idIndicator).empty();
                    $("#"+idIndicator).append('<option selected disabled> Pilih Indikator</option>');
                    const data = response.data;
                    data.forEach(function(q) {
                        $("#"+idIndicator).append(new Option(q.name, q.id));
                    });
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
        }

        function addRowIndi() {
            var idx = Math.random().toString(16).slice(2);
            var tipe = $('#tipe').val();
            var expandForm = '';
            if(tipe == 'led'){
                expandForm = `<div class="col-2">
                                <input type="text" class="form-control" id="nomor_`+idx+`" name="nomor[]"/>
                            </div> `;
            }
            
            $('.row_indicator').append(`  <div style="margin-top:8px;" id="row_` + idx + `" class="row">
                    `+expandForm+`
                    <div class="col-6">
                        <textarea row="1" type="text" class="form-control" id="`+idx+`" name="indi_penilai[]" ></textarea>
                    </div>
                    
                <div class="col-4">
                    <button class="btn btn-danger" onclick="removeRowIndi('` + 'row_' + idx + `')" type="button"><i class="fas fa-times"></i></button>
                </div>
                </div>`)
        }

        function removeRowIndi(params) {
            console.log(params)
            $('#' + params).remove();
        }
        function changeType(value) {
            var expandForm = '';
            if(value == 'led'){
                expandForm = `<div class="col-2">
                                <input type="text" class="form-control" id="nomor_1" name="nomor[]"/>
                            </div> `;
            }
            $('.row_indicator').html(`
                        <div class="row ">
                            `+expandForm+`
                            <div class="col-6">
                                <textarea  type="text" class="form-control" id="indi_penilai" name="indi_penilai[]"></textarea>
                            </div>

                            <div class="col-4">
                                <button class="btn btn-success" onclick="addRowIndi()" type="button"><i
                                        class="fas fa-plus"></i> Add</button>


                            </div>
                        </div>
                    `)
        }

        function getNilaiIndikator(id) {
            axios.get("{{ url('api/get-value-indicator?id=') }}"+$('#'+id).val())
                .then(function(response) {
                    const data = response.data;
                    $('#value_'+id).val(data);
                    
                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                })
                .then(function() {
                    // always executed
                });
        }
    </script>
@endsection
