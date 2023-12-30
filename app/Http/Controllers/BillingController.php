<?php

namespace App\Http\Controllers;

use App\Models\Webhost;
use App\Models\CsMainProject;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $csMainProjectData = CsMainProject::join('tb_webhost', 'tb_cs_main_project.id_webhost', '=', 'tb_webhost.id_webhost')
        ->join('tb_paket', 'tb_webhost.id_paket', '=', 'tb_paket.id_paket')
        ->select(
            'tb_cs_main_project.id',
            'tb_cs_main_project.jenis',
            'tb_webhost.nama_web',
            'tb_webhost.id_paket',
            'tb_paket.paket AS nama_paket', 
            'tb_cs_main_project.deskripsi',
            'tb_cs_main_project.trf',
            'tb_cs_main_project.tgl_masuk',
            'tb_cs_main_project.tgl_deadline',
            'tb_cs_main_project.biaya',
            'tb_cs_main_project.dibayar',
            'tb_webhost.hp',
            'tb_webhost.telegram',
            'tb_webhost.hpads',
            'tb_webhost.wa',
            'tb_webhost.email',
            'tb_webhost.saldo',
            'tb_cs_main_project.dikerjakan_oleh',
            'tb_cs_main_project.tanda'
        )
        ->paginate(50);

        return view('billing.index', ['csMainProjectData' => $csMainProjectData]);
    }
    
}
