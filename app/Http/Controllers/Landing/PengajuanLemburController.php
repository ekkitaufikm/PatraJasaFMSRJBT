<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\PengajuanLemburModel;
use App\Models\JabatanModel;
use App\Models\AreaModel;

class PengajuanLemburController extends Controller
{
    // Untuk panggil view
    private $views      = 'landing/pengajuan/pengajuan_lembur';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'pengajuan_lembur';
    private $url1        = 'landing';
    
    // Title head
    private $title      = 'Halaman Pengajuan Lembur';

    public function __construct()
    {
        $this->mPengajuanLembur     = new PengajuanLemburModel();
        $this->mJabatan             = new JabatanModel();
        $this->mArea                = new AreaModel();

    }

    public function index()
    {
        //
    }

    public function create()
    {
        $pengajuan_lembur       = $this->mPengajuanLembur->get();
        $jabatan                = $this->mJabatan->get();
        $area                   = $this->mArea->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Pengajuan Lembur',
            'pengajuan_lembur'      => $pengajuan_lembur,
            'jabatan'               => $jabatan,
            'area'                  => $area,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $waktuTanggal = $request->waktu_tanggal;  
        $waktuTanggalnew = date("d-m-Y", strtotime($waktuTanggal));
        
        $dataPengajuanLembur = [
            'namaPegawai'       => $request->nama,
            'nip'               => $request->nip,
            'idArea'            => $request->idArea,
            'idJabatan'         => $request->idJabatan,
            'surat_tempat'      => $request->surat_tempat,
            'waktu_tanggal'     => $waktuTanggalnew,
            'waktu_dari'        => $request->waktu_dari,
            'waktu_sampai'      => $request->waktu_sampai,
            'namaPekerjaan'     => $request->namaPekerjaan,
            'status'            => 1,
        ];

        // dd($dataUsers); die();
        $this->mPengajuanLembur->create($dataPengajuanLembur);

        return redirect("$this->url/thanks")->with('sukses', 'Data Pengajuan Lembur berhasil di tambahkan');
    }
    
    public function thanks()
    {
        // Get Data

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Input Data Lembur Telah Berhasil',
        ];
        return view($this->views . "/thanks", $data);
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
