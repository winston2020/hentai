<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="{{url('favicon.ico')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{url('css/font.css')}}">
    <link rel="stylesheet" href="{{url('css/xadmin.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{url('lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('js/xadmin.js')}}"></script>
</head>
<body class="login-bg">
<div class="login layui-anim layui-anim-up">
    <div class="message">后台登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" >
        {{csrf_field()}}
        <input name="name" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>

<script>


    $(function  () {
        layui.use('form', function(){
            var form = layui.form;
            // layer.msg('玩命卖萌中', function(){
            //   //关闭后的操作
            //   });
            //监听提交
            form.on('submit(login)', function(data){
                userdata = data.field
                url = '/web/login'
                $.ajax({
                    data:userdata,
                    url:url,
                    type:"POST",

                    success:function (res) {
                        if (res.status==200){
                            location.href="/admin/home"
                        }else{
                            layer.msg(res.msg,function(){

                            });
                        }

                    }
                });
                return false;
            });
        });
    })


</script>


<!-- 底部结束 -->
</body>
</html>