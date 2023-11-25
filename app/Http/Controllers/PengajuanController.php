<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function urgensiPage()
    {
        return view('urgensi');
    }

    public function syaratKetentuanPage()
    {
        return view('syarat');
    }

    public function tataCaraPage()
    {
        return view('cara');
    }

    public function pengajuanPage()
    {
        return view('pengajuan');
    }
}
