<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;

use App\Models\UserModel;
use App\Models\JabatanModel;
use App\Models\KelaminModel;
use App\Models\AreaModel;
use App\Models\StatusModel;
use App\Models\RoleModel;
use App\Models\AgamaModel;

class PensiunController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/pensiun';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/pensiun';
    
    // Title head
    private $title      = 'Halaman Data Karyawan Pensiun';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mUsers            = new UserModel();
        $this->mJabatan          = new JabatanModel();
        $this->mJenisKelamin     = new KelaminModel();
        $this->mArea             = new AreaModel();
        $this->mStatus           = new StatusModel();
        $this->mRole             = new RoleModel();
        $this->mAgama            = new AgamaModel();
    }

    public function index()
    {

        $users = $this->mUsers->where('status', 3)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Karyawan Pensiun',
            'users'          => $users,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
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
        //
    }

    public function edit($id)
    {
        // 
        $users          = $this->mUsers->where('idUsers', $id)->first();
        $jenis_kelamin  = $this->mJenisKelamin->get();
        $jabatan        = $this->mJabatan->get();
        $area           = $this->mArea->get();
        $status         = $this->mStatus->get();
        $role           = $this->mRole->get();
        $agama          = $this->mAgama->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Pensiun',
            'id'            => $id,
            'users'         => $users,
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan'       => $jabatan,
            'area'          => $area,
            'status'        => $status,
            'role'          => $role,
            'agama'         => $agama,
        ];
        return view($this->views . "/edit", $data);
        // echo json_encode($sekolah['logo']); die;
    }

    public function update(Request $request)
    {
        if (isset($request->photo)) {
            if ($request->hasFile('photo')) {
                $file       = $request->file('photo');
                $fileName   = Str::uuid()."-".time().".".$file->extension();
                // $file->move(public_path(). "/upload/logo_sekolah/", $fileName);
                $file->move( "upload/foto/", $fileName);
            }
            $dataUsers = [
                'foto'          => $fileName,
                'nama'          => $request->nama,
                'nip'           => $request->nip,
                'password'      => Hash::make($request->password),
                'sandi'         => $request->password,
                'idAgama'       => $request->idAgama,
                'no_ktp'        => $request->no_ktp,
                'no_bpjskes'    => $request->no_bpjskes,
                'no_bpjsket'    => $request->no_bpjsket,
                'idKelamin'     => $request->idKelamin,
                'idJabatan'     => $request->idJabatan,
                'idArea'        => $request->idArea,
                'alamat'        => $request->alamat,
                'nohp'          => $request->nohp,
                'uk_baju'       => $request->uk_baju,
                'uk_celana'     => $request->uk_celana,
                'uk_sepatu'     => $request->uk_sepatu,
                'status'        => $request->idStatus,
                'role'          => $request->idRole,
            ];
            $this->mUsers->where('idUsers', $request->idUsers)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Data Pensiun berhasil di edit');
            // echo json_encode($dataInfo); die;
        
        }else{
            $dataUsers = [
                'nama'          => $request->nama,
                'nip'           => $request->nip,
                'password'      => Hash::make($request->password),
                'sandi'         => $request->password,
                'idAgama'       => $request->idAgama,
                'no_ktp'        => $request->no_ktp,
                'no_bpjskes'    => $request->no_bpjskes,
                'no_bpjsket'    => $request->no_bpjsket,
                'idKelamin'     => $request->idKelamin,
                'idJabatan'     => $request->idJabatan,
                'idArea'        => $request->idArea,
                'alamat'        => $request->alamat,
                'nohp'          => $request->nohp,
                'uk_baju'       => $request->uk_baju,
                'uk_celana'     => $request->uk_celana,
                'uk_sepatu'     => $request->uk_sepatu,
                'status'        => $request->idStatus,
                'role'          => $request->idRole,
            ];
            // dd($dataUsers);
            $this->mUsers->where('idUsers', $request->idUsers)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Data Pensiun berhasil di edit');
            // echo json_encode($dataInfo); die;
        }
    }

    public function destroy($id)
    {
        //
    }
}
