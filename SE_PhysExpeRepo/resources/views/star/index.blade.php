<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhyLabReportStar</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
	<div class="table-autoscroll well">
    <table class="table table-condensed table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>实验报告</th>
                <th>链接</th>
                <th>收藏时间</th>
                <th>编辑</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=0;$i < count($stars);$i++)
                <tr id="star_{{$stars[$i]['id']}}">
                    <th scope="row">{{$i}}</th>
                    <td>{{$stars[$i]["name"]}}</td>
                    <td><button type="button" class="btn btn-default" onclick="window.open('{{URL::route('star').'/'.$stars[$i]['id']}}')"><a href="#">查看</a></button></td>
                    <td>{{$stars[$i]["time"]}}</td>
                    <td>
						<div class="btn-group btn-block">
							<button type="button" class="btn btn-default" onclick="window.open('{{URL::route('starDownload').'/'.$stars[$i]['id']}}')">下载</button>
							<button type="button" class="btn btn-danger" onclick="deleteStar('{{$stars[$i]['id']}}')">删除</button>
						</div>
					</td>
                </tr>
            @endfor
        </tbody>
    </table>
	</div>
    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/global.js"></script>
    <script src="../js/star.js"></script>
</body>
</html>
