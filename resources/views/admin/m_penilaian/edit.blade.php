@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LED
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_led.update", [$m_led->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('kategori_strata') ? 'has-error' : '' }}">
                <label for="kategori_strata">Kategori Strata<span class="text-danger">*</span></label>
                <select class="form-control select2 {{ $errors->has('kategori_strata') ? 'is-invalid' : '' }}" name="kategori_strata" id="kategori_strata" required>
                    <option value disabled {{ old('kategori_strata', null) === null ? 'selected' : '' }}>{{ trans('id.silahkanPilih') }}</option>
                    @foreach($kategori_strata as $key => $label)
                        <option value="{{ $key }}" {{ old('kategori_strata', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('kategori_strata'))
                    <p class="help-block text-danger mt-2">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('kategori_strata') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('nilai_asesmen') ? 'has-error' : '' }}">
                <label for="nilai_asesmen">Nilai Asesmen</label>
                <p class="helper-block text-muted">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> nilai_asesmen
                </p>
                <input type="text" id="nilai_asesmen" name="nilai_asesmen" class="form-control" value="{{ old('nilai_asesmen', isset($r_led) ? $r_led->nilai_asesmen : '') }}">
                @if($errors->has('nilai_asesmen'))
                    <p class="help-block text-danger mt-2">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('nilai_asesmen') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('sp_terakreditasi') ? 'has-error' : '' }}">
                    <label for="semester">SP Terakreditasi<span class="text-danger"><span class="text-danger">*</span></span></label>
                    <div class="custom-file">
                        <input name="sp_terakreditasi" id="file-upload" onclick="change_fileName(this)" type="file" class="custom-file-input @error('file') is-invalid @enderror" aria-describedby="inputGroupFile01" lang="in">
                        <label class="custom-file-label" for="file">Unggah SK</label>
                    </div>
                    @if($errors->has('sp_terakreditasi'))
                    <p class="help-block text-danger">
                        <strong>{{ $errors->first('sp_terakreditasi') }}</strong>
                    </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('sp_unggul') ? 'has-error' : '' }}">
                    <label for="semester">SP Unggul<span class="text-danger"><span class="text-danger">*</span></span></label>
                    <div class="custom-file">
                        <input name="sp_unggul" id="file-upload" onclick="change_fileName(this)" type="file" class="custom-file-input @error('file') is-invalid @enderror" aria-describedby="inputGroupFile01" lang="in">
                        <label class="custom-file-label" for="file">Unggah SK</label>
                    </div>
                    @if($errors->has('sp_unggul'))
                    <p class="help-block text-danger">
                        <strong>{{ $errors->first('sp_unggul') }}</strong>
                    </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('sp_baik_sekali') ? 'has-error' : '' }}">
                    <label for="semester">SP Baik Sekali<span class="text-danger"><span class="text-danger">*</span></span></label>
                    <div class="custom-file">
                        <input name="sp_baik_sekali" id="file-upload" onclick="change_fileName(this)" type="file" class="custom-file-input @error('file') is-invalid @enderror" aria-describedby="inputGroupFile01" lang="in">
                        <label class="custom-file-label" for="file">Unggah SK</label>
                    </div>
                    @if($errors->has('sp_baik_sekali'))
                    <p class="help-block text-danger">
                        <strong>{{ $errors->first('sp_baik_sekali') }}</strong>
                    </p>
                    @endif
                </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function change_fileName(input){
    $("#file-upload").on("change", function(){
      // Name of file and placeholder
      var file = this.files[0].name;
      var dflt = $(this).attr("placeholder");
      if($(this).val()!=""){
        $(this).next().text(file);
        var reader = new FileReader();
    reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
      } else {
        $(this).next().text(dflt);
      }
    });
    }
</script>
@endsection

