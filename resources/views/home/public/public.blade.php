<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>繁莫--个人博客</title>
<meta name="keywords" content="{{$system->keywords}}" />
<meta name="description" content="{{$system->desc}}" />
<link href="{{asset('resources/views/home/css/base.css')}}" rel="stylesheet">
<link href="{{asset('resources/views/home/css/index.css')}}" rel="stylesheet">
<link href="{{asset('resources/views/home/css/main.css')}}" rel="stylesheet">
<!--[if lt IE 9]-->
<script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>
<!--[endif]-->
<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.js')}}"></script>
</head>
<body>
<div id="wrapper">
  <header>
    <div class="headtop"></div>
    <div class="contenttop">
      <div class="logo f_l">我的目标是全栈工程师。</div>
      <div class="search f_r">
        <form action="{{url('/search')}}" method="post" name="searchform" id="searchform">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input name="name" id="keyboard" class="input_text" placeholder="请输入文章名" style="color: rgb(153, 153, 153);"type="text">
          <input name="Submit" class="input_submit" value="搜索" type="submit">
        </form>
      </div>
      <div class="blank"></div>
      <nav>
        <div  class="navigation">
          <ul class="menu">
            <li><a href="{{url('/')}}">网站首页</a></li>
            @foreach($date as $d)
              @if($d->pid == 0)
            <li><a href="javascript:void(0);">{{$d->name}}</a>
              <ul>
                @foreach($date as $dd)
                  @if($d->id == $dd->pid)
                <li><a href="{{url('list/cate_id/'.$dd->id)}}">{{$dd->name}}</a></li>
                  @endif
                {{--<li><a href="listpic.html">个人相册</a></li>--}}
                @endforeach
              </ul>
            </li>
              @endif
            @endforeach
            <li><a href="{{url('/me')}}">关于我</a></li>
            {{--<li><a href="#">我的日记</a>--}}
              {{--<ul>--}}
                {{--<li><a href="newslistpic.html">个人日记</a></li>--}}
                {{--<li><a href="newslistpic.html">我的笔记</a></li>--}}
              {{--</ul>--}}
            {{--</li>--}}
            {{--<li><a href="newslistpic.html">技术文章</a> </li>--}}
            {{--<li><a href="#">给我留言</a> </li>--}}
          </ul>
        </div>
      </nav>
      <SCRIPT type=text/javascript>
	// Navigation Menu
	$(function() {
		$(".menu ul").css({display: "none"}); // Opera Fix
		$(".menu li").hover(function(){
			$(this).find('ul:first').css({visibility: "visible",display: "none"}).slideDown("normal");
		},function(){
			$(this).find('ul:first').css({visibility: "hidden"});
		});
	});
</SCRIPT> 
    </div>
  </header>
  @yield('content')

  <footer>
    <div class="footer">
      <div class="f_l">
        <p>All Rights Reserved 版权所有：<a href="#">繁莫所有</a> 备案号：{{$system->icp}}</p>
      </div>
      <div class="f_r textr">
        <p>Design by DanceSmile</p>
      </div>
    </div>
  </footer>
</div>
</body>
<script type="text/javascript">
  function num(id){
//    console.log(1)
      $.post('{{url('/num')}}',{id:id,_token:'{{csrf_token()}}'},function(){ })
  }
</script>
</html>
