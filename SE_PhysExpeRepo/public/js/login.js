 function Post_login(){
    postData="email="+encodeURI($('#InputAccount').val())+"&password="+encodeURI($('#InputPassword').val());
    if($('#IfRemember').prop('checked'))
        postData+="&remember="+$('#IfRemember').val();
    PostAjax("/login",postData,function(){
        if (this.readyState==4 && this.status==200){
            var jsonText = eval("(" + this.responseText + ")");
            //alert(this.responseText);
            //alert(jsonText["status"]);
            if(jsonText["status"]=='success'){
                window.location.href="/index";
            }
            else{
                $('#errorMessage').text(jsonText["message"]);
                $('#loginAlert').show();
            }
        }
        else if(this.readyState==4 && this.status!=200){
            var jsonText = eval("(" + this.responseText + ")");
            if(jsonText["code"]==904){
                $('#errorMessage').text(" 账号或密码不能为空");
            }
            else if(jsonText["code"]==101){
                $('#errorMessage').text(" 用户名或密码错误");
            }
            else{
                $('#errorMessage').text(" 未知错误");
            }
            $('#loginAlert').show();
        }
    });
}