@extends('home.public.public')
@section('content')
  <div class="container">
    <div class="con_content">
      <div class="about_box">
        <h2 class="nh1"><span>您现在的位置是：<a href="{{url('/')}}" target="_blank">网站首页</a>>><a href="javascript:void(0)">
              关于我
            </a></span><b>关于我</b></h2>
        <div class="f_box">
          <p class="a_title">学习PHP的历程</p>
          <p class="p_title"></p>
          <p class="box_p"><span>发布时间：2018-01-20 15:50:53</span><span>作者：繁莫</span><span>来源:原创</span><span></span></p>
          <!-- 可用于内容模板 -->
        </div>
        <ul class="about_content">
          <p>从开始学习PHP开始已经1年多了,这一年多我发现自己要学习的东西还很多,所以自己写了个人博客网站,前台模板不是自己写的,请大家见谅,但是后面会慢慢改的,这个博客网站是用laravel5.4写的,还不是很完善,只能给自己简单记录一些工作上的一些心得。技术小白一个。</p>
        </ul>
        <!--    <div class="nextinfos">
        <!-- 可用于内容模板 -->

        <!-- container代码 结束 -->
      </div>
    </div>
    <div class="blank"></div>
  </div>
  <!-- container代码 结束 -->
@endsection

