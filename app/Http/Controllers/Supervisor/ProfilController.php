<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\UserModel;
use App\Models\JabatanModel;
use App\Models\KelaminModel;
use App\Models\AreaModel;
use App\Models\StatusModel;
use App\Models\RoleModel;
use App\Models\AgamaModel;

class ProfilController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/profil';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/profil';
    
    // Title head
    private $title      = 'Halaman Profil';

    public function __construct()
    {
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
        $users = $this->mUsers->where('idUsers', session()->get('idUsers'))->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Profile Saya',
            'users'         => $users,
        ];
        return view($this->views . "/index", $data);
        // echo json_encode($sekolah); die;
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
        $users = $this->mUsers->where('idUsers', $id)->first();
        $jenis_kelamin  = $this->mJenisKelamin->get();
        $jabatan        = $this->mJabatan->get();
        $area           = $this->mArea->get();
        $status         = $this->mStatus->get();
        $role           = $this->mRole->get();
        $agama          = $this->mAgama->get();
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Profile',
            'id'            => $id,
            'users'          => $users,
            'jabatan'           => $jabatan,
            'area'              => $area,
            'status'            => $status,
            'role'              => $role,
            'agama'             => $agama,
        ];
        return view($this->views . "/edit", $data);
        // echo json_encode($sekolah['logo']); die;
    }

    public function update(Request $request)
    {
        // Validasi
        // $validatedData = $request->validate([
        //     'username'  =>  ['required', 'min:3', 'max:255', 'unique:users'],
        // ]);
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
                'idArea'        => $request->idArea,
            ];
            $this->mUsers->where('idUsers', $request->idUsers)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Data Profile berhasil di edit');
            // echo json_encode($dataInfo); die;
        }else{
            $dataUsers = [
                'nama'          => $request->nama,
                'nip'           => $request->nip,
                'password'      => Hash::make($request->password),
                'sandi'         => $request->password,
                'idArea'        => $request->idArea,
            ];
            // dd($dataUsers);
            $this->mUsers->where('idUsers', $request->idUsers)->update($dataUsers);
            return redirect("$this->url")->with('sukses', 'Data Profile berhasil di edit');
            // echo json_encode($dataInfo); die;
        }
    }

    public function destroy($id)
    {
        //
    }
}
