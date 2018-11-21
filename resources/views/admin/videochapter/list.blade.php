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
    <a class="layui-btn"  onclick="x_admin_show('添加新视屏','/admin/videochapter/add?videoid={{$id}}')" ><i class="layui-icon"></i>添加新视屏</a>
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
            <th>动漫名</th>
            <th>视屏名称</th>
            <th>视屏描述</th>
            <th>当前集数</th>
            <th>视频源</th>
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
                <td><img style="height: 100px;" src="{{$item->cover_img_url}}"></td>
                <td>{{\App\Video::find($item->video_id)->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->number}}</td>
                <td>{{$item->video_url}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td class="td-manage">
                    <a title="修改视屏"  onclick="x_admin_show('修改新车信息','/admin/video/update?carid={{$item->id}}')" href="javascript:;">
                        <i class="layui-icon">&#xe631;</i>
                    </a>
                    {{--<a title="删除新车"  onclick="x_admin_show('删除数据','/admin/car/delete?carid={{$item->id}}')" href="javascript:;">--}}
                    {{--<i class="layui-icon">&#xe640;</i>--}}
                    {{--</a>--}}
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


</body>

</html>