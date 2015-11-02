var reg = new RegExp("^10(11|12|21|22|31|41|42|51|61|62|71|81|82|91)$");
	
	function collect(ico_id,txt_id){
		var ico = document.getElementById(ico_id);
		var txt = document.getElementById(txt_id);
		var check = txt.innerHTML;
			if(check=="取消收藏"){
				ico.setAttribute("class","glyphicon glyphicon-star-empty");
				txt.innerHTML = "收藏";
			}
			else if(check=="收藏"){
				ico.setAttribute("class","glyphicon glyphicon-star");
				txt.innerHTML = "取消收藏";
			}
			else
				alert("Button text can not be [txt] when use this function!Please Use 收藏/取消收藏");
	}
	function SelectLab(index,ref)
	{
		var lt = document.getElementById(ref);
			if(reg.test(index)){
				lt.innerHTML = index;
				return true;
			}
			else{
				return false;
			}
	}
	function InputLab(id_input,ref)
	{
		var index = document.getElementById(id_input).value;
		var lt = document.getElementById(ref);
			if(reg.test(index)){
				lt.innerHTML = index;
				return true;
			}
			else{
				return false;
			}
	}
	function SetDisable(index,if_disable)
	{
		var item = document.getElementById(index);
		if(if_disable)
			item.setAttribute("disabled","disabled");
		else
			item.removeAttribute("disabled")
	}