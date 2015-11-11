<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PhyLabRegist</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/seven-style.css">
    <link rel="stylesheet" href="./css/mystyle.css">
</head>


<body onload="check()">
    
    <div class="modal fade" id="mymodal-signin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title lead">登录PhyLab</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="InputAccount" class="col-md-2 control-label">账号</label>
                            <div class="input-group col-md-9">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="email" class="form-control" id="InputAccount" placeholder="请输入您的账号">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword" class="col-md-2 control-label">密码</label>
                            <div class="input-group col-md-9">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-eye-close"></span></span>
                                <input type="password" class="form-control" id="InputPassword" placeholder="请输入您的密码">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="IfRemember">记住密码</input></label>
                                </div>
                            </div>
                            <div class="col-md-offset-3 col-md-3" style="float:right"><a href="##">忘记密码?</a></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block lead"><span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp&nbsp登录！&nbsp</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>
    <!-- Signup Screen -->
    <div class="nav navbar-inverse navbar-fixed-top"style="text-align:center;position:relative;">
        <a href="./index.html"><img style="width:20%;height:auto;" src="./img/phylab_logo_white.svg" /></a>
    </div>
    <div class="container-fluid" style="margin-top:1%;">
        <form method="POST" action="/register" class="login-wrapper">
            <div class="form-group row">
                <div class="input-group col-md-offset-4 col-md-4">
                    <label for="InputUser" class="sr-only">用户名</label>
                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                    </div>
                    <input class="form-control user-input input-lg" id="InputUser" type="text" name="name" value="{{ old('name') }}" placeholder="请输入您的用户名" maxlength="20" pattern="^([a-zA-Z0-9_]|[\u4E00-\u9FA5]){1,20}$" required/>
                </div>
                <div class="alert alert-danger col-md-4 login-alert" id="InputUserAlert" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-remove-sign"></span><strong>&nbsp </strong><span>&nbsp 用户名格式不正确，应由字母、数字、下划线构成</span>
                </div>
                <div class="login-success" id="InputUserSuccess" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-ok-sign"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group col-md-offset-4 col-md-4">
                    <label for="InputEmail" class="sr-only">邮箱</label>
                    <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
                    <input class="form-control user-input input-lg" id="InputEmail" type="text" name="email" value="{{ old('email') }}" placeholder="您的邮箱：emai@domain.com" maxlength="30" pattern="^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$" required/>
                </div>
                <div class="alert alert-danger col-md-4 login-alert" id="InputEmailAlert" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-remove-sign"></span><strong>&nbsp </strong><span>&nbsp 邮箱格式不正确</span>
                </div>
                <div class="login-success" id="InputEmailSuccess" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-ok-sign"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group col-md-offset-4 col-md-4">
                    <label for="InputStudent" class="sr-only">学号</label>
                    <div class="input-group-addon"><span class="glyphicon glyphicon-tags"></span></div>
                    <input class="form-control user-input input-lg" id="InputStudent" type="text" name="student_id" placeholder="您的学号：xx-xx-xxxx" maxlength="8" pattern="^\d{8}$" required/>
                </div>
                <div class="alert alert-danger col-md-4 login-alert" id="InputStudentAlert" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-remove-sign"></span><strong>&nbsp </strong><span>&nbsp 学号格式不正确，应当为八位数字</span>
                </div>
                <div class="login-success" id="InputStudentSuccess" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-ok-sign"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group col-md-offset-4 col-md-4">
                    <label for="InputPwd" class="sr-only">密码</label>
                    <div class="input-group-addon"><span class="glyphicon glyphicon-eye-close"></span></div>
                    <input class="form-control user-input input-lg" id="InputPwd" type="password" name="password" placeholder="设置密码：6-12位 由字母数字组成" maxlength="12" pattern="^[0-9a-zA-z]{6,12}$" required/>
                </div>
                <div class="alert alert-danger col-md-4 login-alert" id="InputPwdAlert" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-remove-sign"></span><strong>&nbsp </strong><span>&nbsp 密码格式不正确，应当由6至12位字母数字组成</span>
                </div>
                <div class="login-success" id="InputPwdSuccess" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-ok-sign"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group col-md-offset-4 col-md-4">
                    <label for="CheckPwd" class="sr-only">确认密码</label>
                    <div class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></div>
                    <input class="form-control user-input input-lg" id="CheckPwd" type="password" name="password_confirmation" placeholder="确认密码" maxlength="12" pattern="^[0-9a-zA-z]{6,12}$" required/>
                </div>
                <div class="alert alert-danger col-md-4 login-alert" id="CheckPwdAlert" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-remove-sign"></span><strong>&nbsp </strong><span>&nbsp 两次输入密码不一致！</span>
                </div>
                <div class="login-success" id="CheckPwdSuccess" role="alert" style="display:none;">
                    <span class="glyphicon glyphicon-ok-sign"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-offset-4 col-md-4">
                    <label class="checkbox text-left">
                    <input id="CheckLicense" type="checkbox" onclick="setSignUpStatus()"><span>我已阅读并同意<a tabindex="0" role="button" data-toggle="popover" data-trigger="hover" title="PhyLab用户协议" data-content="1. 有个卵的用户协议" id="License">《用户协议》</a>&nbsp </span></label>
                </div>
            </div>
            <div class="row" style="margin-bottom:40px;">
                <div class="col-md-offset-4 col-md-4">
                    <input class="btn btn-lg btn-success btn-block " id="btn-Signup" type="button" onclick="signUp()" value="注册！">
                                        <button type="submit" style="display:none" id="register-post">Register</button>
                    <hr/>
                    <p><b>
                      已有账号?
                    </b></p>
                    <a class="btn btn-default-outline btn-block" data-toggle="modal" data-target="#mymodal-signin" type="button" id="Sign_in">立即登录</a>
                </div>
            </div>
        </form>
    </div>
    <div class="wrapper wrapper_navbar_foot">
        <nav class="navbar navbar-inverse navbar-fixed-bottom" style="min-height:20px;">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-right text-ch"  style="padding-top:0.25%;">
                    <li class="text-white text-ch" style="float:right;opacity:0.7;font-size:13px">Developed By BUAA-SCSE 软件攻城队&nbsp &nbsp &nbsp &nbsp &nbsp </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- End Signup Screen -->
    <script src="./js/jquery-2.1.4.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/global.js"></script>
    <script src="./js/xmlInteraction.js"></script>
	<script src="./js/regist.js"></script>
  </body>

</html>