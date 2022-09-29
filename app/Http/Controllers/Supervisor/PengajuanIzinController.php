<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\PIzinModel;
use App\Models\JabatanModel;
use App\Models\AreaModel;

class PengajuanIzinController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/pengajuan/pengajuan_izin';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/pengajuan_izin';
    
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
        $pengajuan_izin = $this->mPengajuanIzin->where('idUsers', session()->get('idUsers'))->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Izin Keluar Masuk Karyawan',
            'pengajuan_izin'    => $pengajuan_izin,
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
        //
    }

    public function show($id)
    {
        // Get Data
        $pengajuan_izin     = $this->mPengajuanIzin->where('idPIzin', $id)->first();
        $area               = $this->mArea->get();
        $jabatan            = $this->mJabatan->get();
        
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Izin Keluar Masuk Karyawan',
            'pengajuan_izin'    => $pengajuan_izin,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pengajuan_izin     = $this->mPengajuanIzin->where('idPIzin', $id)->first();
        
        $dataPengajuanIzin = [
            'nama'              => $pengajuan_izin->nama,
            'nip'               => $pengajuan_izin->nip,
            'area'              => $pengajuan_izin->area->nama,
            'jabatan'           => $pengajuan_izin->jabatan->nama,
            'isian_alasan'      => $pengajuan_izin->isian_alasan,
            'isian_keluar'      => $pengajuan_izin->isian_keluar,
            'isian_masuk'       => $pengajuan_izin->isian_masuk,
            'surat_tempat'      => $pengajuan_izin->surat_tempat,
            'surat_waktu'       => $pengajuan_izin->surat_waktu,
        ];
        // dd($dataPengajuanIzin); die();
        // pakai dari sini. sambil buka word coba.docx
        $templateProcessor = new TemplateProcessor('word-template/surat_izin_keluar_lokasi_kerja.docx'); // load template word
        $templateProcessor->setValue('namaPegawai', $dataPengajuanIzin['nama']); 
        $templateProcessor->setValue('nipPegawai', $dataPengajuanIzin['nip']);
        $templateProcessor->setValue('jabatanPegawai', $dataPengajuanIzin['jabatan']);
        $templateProcessor->setValue('areaPegawai', $dataPengajuanIzin['area']); 
        $templateProcessor->setValue('isian_maksud', $dataPengajuanIzin['isian_alasan']); 
        $templateProcessor->setValue('isian_keluar', $dataPengajuanIzin['isian_keluar']); 
        $templateProcessor->setValue('isian_masuk', $dataPengajuanIzin['isian_masuk']); 
        $templateProcessor->setValue('surat_tempat', $dataPengajuanIzin['surat_tempat']);
        $templateProcessor->setValue('surat_waktu', $dataPengajuanIzin['surat_waktu']);
        $fileName = 'Surat Izin Keluar Lokasi Kerja'; // nama filenya
        

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
