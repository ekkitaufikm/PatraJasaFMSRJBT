<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\MemoModel;

class MemoController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/memo';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/memo';
    
    // Title head
    private $title      = 'Halaman Memo';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mMemo            = new MemoModel();
    }

    public function index()
    {

        $memo = $this->mMemo->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Memo',
            'memo'          => $memo,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Memo',
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $waktuTanggal = $request->waktu_tanggal;  
        $waktuTanggalnew = date("d-m-Y", strtotime($waktuTanggal));

        $dataMemo = [
            'surat_tempat'     => $request->surat_tempat,
            'waktu_tanggal'    => $waktuTanggalnew,
            'no_surat'         => $request->no_surat,
            'perihal'         => $request->perihal,
        ];

        // dd($dataUsers); die();
        $this->mMemo->create($dataMemo);

        return redirect("$this->url")->with('sukses', 'Data Memo berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
        $memo     = $this->mMemo->where('idMemo', $id)->first();
        
        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Detail Data Memo',
            'memo'      => $memo,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $memo     = $this->mMemo->where('idMemo', $id)->first();
        
        $dataMemo = [
            'surat_tempat'     => $memo->surat_tempat,
            'waktu_tanggal'    => $memo->waktu_tanggal,
            'no_surat'         => $memo->no_surat,
            'perihal'          => $memo->perihal,
        ];
        // dd($dataPengajuanIzin); die();
        // pakai dari sini. sambil buka word coba.docx
        $templateProcessor = new TemplateProcessor('word-template/memo.docx'); // load template word
        $templateProcessor->setValue('surat_tempat', $dataMemo['surat_tempat']); 
        $templateProcessor->setValue('waktu_tanggal', $dataMemo['waktu_tanggal']);
        $templateProcessor->setValue('no_surat', $dataMemo['no_surat']);
        $templateProcessor->setValue('perihal', $dataMemo['perihal']);
        $fileName = 'Memo'; // nama filenya
        

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
