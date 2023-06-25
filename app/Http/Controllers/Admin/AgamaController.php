<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\AgamaModel;

class AgamaController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/agama';
    
    // 
    private $url        = 'admin/agama';
    
    // Title head
    private $title      = 'Halaman Data Agama';


    public function __construct()
    {
        // Di isi Construct
        $this->mAgama         = new AgamaModel();
    }
    
    public function index()
    {
        $agama = $this->mAgama->get();

        $data = [
            'title'       => $this->title,
            'url'         => $this->url,
            'page'        => 'Data Agama',
            'agama'       => $agama,
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
            'page'          => 'Tambah Data Area',
        ];
        // View, menuju file index di dalam folder = admin/mprovinsi
        return view($this->views . "/create", $data);
        // echo "hood";
    }

    public function store(Request $request)
    {
        $dataAgama = [
            'nama'          => $request->nama,
        ];
        $this->mAgama->create($dataAgama);

        return redirect("$this->url")->with('sukses', 'Data Agama berhasil di tambahkan');
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
