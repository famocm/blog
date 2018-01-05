<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/1
 * Time: 16:15
 */


/**
 * 跳转提示函数
 */
function showMessage(Array $array){

    //验证参数
    if(!empty($array['message']) && !empty($array['url'])){
        $data = [
            'message' => $array['message'],
            'url' => $array['url'],
            'jumpTime' => !empty($array['time']) ? $array['time'] : 3000,
            'ok'=>!empty($array['ok']) ? $array['ok'] : true
        ];
    } else {
        $data = [
            'message' => '非法访问！',
            'url' => 'javascript：history.back();',
            'jumpTime' => 3000,
            'ok'=>!empty($array['ok']) ? $array['ok'] : true
        ];
    }
    return view('admin.message',['data' => $data]);

    //  return redirect('/message')->with($array);
}

//二级递归分类
function tree($data){
    $arr = array();
    foreach ($data as $k=>$v){
        if($v->pid==0){
            $data[$k]->names = $v->name;
            $arr[] = $data[$k];
            foreach ($data as $m=>$n){
                if($n->pid == $v->id){
                    $data[$m]->names = '├─ '.$n->name;
                    $arr[] = $data[$m];
                }
            }
        }
    }
    return $arr;
}


