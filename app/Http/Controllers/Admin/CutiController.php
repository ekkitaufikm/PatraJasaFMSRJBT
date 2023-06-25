<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\CutiModel;
use App\Models\AlasanCutiModel;
use App\Models\JabatanModel;
use App\Models\UserModel;
use App\Models\AreaModel;

class CutiController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/pengajuan/pengajuan_cuti';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/pengajuan_cuti';
    
    // Title head
    private $title      = 'Halaman Data Cuti Karyawan';

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
        $cuti = $this->mCuti->get();

        $data = [
            'title'    => $this->title,
            'url'      => $this->url,
            'page'     => 'Data Cuti Karyawan',
            'cuti'     => $cuti,
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
        $cuti                = $this->mCuti->where('idCuti', $id)->first();
        $jabatan             = $this->mJabatan->get();
        $alasan_cuti         = $this->mAlasanCuti->get();
        $area               = $this->mArea->get();
        $user1 = [
            'status' => 1,
            'role' => 2,
        ]; 
        $users          = $this->mUsers->where($user1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Cuti',
            'cuti'              => $cuti,
            'jabatan'           => $jabatan,
            'users'             => $users,
            'alasan_cuti'       => $alasan_cuti,
            'area'              => $area,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $cuti                = $this->mCuti->where('idCuti', $id)->first();
        $jabatan             = $this->mJabatan->get();
        $alasan_cuti         = $this->mAlasanCuti->get();
        $area               = $this->mArea->get();
        $user1 = [
            'status' => 1,
            'role' => 2,
        ]; 
        $users          = $this->mUsers->where($user1)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Cuti',
            'cuti'              => $cuti,
            'jabatan'           => $jabatan,
            'users'             => $users,
            'area'              => $area,
        ];
        return view($this->views . "/edit", $data);
        // echo "hood";
    }

    public function update(Request $request, $id)
    {
        $surat_waktu = $request->surat_waktu;  
        $suratWaktunew = date("d-m-Y", strtotime($surat_waktu));

        if($request->status == 2 OR $request->status == 3 OR $request->status == 4){
            $dataPengajuanCuti = [
                'status'        => $request->status,
            ];
            // echo json_encode($dataPengajuanCuti); die();
            $this->mCuti->where('idCuti', $id)->update($dataPengajuanCuti);
            return redirect("$this->url")->with('sukses', 'Data Cuti berhasil diberi Tindakan');
        }else{
            $dataPengajuanCuti = [
                'nama'              => $request->nama,
                'nip'               => $request->nip,
                'idArea'            => $request->idArea,
                'tanggal_cuti'      => $request->tanggal_cuti,
                'tanggal_pengajuan' => $request->tanggal_pengajuan,
                'idUsers'           => $request->idUsers,
                'rekan'             => $request->rekan,
                'idJabatan'         => $request->idJabatan,
                'keterangan'        => $request->keterangan,
                'status'            => 1,
            ];

            // echo json_encode($dataPengajuanCuti); die();
            $this->mCuti->where('idCuti', $id)->update($dataPengajuanCuti);
            return redirect("$this->url")->with('sukses', 'Data Cuti berhasil di edit');
        }
       
        // dd($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
