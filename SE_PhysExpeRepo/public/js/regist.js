		$('.user-input').bind("keydown",function(){
			if(event.keyCode == 13) return false;
			else return true;
		});
		
		$('.user-input').bind("change",function(){
			browseApp = browser();
			if(browseApp!="FF"&&browseApp!="Safari"&&browseApp!="Chrome")
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
		
	