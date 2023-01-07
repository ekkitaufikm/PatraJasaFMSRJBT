<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\PengajuanLemburModel;
use App\Models\JabatanModel;
use App\Models\AreaModel;

class PengajuanLemburController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/pengajuan/pengajuan_lembur';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/pengajuan_lembur';
    
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
        $pengajuan_lembur = $this->mPengajuanLembur->where('idUsers', session()->get('idUsers'))->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Lembur Karyawan',
            'pengajuan_lembur'  => $pengajuan_lembur,
        ];
        // View
        return view($this->views . "/index", $data);
        // echo "hood";
        // dd(session()->all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $surat_waktu = $request->surat_waktu;  
        $suratWaktunew = date("d-m-Y", strtotime($surat_waktu));
        
        $dataPengajuanLembur = [
            'namaPegawai'       => $request->nama,
            'nip'               => $request->nip,
            'idArea'            => $request->idArea,
            'idJabatan'         => $request->idJabatan,
            'surat_tempat'      => $request->surat_tempat,
            'waktu_tanggal'     => $request->waktu_tanggal,
            'waktu_dari'        => $request->waktu_dari,
            'waktu_sampai'      => $request->waktu_sampai,
            'namaPekerjaan'     => $request->namaPekerjaan,
        ];

        // dd($dataUsers); die();
        $this->mPengajuanLembur->create($dataPengajuanLembur);

        return redirect("$this->url1")->with('sukses', 'Data Pengajuan Lembur berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
        $pengajuan_lembur     = $this->mPengajuanLembur->where('idPLembur', $id)->first();
        $area               = $this->mArea->get();
        $jabatan            = $this->mJabatan->get();
        
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Lembur Karyawan',
            'pengajuan_lembur'    => $pengajuan_lembur,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pengajuan_lembur     = $this->mPengajuanLembur->where('idPLembur', $id)->first();
        
        $dataPengajuanLembur = [
            'namaPegawai'       => $pengajuan_lembur->namaPegawai,
            'nip'               => $pengajuan_lembur->nip,
            'area'              => $pengajuan_lembur->area->nama,
            'jabatan'           => $pengajuan_lembur->jabatan->nama,
            'surat_tempat'      => $pengajuan_lembur->surat_tempat,
            'waktu_tanggal'     => $pengajuan_lembur->waktu_tanggal,
            'waktu_dari'        => $pengajuan_lembur->waktu_dari,
            'waktu_sampai'      => $pengajuan_lembur->waktu_sampai,
            'namaPekerjaan'     => $pengajuan_lembur->namaPekerjaan,
        ];
        // dd($dataPengajuanIzin); die();
        // pakai dari sini. sambil buka word coba.docx
        $templateProcessor = new TemplateProcessor('word-template/surat_perintah_lembur.docx'); // load template word
        $templateProcessor->setValue('namaPegawai', $dataPengajuanLembur['namaPegawai']); 
        $templateProcessor->setValue('nopeg', $dataPengajuanLembur['nip']);
        $templateProcessor->setValue('jabatan', $dataPengajuanLembur['jabatan']);
        $templateProcessor->setValue('area', $dataPengajuanLembur['area']); 
        $templateProcessor->setValue('surat_tempat', $dataPengajuanLembur['surat_tempat']); 
        $templateProcessor->setValue('waktu_tanggal', $dataPengajuanLembur['waktu_tanggal']); 
        $templateProcessor->setValue('waktu_dari', $dataPengajuanLembur['waktu_dari']); 
        $templateProcessor->setValue('waktu_sampai', $dataPengajuanLembur['waktu_sampai']);
        $templateProcessor->setValue('namaPekerjaan', $dataPengajuanLembur['namaPekerjaan']);
        $fileName = 'SURAT PERINTAH KERJA LEMBUR'; // nama filenya
        

        // // biar bisa dunlud
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
        // dd($dataTartib);
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
