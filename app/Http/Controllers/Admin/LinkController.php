<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LinkController extends Controller
{
    //友情链接列表
    public function index(){
        $link = DB::table('link')->get();
        $count = DB::table('link')->select()->count();
        return view('admin.link.index',compact('link','count'));
    }

    //友情链接添加页面
    public function create(){
        if($input = Input::all()){
            $data['name'] = $input['name'];
            $data['url'] = $input['url'];
            $data['status'] = $input['status'];
            $data['time'] = time();
            $dd = DB::table('link')->insert($data);
            if($dd){
                return showMessage(['message'=>'添加友情链接成功!','url' =>url('admin/link/index')]);
            }else{
                return showMessage(['message'=>'添加友情链接失败！','url' =>url('admin/link/index')]);
            }
        }else{
            return view('admin.link.add');
        }

    }

    //修改
    public function edit($id){
        $link = DB::table('link')->where('id',$id)->first();
        return view('admin.link.edit',compact('link'));
    }

    //执行修改
    public function update(){
        if($input = Input::all()){
            $data['name'] = $input['name'];
            $data['url'] = $input['url'];
            $data['status'] = $input['status'];
            $dd = DB::table('link')->where('id',$input['id'])->update($data);
            if($dd){
                return showMessage(['message'=>'修改友情链接成功!','url' =>url('admin/link/index')]);
            }else{
                return showMessage(['message'=>'修改友情链接失败！','url' =>url('admin/link/index')]);
            }
        }
    }

    //执行删除
    public function del(){
        if($input = Input::all()){
            $dd = DB::table('link')->where('id',"{$input['id']}")->delete();
            if($dd){
                $data=[
                    'status'=>1,
                    'msg'=>'删除友情链接成功'
                ];
            }else{
                $data=[
                    'status'=>2,
                    'msg'=>'删除友情链接失败'
                ];
            }
            return $data;
        }
    }
}

