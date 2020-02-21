<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pegawai;
use App\Jabatan;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
    	if (!empty(Session::get('login'))) {
            $data = DB::table('tb_pegawai')
                ->select('nipy','nm_pegawai','masa_kerja')
                ->groupBy('nipy')
                ->get();
            // dd($data);
            $jabatan = Jabatan::count();
            $total = Pegawai::count();
            // $jumlah = Pegawai::sum('masa_kerja');
            // $order = Orders::whereRaw('id = (select max(`id`) from orders)')->get();
            // dd($persen);
            return view('admin/dashboard',compact('data','jabatan','total','jumlah'));
        }
        else
        {
            return redirect()->route('login-admin');
        }
    }
}
