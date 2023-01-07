<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\RkbModel;
use App\Models\AreaModel;

class RkbController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/rkb';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/rkb';
    
    // Title head
    private $title      = 'Halaman Rencana Kerja Bulanan Supervisor';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mRkb            = new RkbModel();
        $this->mArea           = new AreaModel();
    }

    public function index()
    {

        $rkb    = $this->mRkb->get();
        $area   = $this->mArea->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Rencana Kerja Bulanan Supervisor',
            'rkb'           => $rkb,
            'area'          => $area,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
        // echo json_encode($users); die;
    }

    public function create()
    {
        $area           = $this->mArea->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Rencana Kerja Bulanan Supervisor',
            'area'              => $area,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        if ($request->hasFile('rkb')) {
            $file       = $request->file('rkb');
            $fileName   = Str::uuid()."-".time().".".$file->extension();
            $file->move( "upload/excel/rkb/", $fileName);
        }

        $dataRkb = [
            'nama'          => $fileName,
            'supervisor'    => $request->supervisor,
            'idArea'        => $request->idArea,
        ];

        // dd($dataRkb); die();
        $this->mRkb->create($dataRkb);

        return redirect("$this->url")->with('sukses', 'Data Rencana Kerja Bulanan Supervisor berhasil di tambahkan');
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
