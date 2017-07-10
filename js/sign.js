function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}
function checkit(){
     for(var i=0;i<document.form1.length;i++){ 
         var content=document.form1.elements[i].value;
         var content=trimStr(content);
         if(document.form1.elements[i].name=="id"&&document.form1.elements[i].value.substring(0,2)=="00"){
                alert("The administrator can not be sign ");           
                document.form1.elements[i].focus();
			 return false;
             break;
      }
        else if(content==""||document.form1.elements[i].value.length>20){
			 alert(document.form1.elements[i].name+"wrong");           
             document.form1.elements[i].focus();
			 return false;
             break;
         } 
     }
	 
}
