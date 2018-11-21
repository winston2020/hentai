@extends('layout.video')
@if($user==null)
    @section('title','用户登录')
    @section('keywords','用户登录')
    @section('description','用户登录')
@else
    @section('title',$user->name.'的个人空间')
    @section('keywords',$user->name.'的个人空间')
    @section('description',$user->name.'的个人空间')
@endif

@section('content')
    @if(!\Illuminate\Support\Facades\Auth::check())
    <div class="alert alert-danger" role="alert" style="margin-top: 20px">
        <h4 class="alert-heading" style="text-align: center">欢迎来到Hentaiclub</h4>
        <h3 class="alert-heading" style="text-align: center">登陆后可查看会员的世界哟(＾Ｕ＾)ノ~ＹＯ</h3>
        <hr>
    </div>
    @else
    <div class="container" style="margin-top: 20px">

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <ul class="list-group">
                    <li class="list-group-item disabled"><a style="text-decoration:none;" href="#">我喜欢的漫画(功能开发中...)</a></li>
                    <li class="list-group-item disabled"><a style="text-decoration:none;" href="{{url('logout')}}">退出登录</a></li>
                    <li class="list-group-item">
                        <a style="text-decoration:none;">有什么想对我们说的吗？<b id="msg"></b></a>
                        <form id="liuyan">
                        <div class="form-group">
                            <textarea class="form-control" name="content" id="userliuyan" rows="3"></textarea>
                        </div>
                            <button type="button" onclick="liuyan()" class="btn btn-info">发送留言</button>
                        </form>
                        <script>
                            function liuyan() {
                                content = $("#userliuyan").val()
                                if (content==''){
                                    $("#msg").html('<span style="color: red">留言不能为空哦</span>')
                                    return
                                }
                                $.ajax({
                                    url:'/u/liuyan',
                                    type:'post',
                                    dataType:'json',
                                    data:$("#liuyan").serialize(),
                                    success:function (data) {
                                        if (data.status ==200){
                                            $("#msg").html('<span style="color: red">您的留言我们已经收到了哦</span>')
                                        }else{
                                            $("#msg").html('<span style="color: red">发送失败。可能网络不太好哦</span>')
                                        }
                                    }
                                })
                            }
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    @endsection