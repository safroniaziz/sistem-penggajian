<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
use App\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
    	return view('admin/jabatan.index');
    }

    public function apiJabatan()
    {
        DB::statement(DB::raw('set @rownum=0'));
    	$jabatan= DB::table('tb_jabatan')
                ->select('id_jabatan','nm_jabatan','gaji_pokok','tunj_jabatan','uang_makan','tunj_akomodasi','tunj_pulsa','tunj_bbm','potongan',DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->get();
        return Datatables::of($jabatan)
            ->addColumn('gaji_pokok',function($pegawai){
                return 'Rp.'.format_uang($pegawai->gaji_pokok).',-';
            })
            ->addColumn('tunj_jabatan',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_jabatan).',-';
            })
            ->addColumn('uang_makan',function($pegawai){
                return 'Rp.'.format_uang($pegawai->uang_makan).',-';
            })
            ->addColumn('tunj_akomodasi',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_akomodasi).',-';
            })
            ->addColumn('tunj_pulsa',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_pulsa).',-';
            })
            ->addColumn('tunj_bbm',function($pegawai){
                return 'Rp.'.format_uang($pegawai->tunj_bbm).',-';
            })
            ->addColumn('potongan',function($pegawai){
                return 'Rp.'.format_uang($pegawai->potongan).',-';
            })
            ->addColumn('action',function($jabatan){
                return
                '<a onclick="editJabatan('.$jabatan->id_jabatan.')" class="btn btn-primary btn-xs btn-flat"><i class="glyphicon glyphicon-edit btn-xs"></i></a> '.
                '<a onclick="hapusJabatan('.$jabatan->id_jabatan.')" class="btn btn-danger btn-xs btn-flat"><i class="glyphicon glyphicon-trash btn-xs"></i></a> ';
            })->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Jabatan::create($data);
        return view('admin/jabatan.index');
    }

    public function edit($id_jabatan)
    {
        $id_jabatan = Jabatan::find($id_jabatan);
        return $id_jabatan;
    }

    public function update(Request $request, $id_jabatan)
    {
        $jabatan = Jabatan::find($id_jabatan);
        $input = $request->all();
        $jabatan->fill($input)->save();
    }

    public function destroy($id_jabatan)
    {
        Jabatan::destroy($id_jabatan);
    }
}
