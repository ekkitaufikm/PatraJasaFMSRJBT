<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\KelaminModel;

class KelaminController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/kelamin';
    
    // 
    private $url        = 'admin/kelamin';
    
    // Title head
    private $title      = 'Halaman Data Jenis Kelamin';


    public function __construct()
    {
        // Di isi Construct
        $this->mJenisKelamin         = new KelaminModel();
    }
    
    public function index()
    {
        $jenis_kelamin = $this->mJenisKelamin->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Data Jenis Kelamin',
            'jenis_kelamin'     => $jenis_kelamin,
        ];
        // View
        return view($this->views . "/index", $data);
        // echo "hood";
        // dd(session()->all());
    }

    public function create()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Tambah Data Jenis Kelamin',
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $dataKelamin = [
            'nama'      => $request->nama,
        ];
        $this->mJenisKelamin->create($dataKelamin);

        return redirect("$this->url")->with('sukses', 'Data Jenis Kelamin berhasil di tambahkan');
    }

    public function show($id)
    {
        // 
        
    }

    public function edit($id)
    {
        // 
    }

    public function update(Request $request, $id)
    {
        // 
    }

    public function destroy($id)
    {
        //
    }
}
