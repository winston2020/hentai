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
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


    <script type="">
        $('#check').click(function(){
            var date = $('#datepicker').val()

            window.location.href="{{url('spider/show')}}/?date="+date+'&host={{$_SERVER['HTTP_HOST']}}}';
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
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">选择域名
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">
            @foreach($host as $item)
                <li><a href="{{url('spider/show')}}?host=www.{{$item->name}}">{{ $item->name}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="btn-group">
       <span>优质蜘蛛IP段</span><H1>220.181.108</H1>
        <br>
        <span>低权重蜘蛛IP段</span><H1>123.125.71</H1>
    </div>


    <div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">

        <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%"
               aria-describedby="example_info" style="width: 100%;">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Name: activate to sort column ascending" aria-sort="ascending" style="width: 251px;">
                    蜘蛛
                </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Position: activate to sort column ascending" style="width: 402px;">ip段
                </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Office: activate to sort column ascending" style="width: 190px;">请求路径
                </th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                    aria-label="Salary: activate to sort column ascending" style="width: 149px;">来访时间
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($baidu as $item)
            <tr class="odd">
                <td class="sorting_1">{{$item->spidername}}</td>
                <td class=" ">{{$item->ip}}</td>
                <td class=" ">{{$item->path}}</td>
                <td class=" ">{{$item->created_at}}</td>
            </tr>
            @endforeach

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
