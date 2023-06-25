<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use PhpOffice\PhpWord\TemplateProcessor;

use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\KonselingModel;
use App\Models\JabatanModel;
use App\Models\AreaModel;
use App\Models\UserModel;

class KonselingController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/konseling';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/konseling';
    
    // Title head
    private $title      = 'Halaman Konseling';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mKonseling       = new KonselingModel();
        $this->mJabatan         = new JabatanModel();
        $this->mArea            = new AreaModel();
        $this->mUsers           = new UserModel();
    }

    public function index()
    {
        $konseling = $this->mKonseling->where('idUsers', session()->get('idUsers'))->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Konseling',
            'konseling'         => $konseling,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
    }

    public function create()
    {
        $konseling      = $this->mKonseling->where('idArea', session()->get('idArea'))->get();
        $area           = $this->mArea->get();
        $jabatan        = $this->mJabatan->get();
        
        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Konseling',
            'konseling'         => $konseling,
            'area'              => $area,
            'jabatan'           => $jabatan,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $waktuTanggal = $request->waktu_tanggal;  
        $waktuTanggalnew = date("d-m-Y", strtotime($waktuTanggal));

        $dataKonseling = [
            'surat_hari'        => $request->surat_hari,
            'waktu_tanggal'     => $waktuTanggalnew,
            'nama_pegawai'      => $request->nama_pegawai,
            'idJabatan'         => $request->jabatan_pegawai,
            'idArea'              => $request->idArea,
            'nama_konselor'     => $request->nama_konselor,
            'jabatan_konselor'  => $request->jabatan_konselor,
            'hasil_konseling'   => $request->hasil_konseling,
        ];

        // dd($dataUsers); die();
        $this->mKonseling->create($dataKonseling);

        return redirect("$this->url")->with('sukses', 'Data Konseling Karyawan berhasil di tambahkan');
    }

    public function show($id)
    {
        // Get Data
        $konseling     = $this->mKonseling->where('idKonseling', $id)->first();
        $area               = $this->mArea->get();
        $jabatan            = $this->mJabatan->get();
        
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Detail Data Konseling',
            'konseling'     => $konseling,
            'jabatan'       => $jabatan,
            'area'          => $area,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $konseling     = $this->mKonseling->where('idKonseling', $id)->first();
        
        $dataKonseling = [
            'surat_hari'        => $konseling->surat_hari,
            'waktu_tanggal'     => $konseling->waktu_tanggal,
            'nama_pegawai'      => $konseling->nama_pegawai,
            'jabatan_pegawai'   => $konseling->jabatan->nama,
            'area'              => $konseling->area->nama,
            'nama_konselor'     => $konseling->nama_konselor,
            'jabatan_konselor'  => $konseling->jabatan_konselor,
            'hasil_konseling'   => $konseling->hasil_konseling,
        ];
        // dd($dataPengajuanIzin); die();
        // pakai dari sini. sambil buka word coba.docx
        $templateProcessor = new TemplateProcessor('word-template/konseling.docx'); // load template word
        $templateProcessor->setValue('waktu_hari', $dataKonseling['surat_hari']); 
        $templateProcessor->setValue('waktu_tanggal', $dataKonseling['waktu_tanggal']);
        $templateProcessor->setValue('namaPegawai', $dataKonseling['nama_pegawai']);
        $templateProcessor->setValue('jabatanPegawai', $dataKonseling['jabatan_pegawai']);
        $templateProcessor->setValue('area', $dataKonseling['area']);
        $templateProcessor->setValue('hasilKonseling', $dataKonseling['hasil_konseling']);
        $templateProcessor->setValue('namaKonselor', $dataKonseling['nama_konselor']);
        $templateProcessor->setValue('jabatanKonselor', $dataKonseling['jabatan_konselor']);
        $fileName = 'Form Konseling'; // nama filenya
        

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
