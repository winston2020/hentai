<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="{{url('favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{url('css/font.css')}}">
    <link rel="stylesheet" href="{{url('css/xadmin.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('js/xadmin.js')}}"></script>

</head>

<body>
<div class="x-body">
    <form class="layui-form" method="post" action="/admin/videochapter/doadd/"  id="video">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视屏名称
            </label>
            <input type="text" id="title" style="display: none"  name="video_id"  value="{{$videoid}}"
                   autocomplete="off" class="layui-input">

            <div class="layui-input-inline">
                <input type="text" id="title"  name="name" required="" value="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视屏封面
            </label>
            <div class="layui-input-inline">
                <div class="layui-upload">
                    <button type="button" class="layui-btn"  id="upload_cover_img">上传图片</button>
                    <div class="layui-upload-list">
                        <img  style="width: 200px;height: 100px;" class="layui-upload-img"   id="demo1">
                        <p id="demoText"></p>
                    </div>
                    <input id="img_true_url" value="" name="cover_img_url"  style="display: none">
                </div>
            </div>
        </div>


        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>第几集
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username"  name="number" required="" value="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视频解析源
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username"  name="video_url" required="" value="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>当前描述
            </label>
            <div class="layui-input-inline">
                <textarea type="text" style="width: 600px; height: 200px;"  name="description" required="" value="" lay-verify="required"
                          autocomplete="off" class="layui-input"> </textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button  class="layui-btn" lay-submit lay-filter="add" >
                增加视屏
            </button>
        </div>
    </form>
</div>

</div>
<script>

    layui.use(['form', 'jquery', 'layer'], function () {
        var $ = layui.jquery
            , layer = layui.layer
            ,form = layui.form;

    });

    layui.use('upload', function(){
        var upload = layui.upload;
        var tag_token = $(".tag_token").val();
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#upload_cover_img'
            ,type : 'images'
            ,exts: 'jpg|png|gif' //设置一些后缀，用于演示前端验证和后端的验证
            //,auto:false //选择图片后是否直接上传
            //,accept:'images' //上传文件类型
            ,url: '/api/admin/videochapter/upload'
            ,data:{'_token':tag_token}
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('.layui-upload-img').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                console.log(res)
                if(res.status == 1){
                    $('#img_true_url').attr('value', res.data.url); //图片链接（base64）
                    return layer.msg('上传成功');
                }else{//上传成功
                    layer.msg(res.message);
                }
            }
            ,error: function(){
                //演示失败状态，并实现重传
                return layer.msg('上传失败,请重新上传');
            }
        });
    });
</script>

</body>

</html>