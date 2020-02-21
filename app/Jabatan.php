<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Jabatan extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_jabatan';
    protected $fillable = ['nm_jabatan','gaji_pokok','tunj_jabatan','tunj_ms_kerja','uang_makan','tunj_akomodasi','tunj_pulsa','tunj_bbm','tunj_hr_raya_cuti','tunj_yayasan','bonus','potongan'];
    protected $primaryKey = 'id_jabatan';
	public $timestamps = false;
}
