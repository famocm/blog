<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
require_once ('resources/org/code/Code.class.php');
class LoginController extends Controller
{
    public function login(){
        if($input=Input::all()){
            //验证码验证
            $code = new \Code();
            $incode = $code->get();
            if(strtoupper($input['code'])!=$incode){
                return back()->with('message','验证码错误！');
            }
            $user = DB::table('admin')->where(array('admin_user'=>$input['user'],'admin_pass'=>md5(md5($input['pass']))))->first();
            if($user != null || $user != ""){
                session(['admin_admins'=>$input['user']]);
//                return view('admin.index');
                return redirect('admin/index');
            }else{
                return back()->with('message','用户名或者密码错误！');
            }

        }else{
//            dd(session('admin_admins'));
            return view('admin.login');
        }

    }

    //导入验证码
    public function code(){
        $code = new \Code();
        $code->make();
    }

    //验证输入的验证码是否是正确的
//    public function getcode(){
//        $code = new \Code();
//        $ycode = $code->get();
//        echo $ycode;
//    }

//    //加密测试
//    public function mima(){
//        $str = '';
//        echo md5(md5($str));
//        echo '<br/>';
//        echo encrypt('asdfghjk');
//        echo '<br/>';
//        echo encrypt('name1234');
//        echo "<br/>";
//        echo time();
//
//    }
}
