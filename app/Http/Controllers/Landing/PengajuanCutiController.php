<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\CutiModel;
use App\Models\AlasanCutiModel;
use App\Models\JabatanModel;
use App\Models\UserModel;
use App\Models\AreaModel;

class PengajuanCutiController extends Controller
{
    // Untuk panggil view
    private $views      = 'landing/pengajuan/pengajuan_cuti';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'pengajuan_cuti';
    private $url1        = 'landing';
    
    // Title head
    private $title      = 'Halaman Pengajuan Cuti';

    public function __construct()
    {
        $this->mCuti               = new CutiModel();
        $this->mAlasanCuti         = new AlasanCutiModel();
        $this->mJabatan            = new JabatanModel();
        $this->mUsers              = new UserModel();
        $this->mArea               = new AreaModel();

    }

    public function index()
    {
        //
    }

    public function create()
    {
        $cuti                = $this->mCuti->get();
        $jabatan             = $this->mJabatan->get();
        $alasan_cuti         = $this->mAlasanCuti->get();
        $area               = $this->mArea->get();
        $user1 = [
            'status'    => 1,
            'role'      => 2,
        ]; 
        $users          = $this->mUsers->where($user1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Input Data Cuti',
            'cuti'              => $cuti,
            'jabatan'           => $jabatan,
            'alasan_cuti'       => $alasan_cuti,
            'users'             => $users,
            'area'              => $area,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $dataPengajuanCuti = [
            'nama'              => $request->nama,
            'nip'               => $request->nip,
            'idArea'            => $request->idArea,
            'tanggal_cuti'      => $request->tanggal_cuti,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'idUsers'           => $request->idUsers,
            'rekan'             => $request->rekan,
            'idJabatan'         => $request->idJabatan,
            'idMCuti'           => $request->idMCuti,
            'keterangan'        => $request->keterangan,
        ];

        // dd($dataUsers); die();
        $this->mCuti->create($dataPengajuanCuti);

        return redirect("$this->url1")->with('sukses', 'Data Pengajuan Cuti berhasil di tambahkan');
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
