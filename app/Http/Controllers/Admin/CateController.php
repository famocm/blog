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
    	// echo $_GET;
    	if($input = Input::all()){
    		$where=null;
    		// dd($input);
    		if(isset($input['pid'])){
    			$where= $input['pid'];
    			$cate = DB::table('cate')->where('pid',"{$where}")->select()->paginate(10);
    			$count = DB::table('cate')->where('pid',"{$where}")->select()->count();
    		}else{
    			$cate = DB::table('cate')->select()->paginate(10);
    			$count = DB::table('cate')->select()->count();
    		}
    		$data = DB::table('cate')->where('pid',0)->get();
    		return view('admin.cate.index',compact('cate','count','data'));
    	}else{
    		$cate = DB::table('cate')->select()->paginate(10);
            $data = DB::table('cate')->where('pid',0)->get();
    		$count = DB::table('cate')->select()->count();
    		// dd($cate);
    		// var_dump($cate);die;
        	return view('admin.cate.index',compact('cate','count','data'));
    	}
    	
    }

//    //二级递归分类
//    public function getTree($data)
//    {
//        $arr = array();
//        foreach ($data as $k=>$v){
//            if($v->pid==0){
////                $data[$k]["names"] = $data[$k]["name"];
//                $arr[] = $data[$k];
//                foreach ($data as $m=>$n){
//                    if($n->pid == $v->id){
////                        $data[$m]["names"] = '├─ '.$data[$m]['name'];
//                        $arr[] = $data[$m];
//                    }
//                }
//            }
//        }
//        return $arr;
//    }

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
            return showMessage(['message'=>'添加分类成功！','url' =>url('admin/cate/index')]);
        }else{
            return showMessage(['message'=>'添加分类失败！','url' =>url('admin/cate/index')]);
        }
    }

    //路由 get.Admin/cate/create
    public function create(){
        $data = DB::table('cate')->where(array('pid'=>0))->get();
        return view('admin.cate.add',compact('data'));
    }

    //修改
    public function edit($id){
        $data = DB::table('cate')->where(array('pid'=>0))->get();
        $cate = DB::table('cate')->where(array('id'=>$id))->first();
//        echo "<pre/>";
//        print_r($cate);
//        die;
        return view('admin.cate.edit',compact('data','cate'));
    }

    //路由 get.Admin/cate/update
    public function update(){
    	$input = Input::all();
    	$id = $input['id'];
//        var_dump($input);die;
        $data['name']=$input['name'];
        $data['title']=$input['title'];
        $data['keywords']=$input['keywords'];
        $data['description']=$input['description'];
        $data['pid']=$input['pid'];
        $dd = DB::table('cate')->where('id',"{$id}")->update($data);
        if($dd){
            return showMessage(['message'=>'修改分类成功!','url' =>url('admin/cate/index')]);
        }else{
            return showMessage(['message'=>'修改分类失败！','url' =>url('admin/cate/index')]);
        }
    }

    //删除分类操作
    public function del(){
    	$input = Input::all();
    	$id = $input['id'];
    	$cate = DB::table('cate')->where('pid',"{$id}")->select()->count();
    	if($cate){
    		$data=[
    			'status'=>3,
    			'msg'=>'此分类下还有子分类，不能删除'
    		];
    		return $data;
    	}else{
    		$dd = DB::table('cate')->where('id',"{$id}")->delete();
    		if($dd){
    			$data=[
    				'status'=>1,
    				'msg'=>'删除分类成功'
    			];
    		}else{
    			$data=[
    				'status'=>1,
    				'msg'=>'删除分类失败'
    			];	
    		}
    		return $data;
    	}

    }
}

