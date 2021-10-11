<?php

namespace App;

use App\Models\m_1_1_kerjasama_pendidikan;
use App\Models\m_1_2_kerjasama_penelitian;
use App\Models\m_1_3_kerjasama_pengabdian_masyarakat;
use App\Models\m_2a_seleksi_mahasiswa_baru;
use App\Models\m_3a4_dosen_tidak_tetap;
use App\Models\m_3a5_dosen_industri;
use App\Models\m_3a_1_dosen_tetap_pt;
use App\Models\m_3a_2_dospem_utama_ta;
use App\Models\m_3b4_1_publikasi_ilmiah_dtps;
use App\Models\m_3b4_2_pagelaran_ilmiah_dtps;
use App\Models\m_3b5_krya_ilmiah_dtps_yg_dstasi;
use App\Models\m_3b6_prdk_dtps_yg_diadps_indstr;
use App\Models\m_3b7_1_luarn_pnltn_lainny_ptn;
use App\Models\m_3b7_3_lrn_pnltn_lnny_tknlg_cpt;
use App\Models\m_3b7_4_lrn_pnltn_lnny_buku;
use App\Models\m_4_penggunaan_data;
use App\Models\m_5a_kurikulum_capaian_pmbljrn;
use App\Models\m_5b_integrasi_keg_penelitian;
use App\Models\m_5c_kepuasan_mahasiswa;
use App\Models\m_6a_pnltn_dtps_yg_mlbtkn_mhs;
use App\Models\m_6b_pen_dtps_yg_mjd_ruj_tm_tss;
use App\Models\m_7_pkm_dtps_yg_melibatkan_mhs;
use App\Models\m_8a_ipk_lulusan;
use App\Models\m_8b1_prestasi_akdmk_mhs;
use App\Models\m_8b2_prestasi_nonakdmk_mhs;
use App\Models\m_8c_masastudi_lllsn_dok;
use App\Models\m_8c_masastudi_llsn_dip;
use App\Models\m_8c_masastudi_llsn_mgr;
use App\Models\m_8c_masastudi_llsn_srj;
use App\Models\m_8d1_wkt_llsn_dip;
use App\Models\m_8d1_wkt_llsn_sjter;
use App\Models\m_8d1_wkt_llsn_srj;
use App\Models\m_8e1_tmp_krj_lulusan;
use App\Models\m_8e2_kepuasan_pgn_llsn;
use App\Models\m_8f1_1_publks_ilmiah_mhs;
use App\Models\m_8f1_2_pglrn_ilmiah_mhs;
use App\Models\m_8f2_kry_ilmiah_mhs_dsts;
use App\Models\m_8f3_produk_dtps_mhs;
use Illuminate\Database\Eloquent\Model;

