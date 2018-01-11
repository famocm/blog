<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SystemController extends Controller
{
    //系统首页
    public function index(){
        if($input = Input::all()){
            $count = DB::table('system')->select()->count();
            if($count == 0){
                $data['name'] = $input['name'];
                $data['title'] = $input['title'];
                $data['url'] = $input['url'];
                $data['keywords'] = $input['keywords'];
                $data['desc'] = $input['desc'];
                $data['status'] = $input['status'];
                $data['icp'] = $input['icp'];
                $dd = DB::table('system')->insert($data);
                if($dd){
                    return showMessage(['message'=>'保存站点配置成功!','url' =>url('admin/system/index')]);
                }else{
                    return showMessage(['message'=>'保存站点配置失败！','url' =>url('admin/system/index')]);
                }
            }else{
                $data['name'] = $input['name'];
                $data['title'] = $input['title'];
                $data['url'] = $input['url'];
                $data['keywords'] = $input['keywords'];
                $data['desc'] = $input['desc'];
                $data['status'] = $input['status'];
                $data['icp'] = $input['icp'];
                $dd = DB::table('system')->update($data);
                if($dd){
                    return showMessage(['message'=>'保存站点配置成功!','url' =>url('admin/system/index')]);
                }else{
                    return showMessage(['message'=>'保存站点配置失败！','url' =>url('admin/system/index')]);
                }
            }
        }else{
            $count = DB::table('system')->select()->count();
            if($count == 0){
                return view('admin.system.index1');
            }else{
                $system = DB::table('system')->first();
                return view('admin.system.index',compact('system'));
            }

        }

    }
}
