<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/welcome')}}">首页</a> &raquo; 添加管理员
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                {{--<a href="#"><i class="fa fa-plus"></i>新增文章</a>--}}
                {{--<a href="#"><i class="fa fa-recycle"></i>批量删除</a>--}}
                <a href="{{url('admin/admin/index')}}"><i class="fa fa-recycle"></i>全部管理员</a>
                <a href="javascript:location.reload();"><i class="fa fa-refresh"></i>刷新</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/link/create')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>账号：</th>
                        <td>
                            <input type="text"  name="admin_user">
                            {{--<p>标题可以写30个字</p>--}}
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>密码:</th>
                        <td>
                            <input type="password"  name="admin_pass">
                            {{--<p>标题可以写30个字</p>--}}
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
</html>