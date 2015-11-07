	
		function check(){
			SetDisable('btn-Signup',true);
		}
		$(function () {
			$('[data-toggle="popover"]').popover({
				html : true
			});
		})
		
		$('.user-input').bind("change",function(){
			browseApp = browser();
			if(browseApp!="FF"||browseApp!="Safari"||browseApp!="Chrome")
				patterns = this.title;
			else
				patterns = this.pattern;
			if(this.id=="CheckPwd"){
				if(this.value!=$('#InputPwd')[0].value){
					$(this).addClass("wrong-input");
					_setShowHide(this.id+'Alert',this.id+'Success')();
				}
				else{
					$(this).removeClass("wrong-input");
					_setShowHide(this.id+'Success',this.id+'Alert')();
				}
			}
			else if(!(new RegExp(patterns)).test(this.value)){
				$(this).addClass("wrong-input");
				_setShowHide(this.id+'Alert',this.id+'Success')();
			}
			else{
				$(this).removeClass("wrong-input");
				_setShowHide(this.id+'Success',this.id+'Alert')();
			}
		});	
		function setSignUpStatus(){
			if(document.getElementById('CheckLicense').checked) SetDisable('btn-Signup',false);
			else SetDisable('btn-Signup',true);
		}	
		function signUp(){
			var check = true;
			$('.user-input').each(function(){
				if($(this).hasClass("wrong-input")) check = false; 
				else if(this.value==""){
					$(this).addClass("wrong-input");
					_setShowHide(this.id+'Alert',this.id+'Success')();
				}
			});
			return check;
		}
		
		//function Post_user(){
		//	var xmlString = "user_name="+document.getElementById('InputUser').value
		//					+"&user_email="+document.getElementById('InputEmail').value
		//					+"&user_stu="+document.getElementById('InputStudent').value
		//					+"&user_pwd="+document.getElementById('InputPwd').value;
		//	PostXMLDoc("##",xmlString,function(){
		//		if (this.readyState==4 && this.status==200){
		//			window.open(this.responseText);
		//		}
		//})
	}
		
	