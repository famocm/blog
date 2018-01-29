<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends Controller
{
    //首页
    public function index(){
        $system = DB::table('system')->first();
        $article = DB::table('article')->orderBy('time','desc')->take(5)->get();
        $view = DB::table('article')->orderBy('view','desc')->take(6)->get();
        $date = DB::table('cate')->get();
        return view('home.index',compact('system','article','date','view'));
    }

    //内容页
    public function content($id){
        $system = DB::table('system')->first();
        $date = DB::table('cate')->get();
        $article = DB::table('article')->where('id',$id)->first();
//        dd($article);
        return view('home.about',compact('system','article','date'));
    }

    //列表页
    public function newlist($cate_id){
        $system = DB::table('system')->first();
        $date = DB::table('cate')->get();
        $data = DB::table('cate')->where('id',$cate_id)->first();
        $article = DB::table('article')->select()->where('cate_id',$cate_id)->orderBy('time','desc')->paginate(6);
        return view('home.newslistpic',compact('system','article','data','date'));
    }

    //头部搜索页
    public function search(){
        if($input = Input::all()){
//            dd($input['name']);
            $search = DB::table('article')->select()->where('title','like',$input['name'].'%')->orderBy('time','desc')->paginate(6);
//            dd($search);
            $system = DB::table('system')->first();
            $date = DB::table('cate')->get();
            $name = $input['name'];
            return view('home.search',compact('system','search','date','name'));
        }

    }

    //点击
    public function num(){
        if($input = Input::all()){
            $view = DB::table('article')->where('id',$input['id'])->first();
            $num = $view->view+1;
            $data['view'] = $num;
            DB::table('article')->where('id',$input['id'])->update($data);
        }
    }


    //站点关闭提示页
    public function message(){
    	return view('message.index');
    }

    //关于我的页面加载
    public function me(){
        $system = DB::table('system')->first();
        $date = DB::table('cate')->get();
        return view('home.me',compact('system','date'));
    }
}
