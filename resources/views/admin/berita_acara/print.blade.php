
<div class="card">
    <div class="card-body">
        <p>Telah dilakukan monitoring dan evaluasi pada:</p>
      <table>
          <tr><td>Tanggal</td> <td>{{$berita->tanggal}}</td></tr>
          <tr><td>Nama Unit Pengelola</td> <td>{{$berita->pengelola->name}}</td></tr>
          <tr><td>Nila Kesiapan Akreditasi</td> <td>{{$berita->nilai}}</td></tr>
          <tr><td>Persentase Capain Kerja</td> <td>{{$berita->persen}}</td></tr>
      </table>
      <br>
          
        <div class="form-group">
            <label for="inputAddress">Dengan Catatan</label>
            <textarea name="catatan" id="" class="form-control" cols="15" rows="5"> @foreach ($borang as $item){{$item->catatan}}@endforeach</textarea>
        </div>

        <div class="form-group">
            <label for="inputAddress">Rekomendasi</label>
            <textarea name="rekomendasi" id="" class="form-control" cols="15" rows="5">{{$berita->rekomendasi}} </textarea>
            </div>

         

            <table width="100%">
                <tr height="50px">
                <td align="left"></td>
                <td align="right">Bandar Lampung {{Carbon\Carbon::now()->format('d/m/Y')}}</td>
                </tr>
                <tr height="50px">
                    <td align="left">Auditor Mutu Internal</td>
                    <td >Auditor Mutu Internal</td>
                    </tr>
                    <br>
                            <br>

                    <tr height="50px" style="line-height:100px;">
                        <td align="left">Acesor 1</td>
                        <td >Acesor 2</td>
                        </tr>
                        <br>
                            <br>

                        <tr height="50px" style="line-height:30px;">
                            <td align="left">Kaprodi Teknik Mesin</td>
                            <td >Ketua Tim Penjaminan Mutu Program Studi</td>
                            </tr>
                            <br>
                            <br>

                            <tr height="50px" style="line-height:100px;">
                                <td align="left">Nama Kaprod</td>
                                <td >Nama Kaprod</td>
                                </tr>
               
                
                </table>
           
            
      
    </div>
</div>

