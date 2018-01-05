<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
    <script charset="utf-8" src="{{asset('resources/org/kindeditor/kindeditor-all-min.js')}}"></script>
    <script charset="utf-8" src="{{asset('resources/org/kindeditor/lang/zh-CN.js')}}"></script>
</head>
<body>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/welcome')}}">首页</a> &raquo; 文章管理
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加文章</h3>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            {{--<a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>--}}
            <a href="{{url('admin/article/index')}}"><i class="fa fa-recycle"></i>全部文章</a>
            <a href="javascript:location.reload();"><i class="fa fa-refresh"></i>刷新</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/article/update')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$article->id}}">
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120">分类：</th>
                <td>
                    <select name="cate_id">
                        @foreach($cate as $d)
                        <option value="{{$d->id}}"
                            @if($d->id==$article->cate_id)
                                selected
                            @endif
                        >{{$d->names}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i> 文章标题：</th>
                <td>
                    <input type="text" class="lg" name="title" value="{{$article->title}}">
                </td>
            </tr>
            <tr>
                <th>作者：</th>
                <td>
                    <input type="text" class="sm" name="auther" value="{{$article->auther}}">
                </td>
            </tr>
            <tr>
                <th>缩略图：</th>
                <td>
                    <input type="text" name="picname" id="thumbnail"  size="30" class="inpMain" value="{{$article->picname}}"/>
                    <button id="Upload_img" class="btn" type="button">上传</button>
                    <div style="display: none;">
                        <input id="imgFile" type="file" name="imgFile" style="display: none;">
                    </div>
                    <div id="res_show_img" style="display: none;"></div>
                    <script type="text/javascript">
                        //上传缩略图
                        $(function (){
                            //kindeditor
//        var editor;
//        KindEditor.ready(function(K) {
//            editor = K.create('#kindeditor');
//        });
                            //如果有图片就显示
                            if($("#thumbnail").val() != '' && $("#thumbnail").val() != null){
                                $("#res_show_img").show();
                                $("#res_show_img").html('<img src="'+$("#thumbnail").val()+'" width="150px">');
                            }

                            $("#Upload_img").click(function (){
                                $("#show_Img").html('');
                                $("#show_Img").css('display','none');
                                $("#imgFile").click();
                            });
                            $("#imgFile").change(function(){
                                $("#Upload_img").html('上传中...');
                                var tmp_path = $("#imgFile").val();
                                if(tmp_path != '' && tmp_path != null){
                                    var pic = $('#imgFile')[0].files[0];
                                    var fd = new FormData();
                                    fd.append('imgFile', pic);
                                    $.ajax({
                                        url:"{{url('resources/org/kindeditor/php/upload_json.php')}}",
                                        type:"post",
                                        dataType:'json',
                                        data: fd,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success:function(data){
                                            if(data && data.error == '0'){
                                                $("#res_show_img").show();
                                                var imgurl = data.url;
                                                $("#res_show_img").html('<img src="'+imgurl+'" width="150px">');
                                                $("#thumbnail").val(imgurl);
                                                layer.msg('上传成功');
                                            }else{
                                                layer.msg(data.message);
                                            }
                                            $("#Upload_img").html('重新上传');
                                        },
                                        error:function (){
                                            $("#Upload_img").html('重新上传');
                                        }
                                    });
                                }
                            });
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <img src="" alt="" id="art_thumb_img" style="max-width: 350px; max-height:100px;">
                </td>
            </tr>
            <tr>
                <th>标签：</th>
                <td>
                    <input type="text" class="lg" name="tag" value="{{$article->tag}}">
                </td>
            </tr>
            <tr>
                <th>描述：</th>
                <td>
                    <textarea name="desc" >{{$article->desc}}</textarea>
                </td>
            </tr>

            <tr>
                <th>文章内容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
                    <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                    <script id="editor" name="content" type="text/plain" style="width:860px;height:500px;">{!! $article->content !!}</script>
                    <script type="text/javascript">
                        var ue = UE.getEditor('editor');
                    </script>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
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

