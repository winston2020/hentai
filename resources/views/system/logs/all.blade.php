<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>蜘蛛统计</title>

    <link rel="stylesheet" type="text/css" href="{{url('common/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('common/dataTables.bootstrap.css')}}">
    <script type="text/javascript" language="javascript"
            src="{{url('common/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" language="javascript"
            src="{{url('common/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" language="javascript"
            src="{{url('common/dataTables.bootstrap.js')}}"></script>
    <script src="{{url('common/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
        });
    </script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            $('#example').dataTable();
        });
    </script>
</head>
<body style="">

<div class="container">
    <p>日期：<input type="text" id="datepicker"></p>
    <input type="button" id="check" value="点击查看">
    <script type="">
        $('#check').click(function(){
            var date = $('#datepicker').val()
            window.location.href="{{url('spider')}}/?date="+date;
        });

        function getQueryVariable(variable)
        {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i=0;i<vars.length;i++) {
                var pair = vars[i].split("=");
                if(pair[0] == variable){return pair[1];}
            }
            return(false);
        }

    </script>
    <div class="btn-group">

        <div class="container">

            <ul class="nav">
                <li class="dropdown" id="accountmenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">查看其他域名蜘蛛<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @foreach($host as $item)
                        <li><a href="{{url('spider/show')}}?host=www.{{$item->name}}">{{$item->name}}</a></li>
                        @endforeach
                </li>
            </ul>
        </div>
    </div>

    <div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">

        <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%"
               aria-describedby="example_info" style="width: 100%;">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Name: activate to sort column ascending" aria-sort="ascending" style="width: 251px;">日期
                </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Position: activate to sort column ascending" style="width: 402px;">百度蜘蛛
                </th>
                <th>
                    操作
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="odd">
                <td class="sorting_1">{{$date}}</td>
                <td class=" ">{{$baidu}}</td>
                <td ><a href="{{url('spider/show')}}?date={{$date}}">查看详情</a> </td>
            </tr>
            </tbody>
        </table>

    </div>

</div>

<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
        .removeClass('display')
        .addClass('table table-striped table-bordered');
</script>

</body>
</html>
