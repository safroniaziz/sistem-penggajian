<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;
use DB;

class LaporanController extends Controller
{

	public function laporan()
	{
        // DB::statement(DB::raw('set @rownum=0'));
        $laporan= DB::table('tb_pegawai')
                ->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pegawai.id_jabatan')
                // ->select('tb_pegawai.nm_pegawai','')
                ->select('nipy','nm_pegawai','masa_kerja','nm_jabatan','tb_pegawai.bulan','gaji_pokok','tunj_jabatan','uang_makan','tunj_akomodasi','tunj_pulsa','tunj_bbm','tunj_hari_raya','tunj_keahlian','tunj_yayasan','bonus','tb_pegawai.lembur','tb_jabatan.potongan')
                ->get();
                // dd($laporan);
        $gaji_pokok = DB::table('tb_jabatan')->sum('gaji_pokok');
        $tunj_jabatan = DB::table('tb_jabatan')->sum('tunj_jabatan');
        $uang_makan = DB::table('tb_jabatan')->sum('uang_makan');
        $tunj_akomodasi = DB::table('tb_jabatan')->sum('tunj_akomodasi');
        $tunj_pulsa = DB::table('tb_jabatan')->sum('tunj_pulsa');
        $tunj_bbm = DB::table('tb_jabatan')->sum('tunj_bbm');
        $potongan = DB::table('tb_jabatan')->sum('potongan');
        $tunj_hari_raya = DB::table('tb_pegawai')->sum('tunj_hari_raya');
        $tunj_yayasan = DB::table('tb_pegawai')->sum('tunj_yayasan');
        $bonus = DB::table('tb_pegawai')->sum('bonus');
        $tunj_keahlian = DB::table('tb_pegawai')->sum('tunj_yayasan');
        $lembur = DB::table('tb_pegawai')->sum('lembur');
        // dd($gaji_pokok);
        $total = ($gaji_pokok+$tunj_jabatan+$uang_makan+$tunj_akomodasi+$tunj_pulsa+$tunj_bbm+$tunj_hari_raya+$tunj_yayasan+$bonus+$tunj_keahlian+$lembur)-$potongan;
        // dd($total);
        // dd($total);
		return view('admin/laporan.index')->with('laporan',$laporan)->with('total',$total);
	}

    public function apiLaporan()
    {
     //    DB::statement(DB::raw('set @rownum=0'));
    	// $laporan= DB::table('tb_pegawai')
    	// 		->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pegawai.id_jabatan')
    	// 		// ->select('tb_pegawai.nm_pegawai','')
     //            ->select('nipy','nm_pegawai','masa_kerja','nm_jabatan','gaji_pokok','tunj_jabatan','uang_makan','tunj_akomodasi','tunj_pulsa','tunj_bbm','tunj_hari_raya','tunj_keahlian','tunj_yayasan','bonus','tb_jabatan.lembur','tb_jabatan.potongan',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
     //            ->get();
        // return Datatables::of($laporan)

        //     ->make(true);
    }

    public function printDetail($nipy)
    {
        $detail= DB::table('tb_pegawai')
                ->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pegawai.id_jabatan')
                // ->select('tb_pegawai.nm_pegawai','')
                ->select('nipy','nm_pegawai','masa_kerja','nm_jabatan','gaji_pokok','tunj_jabatan','uang_makan','tunj_akomodasi','tunj_pulsa','tunj_bbm','tunj_hari_raya','tunj_keahlian','bulan','tunj_yayasan','bonus','tb_pegawai.lembur','tb_jabatan.potongan')
                ->where('tb_pegawai.nipy',$nipy)
                ->get();
                // dd($detail);
        $pdf = PDF::loadView('admin/laporan.laporan_detail',compact('detail'));
        $pdf->setPaper('a4','portrait');
        return $pdf->stream();
    }
}
