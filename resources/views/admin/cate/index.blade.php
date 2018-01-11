<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/welcome')}}">首页</a> &raquo; 分类列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="{{url('admin/cate/index')}}" method="post">
        {{csrf_field()}}
            <table class="search_tab">
                <tr>
                    {{--<th width="120">选择分类查询:</th>--}}
                    {{--<td>--}}
                        {{--<select name='pid'>--}}
                            {{--@foreach($data as $a)--}}
                                    {{--<option value=" {{$a->id}} ">{{$a->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    <th width="70">分类名称:</th>
                    <td><input type="text" name="name" placeholder="只支持搜索顶级分类"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/cate/create')}}"><i class="fa fa-plus"></i>添加分类</a>
                    {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                    <a href="javascript:location.reload();"><i class="fa fa-refresh"></i>刷新</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        {{--<th class="tc" width="5%"><input type="checkbox" name=""></th>--}}
                        <!-- <th class="tc">排序</th> -->
                        <th class="tc">ID</th>
                        <th>分类名称</th>
                        <th>分类说明</th>
                        <th>关键词</th>
                        <th>描述</th>
                        <th>添加时间</th>
                        <!-- <th></th> -->
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        {{--<td class="tc"><input type="checkbox" name="id[]" value="59"></td>--}}
                       <!--  <td class="tc">
                            <input type="text" name="ord[]" value="0">
                        </td> -->
                        <td class="tc">{{$v->id}}</td>
                        <td>
                            <a href="#">{{$v->names}}</a>
                        </td>
                        <td>{{$v->title}}</td>
                        <td>{{$v->keywords}}</td>
                        <td>{{$v->description}}</td>
                        <td>{{date('Y-m-d H:i:s',$v->time)}}</td>
                        <!-- <td></td> -->
                        <td>
                            <a href="{{url('admin/cate/edit/id/'.$v->id)}}">修改</a>
                            <a href="javascript:;" onclick="del({{$v->id}})">删除</a>
                        </td>
                    </tr>
                    @endforeach
                </table>


<div class="page_nav">
<div>
{{$cate->links()}}
<!-- <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a> 
<a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a> 
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
<span class="current">8</span>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
<a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a> 
<a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a> 
<a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a>  -->
<span class="rows">共{{$count}}条记录</span>
</div>
</div>


<!-- 
                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->



</body>
<script type="text/javascript">
    function del(id){
        layer.confirm('您确定要删除这个分类吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article/del')}}",{'_token':"{{csrf_token()}}",'id':id},function (data) {
                if(data.status==1){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }
</script>
</html>