<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\UserModel;
use App\Models\InventoriModel;
use App\Models\AreaModel;

class InventoriController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/inventori';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/inventori';
    
    // Title head
    private $title      = 'Halaman Inventori Supervisor';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mInventori       = new InventoriModel();
        $this->mUsers            = new UserModel();
        $this->mArea            = new AreaModel();
    }

    public function index()
    {

        $inventori = $this->mInventori->where('idUsers', session()->get('idUsers'))->get();
        $area           = $this->mArea->get();
        $users      = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'          => $this->title,
            'url'            => $this->url,
            'page'           => 'Data Inventori Supervisor',
            'inventori'      => $inventori,
            'area'           => $area,
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
            'page'              => 'Tambah Data Inventori Supervisor',
            'area'              => $area,
            'users'         => $users,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        if ($request->hasFile('inventori')) {
            $file       = $request->file('inventori');
            $fileName   = Str::uuid()."-".time().".".$file->extension();
            $file->move( "upload/excel/inventori/", $fileName);
        }

        $dataInventori = [
            'nama'          => $fileName,
            'idUsers'       => $request->idUsers,
            'idArea'        => $request->idArea,
        ];

        // dd($dataRkb); die();
        $this->mInventori->create($dataInventori);

        return redirect("$this->url")->with('sukses', 'Data Inventori Supervisor berhasil di tambahkan');
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
