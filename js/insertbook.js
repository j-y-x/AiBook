function trimStr(str){return str.replace(/(^\s*)|(\s*$)/g,"");}
function checkit(){
    for(var i=0;i<document.form1.length;i++){ 
         var content=document.form1.elements[i].value;
         var content=trimStr(content);
         if(content==""){
			 alert(document.form1.elements[i].name+"Not null");           
             document.form1.elements[i].focus();
			 return false;
             break;
         } 
     }
	 
}