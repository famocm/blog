<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //首页
    public function index(){
        $system = DB::table('system')->first();
        return view('home/index',compact('system'));
    }
}
