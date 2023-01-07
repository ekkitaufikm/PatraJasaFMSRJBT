<?php

namespace App\Http\Controllers\Supervisor;
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
    private $views      = 'supervisor/checklist';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/checklist';
    
    // Title head
    private $title      = 'Halaman Data Checklist';

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
        $wherespv = [
            'role'      => 2,
            'status'    => 1,
        ]; 
        $users      = $this->mUsers->where($wherespv)->get();
        $checklist  = $this->mChecklist->where('idUsers', session()->get('idUsers'))->get();
        $area       = $this->mArea->get();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Data Checklist',
            'users'         => $users,
            'checklist'     => $checklist,
            'area'          => $area,
        ];

        // View, menuju file index di dalam folder = supervisor/mPerpusJurusan
        return view($this->views . "/index", $data);
        // echo "hood";
        // echo json_encode($users); die;
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
        $checklist      = $this->mChecklist->where('id', $id)->first();
        $wherespv = [
            'status' => 1,
            'role' => 2,
        ]; 
        $users          = $this->mUsers->where($wherespv)->get();
        $area           = $this->mArea->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Detail Data Checklist',
            'checklist'         => $checklist,
            'users'             => $users,
            'area'              => $area,
        ];
        return view($this->views . "/show", $data);
    }

    public function edit($id)
    {
        $checklist      = $this->mChecklist->where('id', $id)->first();
        $wherespv = [
            'status' => 1,
            'role' => 2,
        ]; 
        $users          = $this->mUsers->where($wherespv)->get();
        $area           = $this->mArea->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Edit Data Checklist',
            'checklist'         => $checklist,
            'users'             => $users,
            'area'              => $area,
        ];
        return view($this->views . "/edit", $data);
        // echo "hood";
    }

    public function update(Request $request, $id)
    {

        if($request->status == 2 OR $request->status == 3){
            $dataChecklist = [
                'status'        => $request->status,
            ];
            // echo json_encode($dataPengajuanCuti); die();
            $this->mChecklist->where('id', $id)->update($dataChecklist);
            return redirect("$this->url")->with('sukses', 'Data Checklist berhasil diberi Tindakan');
        }else{
            $dataChecklist = [
                'nama'              => $request->nama,
                'idUsers'           => $request->idUsers,
                'bersihan'          => $request->bersihan,
                'status'            => 1,
            ];

            // echo json_encode($dataChecklist); die();
            $this->mChecklist->where('id', $id)->update($dataChecklist);
            return redirect("$this->url")->with('sukses', 'Data Checklist berhasil di edit');
        }
       
        // dd($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
