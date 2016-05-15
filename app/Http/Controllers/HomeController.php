<?php

namespace App\Http\Controllers;

use App\Golongan;
use App\Http\Requests;
use App\Item;
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

    public function dashboard(Request $request)
    {
      $golongan = Golongan::get();

      if ($request->printrekap == csrf_token()) {
          return view('pages.printrekap', compact('golongan'));
      }

      return view('home', compact('golongan'));
    }

    public function profil()
    {
      $items = Item::orderBy('updated_at', 'desc')->take(10)->get();
      $user = \Auth::user();

      return view('pages.profil', compact(['user', 'items']));
    }

}
