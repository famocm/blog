<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class AdminController extends Controller
{
    //管理员列表
    public function index(){
        $admin = DB::table('admin')->select()->paginate(10);
        $count = DB::table('admin')->select()->count();
        return view('admin.admin.index',compact('admin','count'));
    }

    //添加管理员
    public function create(){
        if($input = Input::all()){
            $name = DB::table('admin')->where('admin_user',"{$input['admin_user']}")->select()->count();
            if($name){
                return back()->with('errors','此管理员已经存在,请重新命名!');
                exit;
            }
            $data['admin_user'] = $input['admin_user'];
            $data['admin_pass'] = md5(md5($input['admin_pass']));
            $data['time'] = time();
            $dd = DB::table('admin')->insert($data);
            if($dd){
                return showMessage(['message'=>'添加管理员成功！','url' =>url('admin/admin/index')]);
            }else{
                return showMessage(['message'=>'添加管理员失败！','url' =>url('admin/admin/index')]);
            }
        }else{
            return view('admin.admin.add');
        }
    }

    //修改密码
    public function edit($id){
        if($input = Input::all()){
            if($input['admin_pass']!=$input['admin_pass']){
                return back()->with('errors','新密码与确认密码输入不一致!');
                exit;
            }
            $data['admin_pass']=md5(md5($input['admin_pass']));
            $dd = DB::table('admin')->where('id',$input['id'])->update();
            if($dd){
                return showMessage(['message'=>'修改管理员密码成功！','url' =>url('admin/admin/index')]);
            }else{
                return showMessage(['message'=>'修改管理员密码失败！','url' =>url('admin/admin/index')]);
            }
        }else{
            $admin = DB::table('admin')->where('id',$id)->first();
            return view('admin.admin.edit',compact('admin'));
        }


    }

    //执行修改密码
    public function update(){
        if($input = Input::all()){
            if($input['admin_pass']!=$input['admin_pass1']){
                return back()->with('errors','新密码与确认密码输入不一致!');
                exit;
            }
            $data['admin_pass']=md5(md5($input['admin_pass']));
            $dd = DB::table('admin')->where('id',$input['id'])->update($data);
            if($dd){
                return showMessage(['message'=>'修改管理员密码成功！','url' =>url('admin/admin/index')]);
            }else{
                return showMessage(['message'=>'修改管理员密码失败！','url' =>url('admin/admin/index')]);
            }
        }
    }

    //执行删除操作
    public function del()
    {
        $input = Input::all();
        $id = $input['id'];
        $cate = DB::table('admin')->select()->count();
        if ($cate == 1) {
            $data = [
                'status' => 3,
                'msg' => '只有一个管理员了不能删除!'
            ];
            return $data;
        } else {
            $dd = DB::table('admin')->where('id', "{$id}")->delete();
            if ($dd) {
                $data = [
                    'status' => 1,
                    'msg' => '删除管理员成功'
                ];
            } else {
                $data = [
                    'status' => 2,
                    'msg' => '删除管理员失败'
                ];
            }
            return $data;
        }
    }
}
