<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\JabatanModel;

class JabatanController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/jabatan';
    
    // 
    private $url        = 'admin/jabatan';
    
    // Title head
    private $title      = 'Halaman Data Jenis Jabatan';


    public function __construct()
    {
        // Di isi Construct
        $this->mJabatan         = new JabatanModel();
    }
    
    public function index()
    {
        $jabatan = $this->mJabatan->get();

        $data = [
            'title'       => $this->title,
            'url'         => $this->url,
            'page'        => 'Data Jabatan',
            'jabatan'     => $jabatan,
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
            'page'          => 'Tambah Data Jabatan',
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $dataJabatan = [
            'nama'      => $request->nama,
            'gaji'      => $request->gaji,
        ];
        $this->mJabatan->create($dataJabatan);

        return redirect("$this->url")->with('sukses', 'Data Jabatan berhasil di tambahkan');
    }

    public function show($id)
    {
        // 
        
    }

    public function edit($id)
    {
        // Get Data
        $jabatan      = $this->mJabatan->where('idJabatan', $id)->first();

        $data = [
            'title'     => $this->title,
            'url'       => $this->url,
            'page'      => 'Edit Data Jabatan',
            'id'        => $id,
            'jabatan'   => $jabatan,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $dataJabatan = [
            'nama'      => $request->nama,
            'gaji'      => $request->gaji,
        ];
        $this->mJabatan->where('idJabatan', $request->idJabatan)->update($dataJabatan);

        // Response
        return redirect("$this->url")->with('sukses', 'Data Jabatan berhasil di edit');
        // dd($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
