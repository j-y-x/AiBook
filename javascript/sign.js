function checkit(){
     for(var i=0;i<document.form1.length;i++){ 
         if(document.form1.elements[i].name=="id"&&document.form1.elements[i].value.substring(0,2)=="00"){
                alert("����Ա�˺Ų���ע��");           
                document.form1.elements[i].focus();
			 return false;
             break;
      }
        else if(document.form1.elements[i].value==""){
			 alert(document.form1.elements[i].name+"��Ϊ��");           
             document.form1.elements[i].focus();
			 return false;
             break;
         } 
     }
	 
}