<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Pegawai extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_pegawai';
    protected $fillable = ['nipy','nm_pegawai','masa_kerja','id_jabatan','tunj_hari_raya','tunj_yayasan','bonus','tunj_keahlian','lembur'];
    protected $primaryKey = 'nipy';
	public $timestamps = false;
}
