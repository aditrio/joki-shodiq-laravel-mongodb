<?php

namespace App\Http\Controllers;
use App\Mahasiswa;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();

        return view('dash' , ['data' => $data]);
    }

    public function mahasiswa()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa', ['data' => $data]);
    }

    public function nilai()
    {
        $data = Mahasiswa::all();
        return view('nilai' , ['data' => $data]);
    }
}
