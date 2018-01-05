<?php

namespace App\Http\Controllers\Admin;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //文章列表
    public function index(){
        if($input = Input::all()){
            $where=null;
            // dd($input);
            if(isset($input['title'])){
                $where= $input['title'];
                $cate = DB::table('article')->where('title','like',"%{$where}%")->select()->paginate(10);
                foreach($cate as $ke=>$v){
                    $catename = DB::table('cate')->where('id',"{$v->cate_id}")->first();
                    $cate[$ke]->cate_id=$catename->name;
                }
                $count = DB::table('article')->where('title','like',"%{$where}%")->select()->count();
            }else{
                $cate = DB::table('article')->select()->paginate(10);
                foreach($cate as $ke=>$v){
                    $catename = DB::table('cate')->where('id',"{$v->cate_id}")->first();
                    $cate[$ke]->cate_id=$catename->name;
                }
                $count = DB::table('article')->select()->count();
            }
            return view('admin.article.index',compact('cate','count'));
        }else{
            $cate = DB::table('article')->select()->paginate(10);
            foreach($cate as $ke=>$v){
                $catename = DB::table('cate')->where('id',"{$v->cate_id}")->first();
                $cate[$ke]->cate_id=$catename->name;
            }
            $count = DB::table('article')->select()->count();
            // dd($cate);
            // var_dump($cate);die;
            return view('admin.article.index',compact('cate','count'));
        }
    }

    //添加文章页
    public function create(){
        $data = DB::table('cate')->get();
//        echo "<pre/>";
//        print_r($data);die;
//        dd($arr);
        $cate = tree($data);
        return view('admin.article.add',compact('cate'));
    }

    //执行添加文章页
    public function docreate(){
        if($input = Input::all()) {
            $data['title'] = $input['title'];
            $data['auther'] = $input['auther'];
            $data['content'] = $input['content'];
            $data['picname'] = $input['picname'];
            $data['view'] = 0;
            $data['cate_id'] = $input['cate_id'];
            $data['time'] = time();
            $data['tag'] = $input['tag'];
            $data['desc'] = $input['desc'];
            $dd = DB::table('article')->insert($data);
            if ($dd) {
                return showMessage(['message' => '添加文章成功！', 'url' => url('admin/article/index')]);
            } else {
                return showMessage(['message' => '添加文章失败！', 'url' => url('admin/article/index')]);
            }
        }
    }

    //修改文章
    public function edit($id){
        $article = DB::table('article')->where('id',"{$id}")->first();
        $data = DB::table('cate')->get();
//        echo "<pre/>";
//        print_r($data);die;
//        dd($arr);
        $cate = tree($data);
        return view('admin.article.edit',compact('cate','article'));
    }

    public function update(){
        if($input = Input::all()) {
            $data['title'] = $input['title'];
            $data['auther'] = $input['auther'];
            $data['content'] = $input['content'];
            $data['picname'] = $input['picname'];
            $data['cate_id'] = $input['cate_id'];
            $data['tag'] = $input['tag'];
            $data['desc'] = $input['desc'];
            $dd = DB::table('article')->where('id',"{$input['id']}")->update($data);
            if ($dd) {
                return showMessage(['message' => '修改文章成功！', 'url' => url('admin/article/index')]);
            } else {
                return showMessage(['message' => '修改文章失败！', 'url' => url('admin/article/index')]);
            }
        }
    }
}
