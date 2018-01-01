<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CateController extends Controller
{
    //路由 get.Admin/cate
    public function index(){
        return view('admin.cate.index');
    }

    //路由 post.Admin/cate
    public function store(){
        $input = Input::all();
//        var_dump($input);die;
        $data['name']=$input['name'];
        $data['title']=$input['title'];
        $data['keywords']=$input['keywords'];
        $data['description']=$input['discription'];
        $data['pid']=$input['pid'];
        $data['view']=0;
        $data['order']=0;
        $data['time']=time();
        $dd = DB::table('cate')->insert($data);
        if($dd){
            return showMessage(['message'=>'添加分类成功！','url' =>url('admin/cate')]);
        }else{
            return showMessage(['message'=>'添加分类失败！','url' =>url('admin/cate')]);
        }
    }

    //路由 get.Admin/cate/create
    public function create(){
        $data = DB::table('cate')->where(array('pid'=>0))->get();
        return view('admin.cate.add',compact('data'));
    }

    //路由 get.Admin/cate/show
    public function show(){

    }

    //路由 get.Admin/cate/update
    public function update(){

    }

    //路由 get.Admin/cate/destroy
    public function destroy(){

    }

    //路由 get.Admin/cate/edit
    public function edit(){

    }
}

