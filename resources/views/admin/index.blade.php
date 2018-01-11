<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
	<script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
</head>
<body>
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="{{url('/')}}" target="_blank" class="active">首页</a></li>
				<li><a href="{{url('admin/index')}}">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：{{session('admin_admins')}}</li>
				<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/loginout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/system/index')}}" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
					{{--<li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>--}}
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>管理员管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/admin/index')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>管理员列表页</a></li>
					{{--<li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>--}}
					{{--<li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>--}}
					{{--<li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>--}}
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>分类管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/cate/index')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>分类列表页</a></li>
					{{--<li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>--}}
					{{--<li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>--}}
					{{--<li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>--}}
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>文章管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/article/index')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>文章列表页</a></li>
					{{--<li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>--}}
					{{--<li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>--}}
					{{--<li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>--}}
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>友情链接管理</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/link/index')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>友情链接列表</a></li>
					{{--<li><a href="list.html" target="main"><i class="fa fa-fw fa-list-ul"></i>列表页</a></li>--}}
					{{--<li><a href="tab.html" target="main"><i class="fa fa-fw fa-list-alt"></i>tab页</a></li>--}}
					{{--<li><a href="img.html" target="main"><i class="fa fa-fw fa-image"></i>图片列表</a></li>--}}
				</ul>
			</li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/welcome')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2017. Powered By <a href="#">繁莫</a>.
	</div>
	<!--底部 结束-->
</body>
</html>