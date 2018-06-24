<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Campa;
use Faker\Provider\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function lista()
    {
//        $lista = $results = DB::select('select * from pg_catalog.pg_namespace');
        $lista = Campa::all();
        return view('lista',compact('lista'));
//        dd($lista);
    }

    public function mostrar($squema)
    {
        $title = $squema;
        $nombre = $squema.".".$squema;
        $lista = DB::select('select * from '."$nombre");
        return view('mostrar',compact('lista','title'));
//        dd($lista);
    }



}
