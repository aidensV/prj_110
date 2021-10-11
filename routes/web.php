<?php

use App\Http\Controllers\Admin\c_borang;
use App\Http\Controllers\Admin\c_lkps_penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/pass',function(){
    return bcrypt('123456');
});
Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);
Route::post('set-session',function(Request $request){
    Session::put('prodi_id', $request->prodi_id);

    return response()->json(['status' => $request->all()]);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::prefix('lkps')->group(function(){
        Route::get('show/{id}',[c_lkps_penilaian::class,'showLkps']);

    });
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::delete('r_1_1_kerjasama_pendidikan/destroy', 'c_1_1_kerjasama_pendidikan@massDestroy')->name('r_1_1_kerjasama_pendidikan.massDestroy');

    Route::resource('r_1_1_kerjasama_pendidikan', 'c_1_1_kerjasama_pendidikan');

    Route::delete('r_1_2_kerjasama_penelitian/destroy', 'c_1_2_kerjasama_penelitian@massDestroy')->name('r_1_2_kerjasama_penelitian.massDestroy');

    Route::resource('r_1_2_kerjasama_penelitian', 'c_1_2_kerjasama_penelitian');

    Route::delete('r_1_3_kerjasama_pkm/destroy', 'c_1_3_kerjasama_pengabdian_masyarakat@massDestroy')->name('r_1_3_kerjasama_pkm.massDestroy');

    Route::resource('r_1_3_kerjasama_pkm', 'c_1_3_kerjasama_pengabdian_masyarakat');

    Route::delete('r_2a_seleksi_mahasiswa_baru/destroy', 'c_2a_seleksi_mahasiswa_baru@massDestroy')->name('r_2a_seleksi_mahasiswa_baru.massDestroy');

    Route::resource('r_2a_seleksi_mahasiswa_baru', 'c_2a_seleksi_mahasiswa_baru');

    Route::delete('r_2b_mahasiswa_asing/destroy', 'c_2b_mahasiswa_asing@massDestroy')->name('r_2b_mahasiswa_asing.massDestroy');

    Route::resource('r_2b_mahasiswa_asing', 'c_2b_mahasiswa_asing');

    Route::delete('r_3a_1_dosen_tetap_pt/destroy', 'c_3a_1_dosen_tetap_pt@massDestroy')->name('r_3a_1_dosen_tetap_pt.massDestroy');

    Route::resource('r_3a_1_dosen_tetap_pt', 'c_3a_1_dosen_tetap_pt');

    Route::delete('r_3a_2_dospem_utama_ta/destroy', 'c_3a_2_dospem_utama_ta@massDestroy')->name('r_3a_2_dospem_utama_ta.massDestroy');

    Route::resource('r_3a_2_dospem_utama_ta', 'c_3a_2_dospem_utama_ta');

    Route::delete('r_3a_3_ewmp_dosen_tetap_pt/destroy', 'c_3a_3_ewmp_dosen_tetap_pt@massDestroy')->name('r_3a_3_ewmp_dosen_tetap_pt.massDestroy');

    Route::resource('r_3a_3_ewmp_dosen_tetap_pt', 'c_3a_3_ewmp_dosen_tetap_pt');

    Route::delete('r_3a4_dosen_tidak_tetap/destroy', 'c_3a4_dosen_tidak_tetap@massDestroy')->name('r_3a4_dosen_tidak_tetap.massDestroy');

    Route::resource('r_3a4_dosen_tidak_tetap', 'c_3a4_dosen_tidak_tetap');

    Route::delete('r_3b1_pengakuan_dtps/destroy', 'c_3b1_pengakuan_dtps@massDestroy')->name('r_3b1_pengakuan_dtps.massDestroy');

    Route::resource('r_3b1_pengakuan_dtps', 'c_3b1_pengakuan_dtps');

    Route::delete('r_3b2_penelitian_dtps/destroy', 'c_3b2_penelitian_dtps@massDestroy')->name('r_3b2_penelitian_dtps.massDestroy');

    Route::resource('r_3b2_penelitian_dtps', 'c_3b2_penelitian_dtps');

    Route::delete('r_3b3_pkm_dtps/destroy', 'c_3b3_pkm_dtps@massDestroy')->name('r_3b3_pkm_dtps.massDestroy');

    Route::resource('r_3b3_pkm_dtps', 'c_3b3_pkm_dtps');

    Route::delete('r_3b4_1_publikasi_ilmiah_dtps/destroy', 'c_3b4_1_publikasi_ilmiah_dtps@massDestroy')->name('r_3b4_1_publikasi_ilmiah_dtps.massDestroy');

    Route::resource('r_3b4_1_publikasi_ilmiah_dtps', 'c_3b4_1_publikasi_ilmiah_dtps');

    Route::delete('r_3b4_2_pagelaran_ilmiah_dtps/destroy', 'c_3b4_2_pagelaran_ilmiah_dtps@massDestroy')->name('r_3b4_2_pagelaran_ilmiah_dtps.massDestroy');

    Route::resource('r_3b4_2_pagelaran_ilmiah_dtps', 'c_3b4_2_pagelaran_ilmiah_dtps');

    Route::delete('r_3b5_krya_ilmiah_dtps_yg_dstasi/destroy', 'c_3b5_krya_ilmiah_dtps_yg_dstasi@massDestroy')->name('r_3b5_krya_ilmiah_dtps_yg_dstasi.massDestroy');

    Route::resource('r_3b5_krya_ilmiah_dtps_yg_dstasi', 'c_3b5_krya_ilmiah_dtps_yg_dstasi');

    Route::delete('r_3b6_prdk_dtps_yg_diadps_indstr/destroy', 'c_3b6_prdk_dtps_yg_diadps_indstr@massDestroy')->name('r_3b6_prdk_dtps_yg_diadps_indstr.massDestroy');

    Route::resource('r_3b6_prdk_dtps_yg_diadps_indstr', 'c_3b6_prdk_dtps_yg_diadps_indstr');

    Route::delete('r_3b7_1_luarn_pnltn_lainny_ptn/destroy', 'c_3b7_1_luarn_pnltn_lainny_ptn@massDestroy')->name('r_3b7_1_luarn_pnltn_lainny_ptn.massDestroy');

    Route::resource('r_3b7_1_luarn_pnltn_lainny_ptn', 'c_3b7_1_luarn_pnltn_lainny_ptn');

    Route::delete('r_3b7_2_lrn_pltn_lnny_hki_hk_cpt/destroy', 'c_3b7_2_lrn_pltn_lnny_hki_hk_cpt@massDestroy')->name('r_3b7_2_lrn_pltn_lnny_hki_hk_cpt.massDestroy');

    Route::resource('r_3b7_2_lrn_pltn_lnny_hki_hk_cpt', 'c_3b7_2_lrn_pltn_lnny_hki_hk_cpt');

    Route::delete('r_3b7_3_lrn_pnltn_lnny_tknlg_cpt/destroy', 'c_3b7_3_lrn_pnltn_lnny_tknlg_cpt@massDestroy')->name('r_3b7_3_lrn_pnltn_lnny_tknlg_cpt.massDestroy');

    Route::resource('r_3b7_3_lrn_pnltn_lnny_tknlg_cpt', 'c_3b7_3_lrn_pnltn_lnny_tknlg_cpt');

    Route::delete('r_3b7_4_lrn_pnltn_lnny_buku/destroy', 'c_3b7_4_lrn_pnltn_lnny_buku@massDestroy')->name('r_3b7_4_lrn_pnltn_lnny_buku.massDestroy');

    Route::resource('r_3b7_4_lrn_pnltn_lnny_buku', 'c_3b7_4_lrn_pnltn_lnny_buku');

    Route::delete('r_4_penggunaan_data/destroy', 'c_4_penggunaan_data@massDestroy')->name('r_4_penggunaan_data.massDestroy');

    Route::resource('r_4_penggunaan_data', 'c_4_penggunaan_data');

    Route::delete('r_5a_kurikulum_capaian_pmbljrn/destroy', 'c_5a_kurikulum_capaian_pmbljrn@massDestroy')->name('r_5a_kurikulum_capaian_pmbljrn.massDestroy');

    Route::resource('r_5a_kurikulum_capaian_pmbljrn', 'c_5a_kurikulum_capaian_pmbljrn');

    Route::delete('r_5b_integrasi_keg_penelitian/destroy', 'c_5b_integrasi_keg_penelitian@massDestroy')->name('r_5b_integrasi_keg_penelitian.massDestroy');

    Route::resource('r_5b_integrasi_keg_penelitian', 'c_5b_integrasi_keg_penelitian');

    Route::delete('r_5c_kepuasan_mahasiswa/destroy', 'c_5c_kepuasan_mahasiswa@massDestroy')->name('r_5c_kepuasan_mahasiswa.massDestroy');

    Route::resource('r_5c_kepuasan_mahasiswa', 'c_5c_kepuasan_mahasiswa');

    Route::delete('r_6a_pnltn_dtps_yg_mlbtkn_mhs/destroy', 'c_6a_pnltn_dtps_yg_mlbtkn_mhs@massDestroy')->name('r_6a_pnltn_dtps_yg_mlbtkn_mhs.massDestroy');

    Route::resource('r_6a_pnltn_dtps_yg_mlbtkn_mhs', 'c_6a_pnltn_dtps_yg_mlbtkn_mhs');

    Route::delete('r_6b_pen_dtps_yg_mjd_ruj_tm_tss/destroy', 'c_6b_pen_dtps_yg_mjd_ruj_tm_tss@massDestroy')->name('r_6b_pen_dtps_yg_mjd_ruj_tm_tss.massDestroy');

    Route::resource('r_6b_pen_dtps_yg_mjd_ruj_tm_tss', 'c_6b_pen_dtps_yg_mjd_ruj_tm_tss');

    Route::delete('r_7_pkm_dtps_yg_melibatkan_mhs/destroy', 'c_7_pkm_dtps_yg_melibatkan_mhs@massDestroy')->name('r_7_pkm_dtps_yg_melibatkan_mhs.massDestroy');

    Route::resource('r_7_pkm_dtps_yg_melibatkan_mhs', 'c_7_pkm_dtps_yg_melibatkan_mhs');

    Route::delete('r_8a_ipk_lulusan/destroy', 'c_8a_ipk_lulusan@massDestroy')->name('r_8a_ipk_lulusan.massDestroy');

    Route::resource('r_8a_ipk_lulusan', 'c_8a_ipk_lulusan');

    Route::delete('r_8b1_prestasi_akdmk_mhs/destroy', 'c_8b1_prestasi_akdmk_mhs@massDestroy')->name('r_8b1_prestasi_akdmk_mhs.massDestroy');

    Route::resource('r_8b1_prestasi_akdmk_mhs', 'c_8b1_prestasi_akdmk_mhs');

    Route::delete('r_8b2_prestasi_nonakdmk_mhs/destroy', 'c_8b2_prestasi_nonakdmk_mhs@massDestroy')->name('r_8b2_prestasi_nonakdmk_mhs.massDestroy');

    Route::resource('r_8b2_prestasi_nonakdmk_mhs', 'c_8b2_prestasi_nonakdmk_mhs');

    Route::delete('r_8c_masastudi_llsn_dip/destroy', 'c_8c_masastudi_llsn_dip@massDestroy')->name('r_8c_masastudi_llsn_dip.massDestroy');

    Route::resource('r_8c_masastudi_llsn_dip', 'c_8c_masastudi_llsn_dip');
    
    Route::delete('r_8c_masastudi_llsn_srj/destroy', 'c_8c_masastudi_llsn_srj@massDestroy')->name('r_8c_masastudi_llsn_srj.massDestroy');

    Route::resource('r_8c_masastudi_llsn_srj', 'c_8c_masastudi_llsn_srj');

    Route::delete('r_8c_masastudi_llsn_mgr/destroy', 'c_8c_masastudi_llsn_mgr@massDestroy')->name('r_8c_masastudi_llsn_mgr.massDestroy');

    Route::resource('r_8c_masastudi_llsn_mgr', 'c_8c_masastudi_llsn_mgr');

    Route::delete('r_8c_masastudi_lllsn_dok/destroy', 'c_8c_masastudi_lllsn_dok@massDestroy')->name('r_8c_masastudi_lllsn_dok.massDestroy');

    Route::resource('r_8c_masastudi_lllsn_dok', 'c_8c_masastudi_lllsn_dok');

    Route::delete('r_8d1_wkt_llsn_dip/destroy', 'c_8d1_wkt_llsn_dip@massDestroy')->name('r_8d1_wkt_llsn_dip.massDestroy');

    Route::resource('r_8d1_wkt_llsn_dip', 'c_8d1_wkt_llsn_dip');

    Route::delete('r_8d1_wkt_llsn_srj/destroy', 'c_8d1_wkt_llsn_srj@massDestroy')->name('r_8d1_wkt_llsn_srj.massDestroy');

    Route::resource('r_8d1_wkt_llsn_srj', 'c_8d1_wkt_llsn_srj');

    Route::delete('r_8d1_wkt_llsn_sjter/destroy', 'c_8d1_wkt_llsn_sjter@massDestroy')->name('r_8d1_wkt_llsn_sjter.massDestroy');

    Route::resource('r_8d1_wkt_llsn_sjter', 'c_8d1_wkt_llsn_sjter');

    Route::delete('r_8e1_tmp_krj_lulusan/destroy', 'c_8e1_tmp_krj_lulusan@massDestroy')->name('r_8e1_tmp_krj_lulusan.massDestroy');

    Route::resource('r_8e1_tmp_krj_lulusan', 'c_8e1_tmp_krj_lulusan');

    Route::delete('r_8e2_kepuasan_pgn_llsn/destroy', 'c_8e2_kepuasan_pgn_llsn@massDestroy')->name('r_8e2_kepuasan_pgn_llsn.massDestroy');

    Route::resource('r_8e2_kepuasan_pgn_llsn', 'c_8e2_kepuasan_pgn_llsn');

    Route::delete('r_8f1_1_publks_ilmiah_mhs/destroy', 'c_8f1_1_publks_ilmiah_mhs@massDestroy')->name('r_8f1_1_publks_ilmiah_mhs.massDestroy');

    Route::resource('r_8f1_1_publks_ilmiah_mhs', 'c_8f1_1_publks_ilmiah_mhs');

    Route::delete('r_8f1_2_pglrn_ilmiah_mhs/destroy', 'c_8f1_2_pglrn_ilmiah_mhs@massDestroy')->name('r_8f1_2_pglrn_ilmiah_mhs.massDestroy');

    Route::resource('r_8f1_2_pglrn_ilmiah_mhs', 'c_8f1_2_pglrn_ilmiah_mhs');

    Route::delete('r_8f2_kry_ilmiah_mhs_dsts/destroy', 'c_8f2_kry_ilmiah_mhs_dsts@massDestroy')->name('r_8f2_kry_ilmiah_mhs_dsts.massDestroy');

    Route::resource('r_8f2_kry_ilmiah_mhs_dsts', 'c_8f2_kry_ilmiah_mhs_dsts');

    Route::delete('r_8f3_produk_dtps_mhs/destroy', 'c_8f3_produk_dtps_mhs@massDestroy')->name('r_8f3_produk_dtps_mhs.massDestroy');

    Route::resource('r_8f3_produk_dtps_mhs', 'c_8f3_produk_dtps_mhs');

    Route::delete('r_8f4_1_luaran_penelitian_mp/destroy', 'c_8f4_1_luaran_penelitian_mp@massDestroy')->name('r_8f4_1_luaran_penelitian_mp.massDestroy');

    Route::resource('r_8f4_1_luaran_penelitian_mp', 'c_8f4_1_luaran_penelitian_mp');

    Route::delete('r_8f4_2_luaran_penelitian_mhc/destroy', 'c_8f4_2_luaran_penelitian_mhc@massDestroy')->name('r_8f4_2_luaran_penelitian_mhc.massDestroy');

    Route::resource('r_8f4_2_luaran_penelitian_mhc', 'c_8f4_2_luaran_penelitian_mhc');

    Route::delete('r_8f4_3_luaran_penelitian_ttg/destroy', 'c_8f4_3_luaran_penelitian_ttg@massDestroy')->name('r_8f4_3_luaran_penelitian_ttg.massDestroy');

    Route::resource('r_8f4_3_luaran_penelitian_ttg', 'c_8f4_3_luaran_penelitian_ttg');

    Route::delete('r_8f4_4_luaran_penelitian_isbn/destroy', 'c_8f4_4_luaran_penelitian_isbn@massDestroy')->name('r_8f4_4_luaran_penelitian_isbn.massDestroy');

    Route::resource('r_8f4_4_luaran_penelitian_isbn', 'c_8f4_4_luaran_penelitian_isbn');

    Route::delete('r_audit/destroy', 'c_audit@massDestroy')->name('r_audit.massDestroy');

    Route::resource('r_audit', 'c_audit');

    Route::delete('r_led/destroy', 'c_led@massDestroy')->name('r_led.massDestroy');

    Route::resource('r_led', 'c_led');

    Route::delete('r_elemen_led/destroy', 'c_elemen_led@massDestroy')->name('r_elemen_led.massDestroy');

    Route::resource('r_elemen_led', 'c_elemen_led');

    Route::delete('r_elemen_lkps/destroy', 'c_elemen_lkps@massDestroy')->name('r_elemen_lkps.massDestroy');

    Route::resource('r_elemen_lkps', 'c_elemen_lkps');

    Route::delete('r_led_penilaian/destroy', 'c_led_penilaian@massDestroy')->name('r_led_penilaian.massDestroy');

    Route::resource('r_led_penilaian', 'c_led_penilaian');
    
    Route::get('r_lkps_penilaian/daftar_lkps', 'c_lkps_penilaian@daftar_lkps')->name('r_lkps_penilaian.daftar_lkps');

    Route::delete('r_lkps_penilaian/destroy', 'c_lkps_penilaian@massDestroy')->name('r_lkps_penilaian.massDestroy');

    Route::resource('r_lkps_penilaian', 'c_lkps_penilaian');

    Route::delete('r_iku/destroy', 'c_iku@massDestroy')->name('r_iku.massDestroy');

    Route::resource('r_iku', 'c_iku');

    Route::delete('r_borang/destroy', 'c_borang@massDestroy')->name('r_borang.massDestroy');

    Route::resource('r_borang', 'c_borang');
    Route::get('borang/export-pdf',[c_borang::class,'exportpdf']);

    

   


});
