<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\UserModel;
use App\Models\ChecklistModel;
use App\Models\AreaModel;

class ChecklistController extends Controller
{
    // Untuk panggil view
    private $views      = 'landing/checklist';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'checklist';
    private $url1       = 'landing';
    
    // Title head
    private $title      = 'Halaman Checklist Kebersihan';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mUsers            = new UserModel();
        $this->mChecklist        = new ChecklistModel();
        $this->mArea             = new AreaModel();
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $wherespv = [
            'role'      => 2,
            'status'    => 1,
        ]; 
        $users      = $this->mUsers->where($wherespv)->get();
        $checklist  = $this->mChecklist->get();
        $area       = $this->mArea->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Input Checklist Kebersihan',
            'users'         => $users,
            'checklist'     => $checklist,
            'area'          => $area,
        ];

        // View, menuju file index di dalam folder = admin/mPerpusJurusan
        return view($this->views . "/create", $data);
        // echo "hood";
        // echo json_encode($users); die;
    }

    public function store(Request $request)
    {
        $dataChecklist = [
            'item'              => $request->item,
            'pukul'             => $request->pukul,
            'nama'              => $request->nama,
            'idArea'            => $request->idArea,
            'idUsers'           => $request->idUsers,
            'bersihan'          => $request->bersihan,
            'status'            => 1,
        ];

        // dd($dataUsers); die();
        $this->mChecklist->create($dataChecklist);

        return redirect("$this->url1")->with('sukses', 'Data Checklist Kebersihan berhasil di tambahkan');
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
