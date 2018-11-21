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
    <style type="text/css">
        body{
            padding:0;
            margin:0;
            color:#444;
            background:#f2f2f2;
        }
        *{
            padding:0;
            margin:0;
            border:0;
            list-style: none;
            text-decoration: none;
        }

        .label-selected{
            width: 100%;
            min-height:38px;
            margin:10px 0;
            border:1px solid #ccc;
            background-color: #fff;
            position: relative;
        }
        .cell{
            display: block;
            width:90px;
            height:28px;
            line-height: 28px;
            border:3px;
            background:#009688;
            color:#fff;
            text-align: center;
        }
        .label-selected li {
            display: inline-block;
            height: 27px;
            line-height: 27px;
            font-size: .8rem;
            padding: 0 1rem;
            border: 1px solid #e6e6e6;
            border-radius: 2px;
            cursor: pointer;
            margin: 4px 2px;
            color: #666;
        }
        #labelItem{
            margin-bottom: 10px;
            display: none;
        }
        .label-item {
            border: 1px solid #e6e6e6;
            padding: 10px;
            border-radius: 0 2px 2px 0;
            position: relative;
            overflow: hidden;
            background: #fff;
        }
        .label-item li {
            display: inline-block;
            height: 27px;
            line-height: 27px;
            font-size: .8rem;
            padding: 0 1rem;
            border: 1px solid #e6e6e6;
            border-radius: 2px;
            cursor: pointer;
            margin-bottom: 5px;
            margin-left: 2px;
            color: #666;
        }
        .label-item .selected{
            color:#ccc;
        }
    </style>
</head>

<body>
<div class="x-body">
    <form class="layui-form" method="post" action="/admin/video/doadd/"  id="video">
        {{csrf_field()}}
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视屏名称
            </label>
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
                    <input id="img_true_url" value="" name="video_cover_img_url"  style="display: none">
                </div>
            </div>
        </div>



        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>总集数
            </label>
            <div class="layui-input-inline">
                <input type="text" id="title"  name="all_number" required="" value="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>当前更新集数
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username"  name="current_number" required="" value="" lay-verify="required"
                       autocomplete="off" class="layui-input">
            </div>
        </div>




        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>視頻標籤
            </label>
            <div class="layui-input-inline">
                @foreach(\App\VideoTag::all() as $item)
                    <input type="checkbox" name="tagid[]" title="{{$item->name}}"  value="{{$item->id}}" lay-skin="primary" >
                @endforeach
            </div>
        </div>
        <script>
            $('input:checkbox').each(function() {
                if ($(this).attr('checked') ==true) {
                    alert($(this).val());
                }
            });
        </script>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视频归属板块
            </label>
            <div class="layui-input-inline">
                <select name="video_type_id">
                    <option></option>
                    @foreach(\App\VideoType::all() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视频状态
            </label>
            <div class="layui-input-inline">
                <select name="video_status">
                    <option></option>
                    <option value="0">连载</option>
                    <option value="1">完结</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>视频描述
            </label>
            <div class="layui-input-inline">
                <textarea type="text" style="width: 600px; height: 200px;" id="username"  name="description" required="" value="" lay-verify="required"
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

        form.on('submit(add)', function(data){
            var videotype = $('.type').val();
            if(videotype == -1){
                layer.msg('请选择类型');
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
            }
        });
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
            ,url: '/api/admin/video/upload'
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