<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\PengajuanKetKerjaModel;
use App\Models\AreaModel;

class PengajuanKetkerjaController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/pengajuan/pengajuan_ketkerja';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/pengajuan_ketkerja';
    
    // Title head
    private $title      = 'Halaman Pengajuan Keterangan Kerja';

    public function __construct()
    {
        $this->mPengajuanKetkerja   = new PengajuanKetKerjaModel();
        $this->mArea                = new AreaModel();

    }

    public function index()
    {
        $pengajuan_ketkerja = $this->mPengajuanKetkerja->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Data Surat Keterangan Kerja Karyawan',
            'pengajuan_ketkerja'    => $pengajuan_ketkerja,
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
        $pengajuan_ketkerja     = $this->mPengajuanKetkerja->where('idPKetkerja', $request->id)->first();
        
        $dataPengajuanKetKerja = [
            'nama'              => $pengajuan_ketkerja->nama,
            'nip'               => $pengajuan_ketkerja->nip,
            'area'              => $pengajuan_ketkerja->area->nama,
            'no_surat'          => $pengajuan_ketkerja->no_surat,
            'tanggal_gabung'    => $pengajuan_ketkerja->tanggal_gabung,
            'surat_tempat'      => $pengajuan_ketkerja->surat_tempat,
            'waktu_tanggal'     => $pengajuan_ketkerja->waktu_tanggal,
        ];
        // dd($dataPengajuanIzin); die();
        // pakai dari sini. sambil buka word coba.docx
        $templateProcessor = new TemplateProcessor('word-template/surat_keterangan_kerja.docx'); // load template word
        $templateProcessor->setValue('namaPegawai', $dataPengajuanKetKerja['nama']); 
        $templateProcessor->setValue('nopeg', $dataPengajuanKetKerja['nip']);
        $templateProcessor->setValue('no_surat', $dataPengajuanKetKerja['no_surat']);
        $templateProcessor->setValue('unitKerja', $dataPengajuanKetKerja['area']); 
        $templateProcessor->setValue('tanggalGabung', $dataPengajuanKetKerja['tanggal_gabung']);
        $templateProcessor->setValue('surat_tempat', $dataPengajuanKetKerja['surat_tempat']);
        $templateProcessor->setValue('waktu_tanggal', $dataPengajuanKetKerja['waktu_tanggal']);
        $fileName = 'SURAT KETERANGAN KERJA'; // nama filenya
        

        // // biar bisa dunlud
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
        // dd($dataTartib);
    }

    public function show($id)
    {
        // Get Data
        $pengajuan_ketkerja     = $this->mPengajuanKetkerja->where('idPKetkerja', $id)->first();
        $area                   = $this->mArea->get();
        
        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Detail Data Keterangan Kerja Karyawan',
            'pengajuan_ketkerja'    => $pengajuan_ketkerja,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $pengajuan_ketkerja = $this->mPengajuanKetkerja->where('idPKetkerja', $id)->first();
        $area               = $this->mArea->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Verifikasi Pengajuan Keterangan Kerja',
            'pengajuan_ketkerja'    => $pengajuan_ketkerja,
            'area'                  => $area,
        ];
        return view($this->views . "/edit", $data);
        // echo "hood";
    }

    public function update(Request $request, $id)
    {
        $surat_waktu = $request->surat_waktu;  
        $suratWaktunew = date("d-m-Y", strtotime($surat_waktu));

        if($request->status == 2 OR $request->status == 3){
            $dataPengajuanKetKerja = [
                'no_surat'      => $request->no_surat,
                'status'        => $request->status,
            ];
            // echo json_encode($dataPengajuanLembur); die();
            $this->mPengajuanKetkerja->where('idPKetkerja', $id)->update($dataPengajuanKetKerja);
            return redirect("$this->url")->with('sukses', 'Data Pengajuan Keterangan Kerja berhasil di verifikasi');
        }else{
            $dataPengajuanKetKerja = [
                'nama'              => $request->nama,
                'nip'               => $request->nip,
                'idArea'              => $request->idArea,
                'no_surat'          => $request->no_surat,
                'tanggal_gabung'    => $request->tanggal_gabung,
                'surat_tempat'      => $request->surat_tempat,
                'waktu_tanggal'     => $request->waktu_tanggal,
                'status'            => 1,
            ];

            // echo json_encode($dataKetkerja); die();
            $this->mPengajuanKetkerja->where('idPKetkerja', $id)->update($dataPengajuanKetKerja);
            return redirect("$this->url")->with('sukses', 'Data Pengajuan Keterangan Kerja berhasil di edit');
        }
       
        // dd($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
