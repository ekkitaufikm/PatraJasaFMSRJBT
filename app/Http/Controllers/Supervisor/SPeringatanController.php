<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\SPeringatanModel;
use App\Models\JabatanModel;
use App\Models\AreaModel;
use App\Models\UserModel;
use App\Models\MPeringatanModel;

class SPeringatanController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/speringatan';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/surat_peringatan';
    
    // Title head
    private $title      = 'Halaman Surat Peringatan';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mSPeringatan     = new SPeringatanModel();
        $this->mJabatan         = new JabatanModel();
        $this->mArea            = new AreaModel();
        $this->mUsers           = new UserModel();
        $this->mPeringatan      = new MPeringatanModel();
    }

    public function index()
    {
        $surat_peringatan = $this->mSPeringatan->where('idUsers', session()->get('idUsers'))->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Data Surat Peringatan',
            'surat_peringatan'      => $surat_peringatan,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $surat_peringatan = $this->mSPeringatan->where('idUsers', session()->get('idUsers'))->get();
        $area                   = $this->mArea->get();
        $jabatan                = $this->mJabatan->get();
        $peringatan             = $this->mPeringatan->get();
        
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Surat Peringatan',
            'surat_peringatan'  => $surat_peringatan,
            'area'              => $area,
            'jabatan'           => $jabatan,
            'peringatan'        => $peringatan,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $waktuTanggal = $request->waktu_tanggal;  
        $waktuTanggalnew = date("d-m-Y", strtotime($waktuTanggal));

        $dataSPeringatan = [
            'surat_tempat'      => $request->surat_tempat,
            'waktu_tanggal'     => $waktuTanggalnew,
            'nama'              => $request->nama,
            'nip'               => $request->nip,
            'idJabatan'         => $request->idJabatan,
            'idArea'            => $request->idArea,
            'idPeringatan'      => $request->idPeringatan,
            'pelanggaran1'      => $request->pelanggaran1,
            'pelanggaran2'      => $request->pelanggaran2,
            'pelanggaran3'      => $request->pelanggaran3,
            'pelanggaran4'      => $request->pelanggaran4,
            'pelanggaran5'      => $request->pelanggaran5,
            'janji1'            => $request->janji1,
            'janji2'            => $request->janji2,
            'janji3'            => $request->janji3,
        ];

        // dd($dataUsers); die();
        $this->mSPeringatan->create($dataSPeringatan);

        return redirect("$this->url")->with('sukses', 'Data Surat Peringatan berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
        $surat_peringatan   = $this->mSPeringatan->where('idSPeringatan', $id)->first();
        $area               = $this->mArea->get();
        $jabatan            = $this->mJabatan->get();
        $peringatan         = $this->mPeringatan->get();
        
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Surat Peringatan',
            'surat_peringatan'  => $surat_peringatan,
            'jabatan'           => $jabatan,
            'area'              => $area,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $surat_peringatan   = $this->mSPeringatan->where('idSPeringatan', $id)->first();
        
        $dataSPeringatan = [
            'surat_tempat'      => $surat_peringatan->surat_tempat,
            'waktu_tanggal'     => $surat_peringatan->waktu_tanggal,
            'nama'              => $surat_peringatan->nama,
            'nip'               => $surat_peringatan->nip,
            'jabatan'           => $surat_peringatan->jabatan->nama,
            'area'              => $surat_peringatan->area->nama,
            'peringatan'        => $surat_peringatan->peringatan->nama,
            'pelanggaran1'      => $surat_peringatan->pelanggaran1,
            'pelanggaran2'      => $surat_peringatan->pelanggaran2,
            'pelanggaran3'      => $surat_peringatan->pelanggaran3,
            'pelanggaran4'      => $surat_peringatan->pelanggaran4,
            'pelanggaran5'      => $surat_peringatan->pelanggaran5,
            'janji1'            => $surat_peringatan->janji1,
            'janji2'            => $surat_peringatan->janji2,
            'janji3'            => $surat_peringatan->janji3,
        ];
        // dd($dataPengajuanIzin); die();
        // pakai dari sini. sambil buka word coba.docx
        $templateProcessor = new TemplateProcessor('word-template/surat_peringatan.docx'); // load template word
        $templateProcessor->setValue('surat_tempat', $dataSPeringatan['surat_tempat']); 
        $templateProcessor->setValue('waktu_tanggal', $dataSPeringatan['waktu_tanggal']);
        $templateProcessor->setValue('namaPegawai', $dataSPeringatan['nama']);
        $templateProcessor->setValue('nipPegawai', $dataSPeringatan['nip']);
        $templateProcessor->setValue('jabatanPegawai', $dataSPeringatan['jabatan']);
        $templateProcessor->setValue('areaPegawai', $dataSPeringatan['area']);
        $templateProcessor->setValue('pelanggaran1', $dataSPeringatan['pelanggaran1']);
        $templateProcessor->setValue('pelanggaran2', $dataSPeringatan['pelanggaran2']);
        $templateProcessor->setValue('pelanggaran3', $dataSPeringatan['pelanggaran3']);
        $templateProcessor->setValue('pelanggaran4', $dataSPeringatan['pelanggaran4']);
        $templateProcessor->setValue('pelanggaran5', $dataSPeringatan['pelanggaran5']);
        $templateProcessor->setValue('janji1', $dataSPeringatan['janji1']);
        $templateProcessor->setValue('janji2', $dataSPeringatan['janji2']);
        $templateProcessor->setValue('janji3', $dataSPeringatan['janji3']);
        $fileName = 'Surat Peringatan'; // nama filenya
        

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
