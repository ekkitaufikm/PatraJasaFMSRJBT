<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\LaporanMingguanModel;
use App\Models\UserModel;
use App\Models\AreaModel;

class LaporanMingguanController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/laporan_mingguan';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/laporan_mingguan';
    
    // Title head
    private $title      = 'Halaman Laporan Mingguan Supervisor';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mLaporanMingguan            = new LaporanMingguanModel();
        $this->mUsers            = new UserModel();
        $this->mArea           = new AreaModel();
    }

    public function index()
    {

        $laporan_mingguan = $this->mLaporanMingguan->get();
        $area             = $this->mArea->get();
        $users      = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'                 => $this->title,
            'url'                   => $this->url,
            'page'                  => 'Data Laporan Mingguan Supervisor',
            'laporan_mingguan'      => $laporan_mingguan,
            'area'                  => $area,
            'users'         => $users,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
        // echo json_encode($users); die;
    }

    public function create()
    {
        $area           = $this->mArea->get();
        $users      = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Laporan Mingguan Supervisor',
            'area'              => $area,
            'users'         => $users,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        if ($request->hasFile('laporanMingguan')) {
            $file       = $request->file('laporanMingguan');
            $fileName   = Str::uuid()."-".time().".".$file->extension();
            $file->move( "upload/excel/laporan_mingguan/", $fileName);
        }

        $dataLaporanMingguan = [
            'nama'          => $fileName,
            'idUsers'       => $request->idUsers,
            'idArea'        => $request->idArea,
        ];

        // dd($dataRkb); die();
        $this->mLaporanMingguan->create($dataLaporanMingguan);

        return redirect("$this->url")->with('sukses', 'Data Laporan Mingguan Supervisor berhasil di tambahkan');
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
