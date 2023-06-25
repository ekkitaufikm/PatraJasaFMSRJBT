<?php

namespace App\Http\Controllers\Landing;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    // Untuk panggil view
    private $views      = 'landing/home';
    
    // Untuk keperluan redirect, hubungannya route / file web
    private $url        = 'landing';
    
    // Title head
    private $title      = 'PT.Patra Jasa Facility Management Services';

    public function __construct()
    {
        //

    }

    public function index()
    {
        $data = [
            'title'         => $this->title,
            'url'           => $this->url,
        ];
        // View
        return view($this->views . "/index", $data);
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
