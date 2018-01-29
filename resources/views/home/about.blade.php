@extends('home.public.public')
@section('content')
  <div class="container">
    <div class="con_content">
      <div class="about_box">
        <h2 class="nh1"><span>您现在的位置是：<a href="{{url('/')}}" target="_blank">网站首页</a>>><a href="{{url('list/cate_id/'.$article->cate_id)}}" target="_blank">
              @foreach($date as $d)
                  @if($d->id == $article->cate_id)
                    {{$d->name}}
                  @endif
              @endforeach
            </a></span><b>{{$article->title}}</b></h2>
        <div class="f_box">
          <p class="a_title">{{$article->title}}</p>
          <p class="p_title"></p>
          <p class="box_p"><span>发布时间：{{date('Y-m-d H:i:s',$article->time)}}</span><span>作者：{{$article->auther}}</span><span>来源:</span><span>点击：{{$article->view}}</span></p>
          <!-- 可用于内容模板 -->
        </div>
        <ul class="about_content">
          <p> {!! $article->content !!}</p>
          <p><img src="{{$article->picname}}" width="50%" height="50%"></p>
          <p>{{$article->desc}}</p>
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

