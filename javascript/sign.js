function checkit(){
     for(var i=0;i<document.form1.length;i++){ 
         if(document.form1.elements[i].name=="id"&&document.form1.elements[i].value.substring(0,2)=="00"){
                alert("管理员账号不能注册");           
                document.form1.elements[i].focus();
			 return false;
             break;
      }
        else if(document.form1.elements[i].value==""){
			 alert(document.form1.elements[i].name+"不为空");           
             document.form1.elements[i].focus();
			 return false;
             break;
         } 
     }
	 
}