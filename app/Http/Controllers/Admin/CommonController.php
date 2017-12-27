<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CommonController extends Controller
{
    public function _initialize(){
        echo 11111111;
//        if(!session('admin_admins')){
//            return redirect('/admin/login');
//        }
    }
}
