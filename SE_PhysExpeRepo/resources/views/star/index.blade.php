<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhyLabReportStar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>link</th>
                <th>time</th>
                <th>option</th>    
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i < count($stars);$i++)
                <tr id="star_{{$stars[$i]['id']}}">
                    <th scope="row">{{$i}}</th>
                    <td>{{$stars[$i]["name"]}}</td>
                    <td><button type="button" class="btn btn-default" onclick="window.open('{{URL::route('star').'/'.$stars[$i]['id']}}')"><a href="#">查看</a></button></td>
                    <td>{{$stars[$i]["time"]}}</td>
                    <td><button type="button" class="btn btn-primary" onclick="deleteStar('{{$stars[$i]['id']}}')">删除</button>
                </tr>
            @endfor
        </tbody>
    </table>
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/star.js"></script>
</body>
</html>