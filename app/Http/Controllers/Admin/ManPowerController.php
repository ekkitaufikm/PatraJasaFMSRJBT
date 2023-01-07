<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\UsersManpowerModel;
use App\Models\UserModel;
use App\Models\JabatanModel;
use App\Models\KelaminModel;
use App\Models\AreaModel;
use App\Models\StatusModel;
use App\Models\RoleModel;
use App\Models\AgamaModel;

class ManPowerController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/manpower';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'admin/manpower';
    
    // Title head
    private $title      = 'Halaman Manpower';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mUsers            = new UserModel();
        $this->mManpower         = new UsersManpowerModel();
        $this->mJabatan          = new JabatanModel();
        $this->mJenisKelamin     = new KelaminModel();
        $this->mArea             = new AreaModel();
        $this->mStatus           = new StatusModel();
        $this->mRole             = new RoleModel();
        $this->mAgama            = new AgamaModel();
    }

    public function index()
    {
        $users      = $this->mUsers->where('role', 2)->get();

        $whereman = [
            // 'idUsers'   => $users['idUsers'],
            'role'      => 3,
            'status'    => 1,
        ]; 
        $manpower   = $this->mManpower->where($whereman)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Man Power',
            'manpower'      => $manpower,
            'users'         => $users,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
        // echo json_encode($users); die;
    }

    public function create()
    {
        $jenis_kelamin  = $this->mJenisKelamin->get();
        $jabatan        = $this->mJabatan->get();
        $area           = $this->mArea->get();
        $status         = $this->mStatus->get();
        $role           = $this->mRole->get();
        $agama          = $this->mAgama->get();
        $manpower       = $this->mManpower->get();
        $users          = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Tambah Data Man Power',
            'jenis_kelamin'     => $jenis_kelamin,
            'jabatan'           => $jabatan,
            'area'              => $area,
            'status'            => $status,
            'role'              => $role,
            'agama'             => $agama,
            'manpower'          => $manpower,
            'users'             => $users,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $file       = $request->file('photo');
            $fileName   = Str::uuid()."-".time().".".$file->extension();
            $file->move( "upload/foto/", $fileName);
        }

        $dataManpower = [
            'foto'          => $fileName,
            'idUsers'    => $request->idUsers,
            'nama'          => $request->nama,
            'nip'           => $request->nip,
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

        // dd($dataManpower); die();
        $this->mManpower->create($dataManpower);

        return redirect("$this->url")->with('sukses', 'Data Man Power berhasil di tambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
         // 
         $manpower       = $this->mManpower->where('id', $id)->first();
         $users          = $this->mUsers->get();
         $jenis_kelamin  = $this->mJenisKelamin->get();
         $jabatan        = $this->mJabatan->get();
         $area           = $this->mArea->get();
         $status         = $this->mStatus->get();
         $role           = $this->mRole->get();
         $agama          = $this->mAgama->get();

         $data = [
             'title'         => $this->title,
             'url'           => $this->url,
             'page'          => 'Edit Data Man Power',
             'id'            => $id,
             'manpower'      => $manpower,
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
            $dataManpower = [
                'foto'          => $fileName,
                'nama'          => $request->nama,
                'nip'           => $request->nip,
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
            $this->mManpower->where('id', $request->id)->update($dataManpower);
            return redirect("$this->url")->with('sukses', 'Data Man Power berhasil di edit');
            // echo json_encode($dataInfo); die;
        }else{
            $dataManpower = [
                'nama'          => $request->nama,
                'nip'           => $request->nip,
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
            // dd($dataManpower);
            $this->mManpower->where('id', $request->id)->update($dataManpower);
            return redirect("$this->url")->with('sukses', 'Data Man Power berhasil di edit');
            // echo json_encode($dataInfo); die;
        }
    }

    public function destroy($id)
    {
        //
    }
}
