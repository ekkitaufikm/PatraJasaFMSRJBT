<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\PengajuanKetKerjaModel;
use App\Models\AreaModel;

class PengajuanKetkerjaController extends Controller
{
    // Untuk panggil view
    private $views      = 'landing/pengajuan/pengajuan_ketkerja';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'pengajuan_ketkerja';
    private $url1        = 'landing';
    
    // Title head
    private $title      = 'Halaman Pengajuan Keterangan Kerja';

    public function __construct()
    {
        $this->mPengajuanKetkerja   = new PengajuanKetKerjaModel();
        $this->mArea            = new AreaModel();

    }

    public function index()
    {
        //
    }

    public function create()
    {
        $pengajuan_ketkerja     = $this->mPengajuanKetkerja->get();
        $area                   = $this->mArea->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Pengajuan Keterangan Kerja',
            'pengajuan_ketkerja'    => $pengajuan_ketkerja,
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

        $tanggalGabung = $request->tanggal_gabung;  
        $tanggalGabungnew = date("d-m-Y", strtotime($tanggalGabung));
        
        $dataPengajuanKetKerja = [
            'nama'              => $request->nama,
            'nip'               => $request->nip,
            'idArea'            => $request->idArea,
            'tanggal_gabung'    => $tanggalGabungnew,
            'surat_tempat'      => $request->surat_tempat,
            'waktu_tanggal'     => $waktuTanggalnew,
            'status'            => 1
        ];

        // dd($dataUsers); die();
        $this->mPengajuanKetkerja->create($dataPengajuanKetKerja);

        return redirect("$this->url1")->with('sukses', 'Data Pengajuan Keterangan Kerja berhasil di tambahkan');
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
