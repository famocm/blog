<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    //欢迎页
    public function welcome(){
        date_default_timezone_set('PRC');
        $system = PHP_OS;
        $jre = $_SERVER['SERVER_SOFTWARE'];
        $time = date('Y-m-d H:i:s',time());
        $name = $_SERVER['HTTP_HOST']."/".GetHostByName($_SERVER['SERVER_NAME']);
        $host = GetHostByName($_SERVER['SERVER_NAME']);
//        echo session('admin_admins');
//        dd($_SERVER);
        return view('admin.welcome',compact('system','jre','time','name','host'));
    }

    //退出
    public function loginout(){
        session(['admin_admins'=>null]);
        return redirect('/admin/login');
    }

    //主页修改当前管理员的密码
    public function pass(){
        if($input=Input::all()){
//            dd($input);
            $rules=[
                'password'=>'required|between:6,20|confirmed',//required不能为空
            ];
            $message = [
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码在6-20位字符之间',
                'password.confirmed'=>'新密码与确认密码输入不一致',
            ];
            $validator = Validator::make($input,$rules,$message);

            if($validator->passes()){
                $data['admin_pass'] = md5(md5($input['password']));
//                echo $data['admin_admins'];
                $user = DB::table('admin')->where(array('admin_user'=>session('admin_admins')))->update($data);
                if($user){
                    return redirect('admin/welcome');
                }else{
                    return back()->with('message','修改密码失败!');
                }
//                echo '验证成功';
            }else{
              return back()->withErrors($validator);
            }
        }else{
            return view('admin.pass');
        }
    }
}
