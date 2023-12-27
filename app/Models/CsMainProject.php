<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsMainProject extends Model
{
    protected $table = 'tb_cs_main_project';

    protected $fillable = [
        'id_webhost',
        'jenis',
        'deskripsi',
        'trf',
        'tgl_masuk',
        'tgl_deadline',
        'biaya',
        'dibayar',
        'status',
        'status_pm',
        'lunas',
        'dikerjakan_oleh',
        'tanda',
    ];
}