class m_lkps extends Model
{
    public function kerjasamaPendidikan()
    {
        return $this->morphedByMany(m_1_1_kerjasama_pendidikan::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function kerjasamaPenelitian()
    {
        return $this->morphedByMany(m_1_2_kerjasama_penelitian::class, 'lkpsables');
    }

    public function kerjasamaPengapdianMasyarakat()
    {
        return $this->morphedByMany(m_1_3_kerjasama_pengabdian_masyarakat::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function seleksiMahasiswa()
    {
        return $this->morphedByMany(m_2a_seleksi_mahasiswa_baru::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function dosenTetepaPT()
    {
        return $this->morphedByMany(m_3a_1_dosen_tetap_pt::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function dosePemUtama()
    {
        return $this->morphedByMany(m_3a_2_dospem_utama_ta::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function dosenTidakTeteap()
    {
        return $this->morphedByMany(m_3a4_dosen_tidak_tetap::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function dosenIndustri()
    {
        return $this->morphedByMany(m_3a5_dosen_industri::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function penelitianDtps()
    {
        return $this->morphedByMany(m_3a5_dosen_industri::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function publikasiIlmiahDtps()
    {
        return $this->morphedByMany(m_3b4_1_publikasi_ilmiah_dtps::class, 'lkpsables')->withPivot(['value','id']);
    }

    public function pagelaranIlmiahDtps()
    {
        return $this->morphedByMany(m_3b4_2_pagelaran_ilmiah_dtps::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function karyaIlmiahDtps()
    {
        return $this->morphedByMany(m_3b5_krya_ilmiah_dtps_yg_dstasi::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function produkIlmiahYangDiadopsi()
    {
        return $this->morphedByMany(m_3b6_prdk_dtps_yg_diadps_indstr::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function luaranPenelitianLainnyaPtn()
    {
        return $this->morphedByMany(m_3b7_1_luarn_pnltn_lainny_ptn::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function luaranPenelitianLainnyaTeknologiCpt()
    {
        return $this->morphedByMany(m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function luaranPenelitianLainnyaBuku()
    {
        return $this->morphedByMany(m_3b7_4_lrn_pnltn_lnny_buku::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function penggunaanData()
    {
        return $this->morphedByMany(m_4_penggunaan_data::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function kurikulumCapaianPjr()
    {
        return $this->morphedByMany(m_5a_kurikulum_capaian_pmbljrn::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function integrasiPenelitian()
    {
        return $this->morphedByMany(m_5b_integrasi_keg_penelitian::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function kepusanMahasiswa()
    {
        return $this->morphedByMany(m_5c_kepuasan_mahasiswa::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function penelitianDtpsYgMelibatkanMhs()
    {
        return $this->morphedByMany(m_6a_pnltn_dtps_yg_mlbtkn_mhs::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function dtpsYgJdRujukanTmTss()
    {
        return $this->morphedByMany(m_6b_pen_dtps_yg_mjd_ruj_tm_tss::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function pkmDtpsYgMelibatkanMhs()
    {
        return $this->morphedByMany(m_7_pkm_dtps_yg_melibatkan_mhs::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function ipkLulusan()
    {
        return $this->morphedByMany(m_8a_ipk_lulusan::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function prestasiAkademik()
    {
        return $this->morphedByMany(m_8b1_prestasi_akdmk_mhs::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function prestaisNonAkademik()
    {
        return $this->morphedByMany(m_8b2_prestasi_nonakdmk_mhs::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function masaStudiLlsnDok()
    {
        return $this->morphedByMany(m_8c_masastudi_lllsn_dok::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function masaStudiLlsnDiploma()
    {
        return $this->morphedByMany(m_8c_masastudi_llsn_dip::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function masaStudiLlsnMagister()
    {
        return $this->morphedByMany(m_8c_masastudi_llsn_mgr::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function masaStudiLlsnSarjana()
    {
        return $this->morphedByMany(m_8c_masastudi_llsn_srj::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function waktuLulusanDiploma()
    {
        return $this->morphedByMany(m_8d1_wkt_llsn_dip::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function waktuLulusanSarjanaTerapan()
    {
        return $this->morphedByMany(m_8d1_wkt_llsn_sjter::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function waktuLulusanSarjana()
    {
        return $this->morphedByMany(m_8d1_wkt_llsn_srj::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function tmptKerjaLulusan()
    {
        return $this->morphedByMany(m_8e1_tmp_krj_lulusan::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function kepuasanPenggunaLulusan()
    {
        return $this->morphedByMany(m_8e2_kepuasan_pgn_llsn::class, 'lkpsables')->withPivot(['value','id']);
    }
    // public function publikasiIlmiahMhs()
    // {
    //     return $this->morphedByMany(m_8f1_1_publks_ilmiah_mhs::class, 'lkpsables')->withPivot(['value','id']);
    // }
    public function karyaIlmiahMhsDisitasi()
    {
        return $this->morphedByMany(m_8f2_kry_ilmiah_mhs_dsts::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function pagelaranIlmiahMhs()
    {
        return $this->morphedByMany(m_8f1_2_pglrn_ilmiah_mhs::class, 'lkpsables')->withPivot(['value','id']);
    }
    public function produkDtps()
    {
        return $this->morphedByMany(m_8f3_produk_dtps_mhs::class, 'lkpsables')->withPivot(['value','id']);
    }

}
