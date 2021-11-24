@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header row">

            <div class="col-8">
                LKPS
                
            </div>
            <div class="col-4">
                <select class="form-control" id="select_prodi" onchange="selectProdi()">
                    <option value="">Pilih Jurusan</option>
                    @foreach ($user as $item)
                        @if (Session::get('prodi_id') == $item->id)
                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif

                    @endforeach
                </select>
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
                            
                                <th width="3">
                                    Nilai
                                </th>
                            
                            <th>
                                LKPS
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listlkps as $item)
                            <tr>
                                <td>
                                </td>
                                @can('lkps_nilai')
                                    <td>
                                        <input type="number" id="{{ $item->id }}"
                                            onkeyup="changeNilai('{{ $item->id }}')" value="{{ $item->value }}" />
                                    </td>
                                    
                                @endcan
                                @cannot('lkps_nilai')
                                <td>
                                    <input type="text" class="form-control" readonly value="{{ $item->value }}" />
                                </td> 
                                @endcannot
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    @can('lkps_show')
                                        <a class="btn btn-xs btn-primary" href="{{ $item->url ? route($item->url) : '#' }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach

                        {{-- <tr>
                    <td>
                        </td>
                        <td>
                            1.B. Kerjasama Penelitian
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_1_2_kerjasama_penelitian.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            1.C. Kerjasama PKM
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_1_3_kerjasama_pkm.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            2.A. Seleksi Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_2a_seleksi_mahasiswa_baru.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            2.B. Mahasiswa Asing
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_2b_mahasiswa_asing.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.A.1 Dosen Tetap Perguruan Tinggi
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a_1_dosen_tetap_pt.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.A.2 Dosen Pembimbing Utama Tugas Akhir
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a_2_dospem_utama_ta.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.A.3 Ekuivalen Waktu Mengajar Penuh (EWMP) Dosen Tetap Perguruan Tinggi
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a_3_ewmp_dosen_tetap_pt.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.A.4 Dosen Tidak Tetap 
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a4_dosen_tidak_tetap.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.A.5 Dosen Industri/Praktisi  
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3a_2_dospem_utama_ta.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.1 Pengakuan/Rekognisi Dosen
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b1_pengakuan_dtps.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.2 Penelitian DTPS
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b2_penelitian_dtps.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.3 PkM DTPS
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b3_pkm_dtps.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.4.1 Publikasi Ilmiah DTPS
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b4_1_publikasi_ilmiah_dtps.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.4.2 Pagelaran/Pameran/Presentasi/Publikasi Ilmiah DTPS
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b4_2_pagelaran_ilmiah_dtps.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.5 Karya Ilmiah DTPS yang Disitasi
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b5_krya_ilmiah_dtps_yg_dstasi.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.6 Produk/Jasa DTPS yang Diadopsi oleh Industri/Masyarakat
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b6_prdk_dtps_yg_diadps_indstr.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.7.1 Luaran Penelitian/PkM Lainnya - HKI (Paten, Paten Sederhana)
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.7.2 Luaran Penelitian/PkM Lainnya - Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b7_2_lrn_pltn_lnny_hki_hk_cpt.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.7.3 Luaran Penelitian/PkM Lainnya - Buku ber-ISBN, Book Chapter
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b7_3_lrn_pnltn_lnny_tknlg_cpt.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            3.B.7.4 Luaran Penelitian/PkM Lainnya oleh DTPS
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_3b7_4_lrn_pnltn_lnny_buku.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            4. Penggunaan Dana
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_4_penggunaan_data.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            5.A Kurikulum, Capaian Pembelajaran, dan Rencana Pembelajaran
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_5a_kurikulum_capaian_pmbljrn.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            5.B Integrasi Kegiatan Penelitian/PkM dalam Pembelajaran
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_5b_integrasi_keg_penelitian.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            5.C Kepuasan Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_5c_kepuasan_mahasiswa.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                    <td>
                        </td>
                        <td>
                            6.A Penelitian DTPS yang Melibatkan Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_6a_pnltn_dtps_yg_mlbtkn_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            6.B Penelitian DTPS yang Menjadi Rujukan Tema Tesis/Disertasi
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            7. PkM DTPS yang Melibatkan Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_7_pkm_dtps_yg_melibatkan_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.A IPK Lulusan
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8a_ipk_lulusan.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.B.1 Prestasi Akademik Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8b1_prestasi_akdmk_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.B.2 Prestasi Non-akademik Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8b2_prestasi_nonakdmk_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.C Masa Studi Lulusan Diploma
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8c_masastudi_llsn_dip.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.C Masa Studi Lulusan Sarjana
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8c_masastudi_llsn_srj.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.C Masa Studi Lulusan Magister
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8c_masastudi_llsn_mgr.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.C Masa Studi Lulusan Doktor
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8c_masastudi_lllsn_dok.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.D.1 Waktu Tunggu Lulusan Diploma
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8d1_wkt_llsn_dip.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.D.1 Waktu Tunggu Lulusan Sarjana
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8d1_wkt_llsn_srj.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.D.1 Waktu Tunggu Lulusan Sarjana Terapan
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8d1_wkt_llsn_sjter.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.E.1 Tempat Kerja Lulusan
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8e1_tmp_krj_lulusan.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.E.2 Kepuasan Pengguna Lulusan
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8e2_kepuasan_pgn_llsn.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.1.1 Publikasi Ilmiah Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f1_1_publks_ilmiah_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.1.2 Pagelaran/Pameran/Presentasi/Publikasi Ilmiah Mahasiswa
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f1_2_pglrn_ilmiah_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.2 Karya Ilmiah Mahasiswa yang Disitasi
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f2_kry_ilmiah_mhs_dsts.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.3 Produk/Jasa Mahasiswa yang Diadopsi oleh Industri/Masyarakat
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f3_produk_dtps_mhs.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.4.1 Luaran Penelitian yang Dihasilkan Mahasiswa - HKI (Paten, Paten Sederhana)
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f4_1_luaran_penelitian_mp.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.4.2 Luaran Penelitian yang Dihasilkan Mahasiswa - HKI (Hak Cipta, Desain Produk Industri, dll.)
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f4_2_luaran_penelitian_mhc.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.4.3 Luaran Penelitian yang Dihasilkan Mahasiswa -Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f4_3_luaran_penelitian_ttg.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            8.F.4.4 Luaran Penelitian yang Dihasilkan Mahasiswa - Buku ber-ISBN, Book Chapter
                        </td>
                        <td>
                            @can('lkps_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.r_8f4_4_luaran_penelitian_isbn.index') }}">
                                        {{ trans('global.view') }}
                                    </a>
                            @endcan
                        </td>
                    </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.r_led.massDestroy') }}",
                className: 'btn-danger',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('product_delete')
                dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
        })

        function changeNilai(id) {
            var prodi_id = $('#select_prodi').val();
            var nilai = $('#' + id).val();
            axios.post("{{ url('api/lkps/change/nilai') }}", {
                    id: id,
                    nilai: nilai,
                    prodi_id:prodi_id
                })
                .then(function(response) {
                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function selectProdi() {
            var prodi_id = $('#select_prodi').val();
            axios.post("{{ url('set-session') }}", {
                    prodi_id: prodi_id,
                    
                })
                .then(function(response) {
                    console.log(response);
                    window.location.href = "{{url('admin/r_lkps_penilaian/daftar_lkps?prodi_id=')}}"+prodi_id;
                })
                .catch(function(error) {
                    console.log(error);
                    
                });
            
        }
    </script>
@endsection
