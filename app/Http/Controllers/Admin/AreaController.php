<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\AreaModel;
use App\Models\UserModel;

class AreaController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/area';
    
    // 
    private $url        = 'admin/area';
    
    // Title head
    private $title      = 'Halaman Data Jenis Area';


    public function __construct()
    {
        // Di isi Construct
        $this->mArea         = new AreaModel();
        $this->mUsers            = new UserModel();
    }
    
    public function index()
    {
        $area = $this->mArea->get();
        $users      = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'       => $this->title,
            'url'         => $this->url,
            'page'        => 'Data Area',
            'area'        => $area,
            'users'       => $users,
        ];
        // View
        return view($this->views . "/index", $data);
        // echo "hood";
        // dd(session()->all());
    }

    public function create()
    {
        $users          = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Area',
            'users'             => $users,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $dataArea = [
            'idUsers'       => $request->idUsers,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
        ];
        $this->mArea->create($dataArea);

        return redirect("$this->url")->with('sukses', 'Data Area berhasil di tambahkan');
    }

    public function show($id)
    {
        // 
        
    }

    public function edit($id)
    {
        // Get Data
        $area      = $this->mArea->where('idArea', $id)->first();
        $users          = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Area',
            'id'            => $id,
            'area'          => $area,
            'users'         => $users,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $dataArea = [
            'idUsers'       => $request->idUsers,
            'nama'          => $request->nama,
            'alamat'        => $request->alamat,
        ];
        $this->mArea->where('idArea', $request->idArea)->update($dataArea);

        // Response
        return redirect("$this->url")->with('sukses', 'Data Area berhasil di edit');
        // dd($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
