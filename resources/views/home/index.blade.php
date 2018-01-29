@extends('home.public.public')
@section('content')
  <div class="jztop"></div>
  <div class="container">
    <div class="bloglist f_l">
      @foreach($article as $v)
      <h3><a href="{{url('/content/id/'.$v->id)}}" onclick="num({{$v->id}})">{{$v->title}}</a></h3>
      <figure><img src="{{$v->picname}}" alt="{{$v->title}}"></figure>
      <ul>
        <p> {{$v->desc}}</p>
        <a title="{{$v->title}}" href="{{url('/content/id/'.$v->id)}}" target="_blank" class="readmore" onclick="num({{$v->id}})">阅读更多&gt;&gt;</a>
      </ul>
      <p class="dateview"><span>{{date('Y-m-d H:i:s',$v->time)}}</span><span>作者：{{$v->auther}}</span><span>个人博客：[<a href="{{url('list/cate_id/'.$v->cate_id)}}">@foreach($date as $d)
                      @if($d->id == $v->cate_id)
                        {{$d->name}}
                      @endif
                  @endforeach
          </a>]</span></p>
      @endforeach
    </div>
    <div class="r_box f_r">
      <div class="tit01">
        <h3 class="tit">关于我</h3>
        <div class="gzwm">
          <ul>
            <li><a class="email" href="javascript:void(0);" target="_blank" title="17625928503">我的电话</a></li>
            <li><a class="qq" href="javascript:void(0);" target="_blank" title="m15258036570@163.com">我的邮箱</a></li>
            <li><a class="tel" href="javascript:void(0);" target="_blank" title="1033609649">我的QQ</a></li>
            {{--<li><a class="prize" href="javascript:void(0);">个人奖项</a></li>--}}
          </ul>
        </div>
      </div>
      <!--tit01 end-->
      
      <div class="tuwen">
        <h3 class="tit">图文推荐</h3>
        <ul>
          @foreach($article as $t)
          <li><a href="{{url('content/id/'.$t->id)}}"><img src="{{$t->picname}}" onclick="num({{$t->id}})"><b>{{$t->title}}</b></a>
            <p><span class="tulanmu"><a href="{{url('list/cate_id/'.$t->cate_id)}}">@foreach($date as $dd)
                    @if($dd->id == $t->cate_id)
                      {{$dd->name}}
                    @endif
                  @endforeach</a></span><span class="tutime">{{date('Y-m-d H:i:s',$t->time)}}</span></p>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="ph">
        <h3 class="tit">点击排行</h3>
        <ul class="rank">
          @foreach($view as $dj)
          <li><a href="{{url('content/id/'.$dj->id)}}" title="{{$dj->tag}}" target="_blank" onclick="num({{$dj->id}})">{{$dj->title}}</a></li>
          @endforeach
            {{--<li><a href="/jstt/bj/2017-07-13/784.html" title="【心路历程】请不要在设计这条路上徘徊啦" target="_blank">【心路历程】请不要在设计这条路上徘徊啦</a></li>--}}
        </ul>
      </div>
      <div class="ad"> <img src="{{asset('resources/views/home/images/03.jpg')}}"> </div>
    </div>
  </div>
@endsection