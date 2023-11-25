<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function pemilu()
    {
        return view('pemilu');
    }

    public function tujuanPemilu()
    {
        return view('tujuan');
    }

    public function dataDiri()
    {
        return view('data-diri');
    }
}
