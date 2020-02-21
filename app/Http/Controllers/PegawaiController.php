<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai= DB::table('tb_pegawai')
                ->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pegawai.id_jabatan')
                ->select('nipy','nm_pegawai','nm_jabatan',DB::raw('@rownum  := @rownum  + 1 AS rownum'),'tunj_hari_raya','tunj_yayasan','bonus', 'tunj_keahlian', 'lembur')
                ->get();
        // dd($int_tahun);
        // dd($tahun);
        // dd($masa_kerja);
    	return view('admin/pegawai.index',compact('pegawai','tahun','masa_kerja'));
    }

    public function apiPegawai()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$pegawai= DB::table('tb_pegawai')
                ->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pegawai.id_jabatan')
                ->select('nipy','nm_pegawai','masa_kerja','nm_jabatan',DB::raw('@rownum  := @rownum  + 1 AS rownum'),'tunj_hari_raya','tunj_yayasan','bonus', 'tunj_keahlian', 'lembur')
                ->get();

        return Datatables::of($pegawai)
            ->addColumn('tunj_hari_raya',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_hari_raya).',-';
            })

            ->addColumn('tunj_yayasan',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_yayasan).',-';
            })

            ->addColumn('bonus',function($pegawai){
                return 'Rp.'.format_uang($pegawai->bonus).',-';
            })

            ->addColumn('tunj_keahlian',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_keahlian).',-';
            })

            ->addColumn('lembur',function($pegawai){
                return 'Rp.'.format_uang($pegawai->lembur).',-';
            })

            ->addColumn('action',function($pegawai){
                return
                '<a onclick="editPegawai('.$pegawai->nipy.')" class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusPegawai('.$pegawai->nipy.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $a = $this->index();
        $data = $request->all();
        // $data = array([
        //     'nm_pegawai'    => $request['nm_pegawai'],
        //     'id_jabatan'    => $request['id_jabatan'],

        //     'masa_kerja'    => $request['masa_kerja'],
        //     'tunj_hari_raya'    => $request['tunj_hari_raya'],
        //     'tunj_yayasan'    => $request['tunj_yayasan'],
        //     'bonus'    => $request['bonus'],
            
        // ]);
        // dd($data);

        Pegawai::create($data);
    }

    public function edit($nipy)
    {
        $pegawai = Pegawai::find($nipy);
        return $pegawai;
    }

    public function update(Request $request, $nipy)
    {
        //$pegawai = Pegawai::findOrFail($nipy);
        //$data = $request->all();
        $pegawai = Pegawai::find($nipy);
        $input = $request->all();
        $pegawai->fill($input)->save();

        // dd($pegawai);
    }
    public function destroy($nipy)
    {
        Pegawai::destroy($nipy);
    }
}
