<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\AlasanCutiModel;

class AlasanCutiController extends Controller
{
     // Untuk panggil view
     private $views      = 'admin/alasan_cuti';
    
     // 
     private $url        = 'admin/alasan_cuti';
     
     // Title head
     private $title      = 'Halaman Data Alasan Cuti';
 
 
     public function __construct()
     {
         // Di isi Construct
         $this->mAlasanCuti         = new AlasanCutiModel();
     }
     
     public function index()
     {
         $alasan_cuti = $this->mAlasanCuti->get();
 
         $data = [
             'title'             => $this->title,
             'url'               => $this->url,
             'page'              => 'Data Alasan Cuti',
             'alasan_cuti'       => $alasan_cuti,
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
             'page'          => 'Tambah Data Alasan Cuti',
         ];
         // View, menuju file index di dalam folder = admin/mprovinsi
         return view($this->views . "/create", $data);
         // echo "hood";
     }
 
     public function store(Request $request)
     {
         $dataAlasanCuti = [
             'pertanyaan'      => $request->pertanyaan,
         ];
         $this->mAlasanCuti->create($dataAlasanCuti);
 
         return redirect("$this->url")->with('sukses', 'Data Alasan Cuti berhasil di tambahkan');
     }
 
     public function show($id)
     {
         // 
         
     }
 
    public function edit($id)
    {
        // Get Data
        $alasan_cuti      = $this->mAlasanCuti->where('idMCuti', $id)->first();

        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
            'page'          => 'Edit Data Alasan Cuti',
            'id'            => $id,
            'alasan_cuti'   => $alasan_cuti,
        ];
        return view($this->views . "/edit", $data);
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $dataAlasanCuti = [
            'pertanyaan'      => $request->pertanyaan,
        ];
        $this->mAlasanCuti->where('idMCuti', $request->idMCuti)->update($dataAlasanCuti);

        // Response
        return redirect("$this->url")->with('sukses', 'Data Alasan Cuti berhasil di edit');
        // dd($request->all());
    }
 
     public function destroy($id)
     {
         //
     }
}
