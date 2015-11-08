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
                $('#errorMessage').text("&nbsp "+jsonText["message"]);
                $('#loginAlert').show();
            }
        }
        else if(this.readyState==4 && this.status!=200){
            var jsonText = eval("(" + this.responseText + ")");
            $('#errorMessage').text(jsonText["message"]);
            $('#loginAlert').show();
        }
    });
}