<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=DB::table('message')
        ->orderBy('date','desc')
        ->paginate(20);
        // echo "<pre>";
        // print_r($data);
        // echo $data->fragment('foo')->links();
        // echo "</pre>";
        // die();
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        return view('home',['data'=>$data,'now'=>'dashboard']);
    }
    public function msg()
    {
        $data=DB::table('message')
        ->orderBy('date','desc')
        ->paginate(20);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        return view('msg',['data'=>$data]);
    }
}
