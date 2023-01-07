<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\PIzinModel;
use App\Models\JabatanModel;
use App\Models\AreaModel;

class PengajuanIzinController extends Controller
{
    // Untuk panggil view
    private $views      = 'landing/pengajuan/pengajuan_izin';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'pengajuan_izin';
    private $url1        = 'landing';
    
    // Title head
    private $title      = 'Halaman Pengajuan Izin';

    public function __construct()
    {
        $this->mPengajuanIzin   = new PIzinModel();
        $this->mJabatan         = new JabatanModel();
        $this->mArea            = new AreaModel();

    }

    public function index()
    {
        //
    }

    public function create()
    {
        $pengajuan_izin     = $this->mPengajuanIzin->get();
        $jabatan            = $this->mJabatan->get();
        $area               = $this->mArea->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Pengajuan Izin Keluar masuk',
            'pengajuan_izin'    => $pengajuan_izin,
            'jabatan'           => $jabatan,
            'area'              => $area,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $surat_waktu = $request->surat_waktu;  
        $suratWaktunew = date("d-m-Y", strtotime($surat_waktu));
        
        $dataPengajuanIzin = [
            'nama'              => $request->nama,
            'nip'               => $request->nip,
            'idArea'            => $request->idArea,
            'idJabatan'         => $request->idJabatan,
            'isian_alasan'      => $request->isian_alasan,
            'isian_keluar'      => $request->isian_keluar,
            'isian_masuk'       => $request->isian_masuk,
            'surat_tempat'      => $request->surat_tempat,
            'surat_waktu'       => $suratWaktunew,
        ];

        // dd($dataUsers); die();
        $this->mPengajuanIzin->create($dataPengajuanIzin);

        return redirect("$this->url1")->with('sukses', 'Data Pengajuan Izin Keluar Masuk berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
