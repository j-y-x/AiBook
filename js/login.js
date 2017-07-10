function newDoc()
 {
	   window.open("search.php",'','','true');
	   
 }
 function newAgain()
 {
	   window.open("index.php",'','','true');
	   
 }
function checkit() {

    var name = document.getElementById('name');

    var password = document.getElementById('pwd');

    if(/^[\s\S]{0,4}$/g.test(name.value) ||/^[\s\S]{11,}$/g.test(name.value)|| /^[\s\S]{0,4}$/g.test(password.value)||/^[\s\S]{11,}$/g.test(password.value)) {     
         alert("login again");
    }
}

