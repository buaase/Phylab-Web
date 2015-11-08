	
		$('.user-input').bind("change",function(){
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
            else if(!(new RegExp(this.pattern)).test(this.value)){
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
            $('[data-toggle="popover"]').popover();
        })
		
	