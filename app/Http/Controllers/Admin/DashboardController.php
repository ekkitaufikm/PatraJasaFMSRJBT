<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

use App\Models\UserModel;
use App\Models\UsersManpowerModel;
use App\Models\AreaModel;

class DashboardController extends Controller
{
    // Untuk panggil view
    private $views      = 'admin/dashboard';
    
    // 
    private $url        = 'Dashboard';
    
    // Title head
    private $title      = 'Halaman Dashboard';


    public function __construct()
    {
        $this->mUsers           = new UserModel();
        $this->mManPower        = new UsersManpowerModel();
        $this->mArea            = new AreaModel();
    
    }

    public function index()
    {
        $users                  = $this->mUsers->get();
        $area                   = $this->mArea->get();
        $tim_management         = $this->mUsers->where('role', 1)->get();
        $supervisor             = $this->mUsers->where('role', 2)->get();
        $man_power              = $this->mManPower->where('role', 3)->get();
        $pensiun                = $this->mUsers->where('status', 3)->get();
        $resign                 = $this->mUsers->where('status', 4)->get();

        $data = [
            'title'             => $this->title,
            'url'               => $this->url,
            'page'              => 'Dashboard',
            'users'             => $users,
            'tim_management'    => $tim_management,
            'supervisor'        => $supervisor,
            'man_power'         => $man_power,
            'pensiun'           => $pensiun,
            'resign'            => $resign,
            '$area'             => $area,
        ];
        // View
        return view($this->views . "/index", $data);
        // echo "hood";
    }
}
