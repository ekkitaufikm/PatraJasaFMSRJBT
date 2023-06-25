<?php

namespace App\Http\Controllers\Supervisor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Str;
use File;

use App\Models\TimeScheduleModel;
use App\Models\UserModel;
use App\Models\AreaModel;

class TimeScheduleController extends Controller
{
    // Untuk panggil view
    private $views      = 'supervisor/time_schedule';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'supervisor/time_schedule';
    
    // Title head
    private $title      = 'Halaman Time Schedule Supervisor';

    public function __construct()
    {
        // Di isi Construct. Biasanya saya isi untuk Model

        // Panggil disini biar lebih ringkas
        $this->mTimeSchedule       = new TimeScheduleModel();
        $this->mUsers            = new UserModel();
        $this->mArea            = new AreaModel();
    }

    public function index()
    {

        $time_schedule = $this->mTimeSchedule->where('idUsers', session()->get('idUsers'))->get();
        $area           = $this->mArea->get();
        $users      = $this->mUsers->where('role', 2)->get();

        $data = [
            'title'          => $this->title,
            'url'            => $this->url,
            'page'           => 'Data Time Schedule Supervisor',
            'time_schedule'  => $time_schedule,
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
            'page'              => 'Tambah Data Time Schedule Supervisor',
            'area'              => $area,
            'users'         => $users,
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        if ($request->hasFile('time_schedule')) {
            $file       = $request->file('time_schedule');
            $fileName   = Str::uuid()."-".time().".".$file->extension();
            $file->move( "upload/excel/time_schedule/", $fileName);
        }

        $dataTimeSchedule = [
            'nama'          => $fileName,
            'idUsers'       => $request->idUsers,
            'idArea'        => $request->idArea,
        ];

        // dd($dataRkb); die();
        $this->mTimeSchedule->create($dataTimeSchedule);

        return redirect("$this->url")->with('sukses', 'Data Time Schedule Supervisor berhasil di tambahkan');
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
