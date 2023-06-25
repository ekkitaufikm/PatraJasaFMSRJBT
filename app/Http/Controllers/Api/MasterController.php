<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\RkbModel;
use App\Models\AreaModel;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->mRkb          = new RkbModel();
        $this->mArea         = new AreaModel();
    
    }

    public function getArea()
    {
        $area = $this->mArea->get();
        $data = [
            'error_code'    => 0,
            'data'          => $area,
        ];

        // $data = session()->all();
        // echo json_encode($data); die;
        
        echo json_encode($data);
    }

    function getRkbArea($idArea = null){
        $rkb = $this->mRkb->get();


        $i = 1;
        foreach ($rkb as $row)
        {

            $tbody      = [];
            $tbody[]    = $i++; 
            $tbody[]    = $row->created_at;
            $tbody[]    = $row->supervisor;
            $tbody[]    = $row->area->nama;

            $data[]     = $tbody;
        }

        // if ($siswa != null)
        if (count($rkb) > 0)
        {
            $response = [
                'data'      => $data,
            ];
            echo json_encode($response);
        }else{
            $response = [
                'data'      => '',
            ];
            echo json_encode($response);
        }
    }

}
