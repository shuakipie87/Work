 function validateform($form,fields){
	var flag =true;
	for(var i=0; i<fields.length;i++){
		console.log(fields[i]);
		$form.children().find("#"+fields[i]).val('1231');
		flag=false;
	}
	
	return flag;
}
$.fn.FormValidate=function(fields){
	this.submit(function(e){
			var flag =true;
			for(var i=0; i<fields.length;i++){
				//console.log(fields[i]);
				$child=$(this).children().find("#"+fields[i])
				var data=$(this).children().find("#"+fields[i]).val();
				//console.log(data);
				if(data=="" || data=="undefined")
				{
					$child.css("border","1px solid red");
					flag=false;
				}
			}
			if(flag==false){
				e.preventDefault();
				return flag;
			}
			
		});
	
}