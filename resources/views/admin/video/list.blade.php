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
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('js/xadmin.js')}}"></script>
    <script type="text/javascript" src="{{url('css/app.css')}}"></script>
</head>

<body>
<div class="x-nav">
      <span class="layui-breadcrumb">
      </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
</div>
<div class="x-body">
        <a class="layui-btn"  onclick="x_admin_show('添加视频','/admin/video/add')" ><i class="layui-icon"></i>添加视屏</a>
        <span class="x-right" style="line-height:40px">共有数据：{{count($data)}} 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>视屏id</th>
            <th>视屏封面</th>
            <th>视屏名称</th>
            <th>视屏描述</th>
            <th>总话数</th>
            <th>当前更新</th>
            <th>查看详情</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key=>$item)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{$item->id}}</td>
                <td><img style="height: 100px;" src="{{$item->video_cover_img_url}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->all_number}}</td>
                <td>{{$item->renew_number}}</td>
                <th><a onclick="x_admin_show('章节列表','/admin/videochapter/{{$item->id}}')" >查看详情</a></th>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td class="td-manage">
                    <a title="修改视屏"  onclick="x_admin_show('修改新车信息','/admin/video/update?id={{$item->id}}')" >
                        <i class="layui-icon">&#xe631;</i>
                    </a>
                    <a title="删除視頻"  href="/admin/video/delete?id={{$item->id}}">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="page">
        <div>
            {{$data->links()}}
        </div>
    </div>


</div>
<script>
    $.ajax({
        dataType: "json", //返回值的类型 text为string型
        type: 'get',   //发送请求的方法(get)
        url: '/admin/getbrands',//发送请求的地址
        success: function (data) {//发送成功时的回调函数
            data.forEach(function(value, index, array) {
                $("#brands").append("<option value='"+ data[index].id +"'>" + data[index].name  +"</option>")
            });
        }
    })
    $(document).ready(function () {
        $("#brands").change(function () {
            $("#series").get(0).options.length= 1;
//            $("#qu").get(0).options.length= 1;
            var data = $("#brands").find("option:selected").val();
            console.log(data)
            $.ajax({
                data:{id:data},
                type:"get",
                dataType:"json",
                url:"/admin/getseries",
                success:function (data) {
                    data.forEach(function(value, index, array) {
                        $("#series").append("<option value='"+ data[index].id +"'>" + data[index].name  +"</option>")
                    });
                }
            })
        })
    })

    $(document).ready(function () {
        $("#series").change(function () {
            $("#cars").get(0).options.length= 1;
            var data = $("#series").find("option:selected").val();
            $.ajax({
                data:{id:data},
                type:"get",
                dataType:"json",
                url:"/admin/getcar",
                success:function (data) {
                    data.forEach(function(value, index, array) {
                        $("#cars").append("<option value='"+ data[index].id +"'>" + data[index].name  +"</option>")
                    });
                }
            })
        })
    })

    $(document).ready(function () {
        $("#cars").change(function () {
            $("#series").get(0).options.length= 1;
            var data = $("#series").find("option:selected").val();
            $.ajax({
                data:{id:data},
                type:"get",
                dataType:"json",
                url:"/admin/getcar",
                success:function (data) {
                    data.forEach(function(value, index, array) {
                        $("tbody").append("<tr>" +
                            "<td><div class='layui-unselect layui-form-checkbox' lay-skin='primary' data-id='2'><i class='layui-icon'></i></div></td>"+
                        "<td>"+data[index].id+"</td>"+
                        "<td>"+data[index].brand+"</td>"+
                        "<td><img height='20px' src='http://www.txcyh.cn/"+data[index].series_photo+"></td>"+
                            "<td>"+data[index].car_name+"</td>"+
                        "<td>"+data[index].created_at+"</td>"+
                        "<td class='td-manage'>" +
                            "<a title='查看新车' onclick='x_admin_show('查看新车','/admin/car/show?carid=44')' href='javascript:';)>"+
                            "<i class='layui-icon'></i>"+
                        "</a>"+
                        "<a title='修改新车' onclick='x_admin_show('修改新车信息','/admin/car/update?carid=44')' href='javascript:';)>"+
                            "<i class='layui-icon'></i>"+
                        "</a>"+
                        "<a title='删除新车' onclick='x_admin_show('删除数据','/admin/car/delete?carid=44')' href='javascript:';)>"+
                            "<i class='layui-icon'></i>"+
                        "</a>"+
                            "</td>"+
                        "</tr>")
                    });
                }
            })
        })
    })


</script>

</body>

</html>