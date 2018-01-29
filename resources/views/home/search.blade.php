@extends('home.public.public')
@section('content')
  <div class="container">
    <div class="con_content">
      <div class="about_box">
        <h2 class="nh1"><span>您现在的位置是：<a href="{{url('/')}}" target="_blank">网站首页</a>>><a href="javascript:void(0);" >{{$name}}</a></span><b>{{$name}}</b></h2>
        <div class="dtxw box">
          @foreach($search as $a)
          <li>
            <div class="dttext f_l">
              <ul>
                <h2><a href="{{url('content/id/'.$a->id)}}" onclick="num({{$a->id}})">{{$a->title}}</a></h2>
                <p>{{$a->desc}}</p>
                <span>{{date('Y-m-d H:i:s',$a->time)}}</span>
              </ul>
            </div>
            <div class="xwpic f_r"><a href="{{url('content/id/'.$a->id)}}" onclick="num({{$a->id}})"><img src="{{$a->picname}}"></a></div>
          </li>
          @endforeach
        <div class="pagelist">{{$search->links()}}</div>
      </div>
    </div>
    <div class="blank"></div>
    <!-- container代码 结束 -->
@endsection