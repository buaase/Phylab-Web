function errorAlert(){
    alert("操作失败");
}
function createStar(ico,txt){
    var url="/user/star";
    var postData = "link="+encodeURI($('#collectBtn').attr('link'))+"&reportId="+labDoc3dot1415926.getDbId();
    PostAjax(url,postData,function(){
        if (this.readyState==4 && this.status==200){
            var jsonText = eval("(" + this.responseText + ")");
            //alert(this.responseText);
            //alert(jsonText["status"]);
            if(jsonText["status"]=='success'){
                $('#collectBtn').attr('dbid',jsonText['id']);
                ico.setAttribute("class","glyphicon glyphicon-star");
                txt.innerHTML = "取消收藏";
                alert("已添加至个人收藏夹！");
                document.getElementById('starIframe').contentWindow.location.reload(true);
            }
            else{
                errorAlert();
            }
        }
        else if(this.readyState==4 && this.status!=200){
            errorAlert();
        }
    });
}
function deleteStar(ico,txt){
    var url="/user/star";
    var postData = "_method=DELETE&id="+encodeURI($('#collectBtn').attr('dbid'));
    PostAjax(url,postData,function(){
        if (this.readyState==4 && this.status==200){
            var jsonText = eval("(" + this.responseText + ")");
            //alert(this.responseText);
            //alert(jsonText["status"]);
            if(jsonText["status"]=='success'){
                ico.setAttribute("class","glyphicon glyphicon-star-empty");
                txt.innerHTML = "收藏";
                alert("已取消收藏");
                document.getElementById('starIframe').contentWindow.location.reload(true);
            }
            else{
                errorAlert();
            }
        }
        else if(this.readyState==4 && this.status!=200){
            errorAlert();
        }
    });
}
function deleteStar(id){
    var url="/user/star";
    var postData = "_method=DELETE&id="+id;
    PostAjax(url,postData,function(){
        if (this.readyState==4 && this.status==200){
            var jsonText = eval("(" + this.responseText + ")");
            //alert(this.responseText);
            //alert(jsonText["status"]);
            if(jsonText["status"]=='success'){
                $('#star_'+id).hide("slow");
            }
            else{
                errorAlert();
            }
        }
        else if(this.readyState==4 && this.status!=200){
            errorAlert();
        }
    });
}
