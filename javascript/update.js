function check(){
        if(document.getElementById("uinfo").value.substring(0,2)=="00"){return true;break;}

	else if(document.getElementById("uinfo").value.substring(0,2)!="00"){
	  alert("��û��Ȩ���޸�");
          window.event.returnValue=false;

}
}