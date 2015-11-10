		$('.user-input').bind("keydown",function(){
			if(event.keyCode == 13) return false;
			else return true;
		});
		
		$('#InputUser').bind('change',function(){
			var patterns = "^([a-zA-Z0-9_]|[\u4E00-\u9FA5]){1,20}$";
			if(!(new RegExp(patterns)).test(this.value)){
                $(this).addClass("wrong-input");
                _setShowHide(this.id+'Alert',this.id+'Success')();
            }
            else{
                $(this).removeClass("wrong-input");
                _setShowHide(this.id+'Success',this.id+'Alert')();
            }
		})
		
		$('#InputEmail').bind('change',function(){
			var patterns = "^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$";
			if(!(new RegExp(patterns)).test(this.value)){
                $(this).addClass("wrong-input");
                _setShowHide(this.id+'Alert',this.id+'Success')();
            }
            else{
                $(this).removeClass("wrong-input");
                _setShowHide(this.id+'Success',this.id+'Alert')();
			}
		})
		
		$('#InputStudent').bind('change',function(){
			var patterns = "^\\d{8}$";
			if(!(new RegExp(patterns)).test(this.value)){
                $(this).addClass("wrong-input");
                _setShowHide(this.id+'Alert',this.id+'Success')();
            }
            else{
                $(this).removeClass("wrong-input");
                _setShowHide(this.id+'Success',this.id+'Alert')();
			}
		})
		
		$('#InputPwd').bind('change',function(){
			var patterns = "^[0-9a-zA-z]{6,12}$";
			if(!(new RegExp(patterns)).test(this.value)){
                $(this).addClass("wrong-input");
                _setShowHide(this.id+'Alert',this.id+'Success')();
            }
            else{
                $(this).removeClass("wrong-input");
                _setShowHide(this.id+'Success',this.id+'Alert')();
			}
		})
		
		$('#CheckPwd').bind('change',function(){
			if(this.value!=$('#InputPwd')[0].value){
                $(this).addClass("wrong-input");
                _setShowHide(this.id+'Alert',this.id+'Success')();
            }
            else{
                $(this).removeClass("wrong-input");
                _setShowHide(this.id+'Success',this.id+'Alert')();
            }
		})
        
        function check(){
            SetDisable('btn-Signup',true);
        }
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
			$('#register-post').click();
		}
		
		$(function () {
			$('[data-toggle="popover"]').popover({
				html : true
			});
		})
		
	