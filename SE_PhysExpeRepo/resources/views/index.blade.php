<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhyLabHome</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/seven-style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mystyle.css')}}">
</head>
<body style="background-color:#222;">
<div class="modal fade" id="mymodal-signin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title lead">登录PhyLab</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="{{URL::route('login')}}">
                    {!! csrf_field() !!}
					<div class="alert alert-danger" role="alert" id="loginAlert" style="display:none;height:30px;padding:5px;">
                        <span class="glyphicon glyphicon-remove-sign"></span><span id="errorMessage">&nbsp 用户名或密码错误!</span>
                    </div>
                    <div class="form-group">
                        <label for="InputAccount" class="col-md-2 control-label">账号</label>
                        <div class="input-group col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="email" class="form-control" id="InputAccount" placeholder="请输入您的账号" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword" class="col-md-2 control-label">密码</label>
                        <div class="input-group col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-eye-close"></span></span>
                            <input type="password" class="form-control" id="InputPassword" placeholder="请输入您的密码" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-4">
                            <div class="checkbox">
                                <label><input type="checkbox" id="IfRemember" name="remember">记住密码</input></label>
                            </div>
                        </div>
                        <div class="col-md-offset-3 col-md-3" style="float:right"><a href="##">忘记密码?</a></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="Post_login()" class="btn btn-primary btn-lg btn-block lead"><span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp&nbsp登录！&nbsp </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@if($auth)
<!--star modal-->
<div class="modal fade" id="mymodal-star">
    <div class="modal-dialog modal-lab">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title lead">报告收藏夹</h4>
            </div>
            <div class="well" style="padding:0px;">
                <iframe src="{{URL::route('star')}}" style="width:100%;height:75%" frameborder="0"></iframe>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif

<div class="wrapper wrapper_navbar_top">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
         　  <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="./img/phylab_logo_single.svg" href="##" style="float:left;margin:0 0 0 20px;height:50px;"></img>
            <a class="navbar-brand" href="##" style="margin:0 40px 0 0px;">PhyLab</a>
        </div>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="##"><span class="glyphicon glyphicon-home"></span>&nbsp主页</a></li>
                <li><a href="##">社区</a></li>
                <li class="dropdown">
                    <a href="##" data-toggle="dropdown" class="dropdown-toggle">服务<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a data-toggle="modal" @if (!$auth) data-target="#mymodal-signin" @else href="{{URL::route('report')}}"@endif><span class="glyphicon glyphicon-flag"></span>&nbsp实验报告中心</a></li>
                        <li class="disabled"><a>其他功能</a></li>
                    </ul>
                </li>
                <li><a href="##">关于</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (!$auth)
                <div class="btn-group btn-block" rol="Sign" style="padding:10px 40px 0 20px;">
                    <button class="btn btn-success sym-nav-signup" type="button" id="Sign_up" onclick="window.location.href='{{URL::route('register')}}'">&nbsp&nbsp注册&nbsp&nbsp</button>
                    <button class="btn btn-default sym-nav-signin" data-toggle="modal" data-target="#mymodal-signin" type="button" id="Sign_in">&nbsp&nbsp登录&nbsp&nbsp</button>
                </div>
                @else
                <!--<li><a href="{{URL::route('user')}}">{{$username}}的个人中心</a></li>-->
                <li><a data-toggle="modal" data-target="#mymodal-star" href="#">{{$username}}的收藏夹</a></li>
                <li><a href="{{URL::route('logout')}}">登出</a></li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<div class="wrapper wrapper_contents">
    <div class="container-fluid hidden-xs" style="position:relative;">
        <div id="slidershow" class="carousel slide carousel-fade">
            <ol class="carousel-indicators">
                <li data-target="#slidershow" data-slide-to="0" class="active"></li>
                <li data-target="#slidershow" data-slide-to="1"></li>
                <li data-target="#slidershow" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="./img/QuantumPhysics2.jpg" alt=""  ></img>
                </div>
                <div class="item">
                    <a href="##" data-toggle="modal" @if (!$auth) data-target="#mymodal-signin" @else onclick="window.location.href='{{URL::route('report')}}'"@endif><img src="./img/quantumislam.jpg" alt=""></img></a>
                </div>
                <div class="item">
                    <a href="##" onclick="window.open('http://shang.qq.com/wpa/qunwpa?idkey=696b1441fb818e845d04c16e329e0e753e1659e0b07676fdc45dad02b506f1a2','_blank');"><img src="./img/format2.jpg" alt=""></a>
					<div class="carousel-caption" style="padding-bottom:10%;">
                        <a href="##" class="Title" data-toggle="modal" onclick="window.open('http://shang.qq.com/wpa/qunwpa?idkey=696b1441fb818e845d04c16e329e0e753e1659e0b07676fdc45dad02b506f1a2','_blank');">—— Join PhyLab Community ——</a>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#slidershow" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#slidershow" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
	<div class="container-fluid visible-xs" style="position:relative;">
		<div>
			<img class="img-responsive" src="./img/QuantumPhysics2.jpg" alt=""  ></img>
		</div>
		<div>
			<a href="##" data-toggle="modal" @if (!$auth) data-target="#mymodal-signin" @else onclick="window.location.href='{{URL::route('report')}}'"@endif><img class="img-responsive" src="./img/quantumislam.jpg" alt=""></img></a>
		</div>
		<div>
			<a href="##" onclick="window.open('http://shang.qq.com/wpa/qunwpa?idkey=66a700596900ff2f3f2dbe90ae35c2dcb4f769951a9275014add22bf9c2bbaae','_blank');"><img class="img-responsive" src="./img/format2.jpg" alt=""></img></a>
			<p onclick="window.open('http://shang.qq.com/wpa/qunwpa?idkey=66a700596900ff2f3f2dbe90ae35c2dcb4f769951a9275014add22bf9c2bbaae','_blank');" class="Title" style="position:relative;bottom:50px;text-align:center;">—— Join PhyLab Community ——</p>
		</div>
	</div>
</div> 
<div class="wrapper wrapper_navbar_foot">
    <nav class="navbar navbar-inverse navbar-fixed-bottom" style="min-height:20px;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right"  style="padding-top:0.25%;">
                <li class="text-white ch" style="float:right;opacity:0.7;font-size:13px">Developed By BUAA-SCSE 软件攻城队&nbsp &nbsp &nbsp &nbsp &nbsp </li>
            </ul>
        </div>
    </nav>
</div>

 <script src="./js/jquery-2.1.4.min.js"></script>
 <script src="./js/bootstrap.min.js"></script>
 <script src="./js/global.js"></script>
 <script src="./js/login.js"></script>
 <script src="./js/statistics.js"></script>
</body>
</html>
