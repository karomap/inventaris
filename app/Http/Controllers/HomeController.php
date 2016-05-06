<?php

namespace App\Http\Controllers;

use App\Golongan;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
      return view('layouts.app');
    }

    public function dashboard()
    {
      $golongan = Golongan::get();

      return view('home', compact('golongan'));
    }
}
