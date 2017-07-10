<?xml version="1.0" encoding="gb2312"?>

<!DOCTYPE html>
<html>
<head>
  <meta name="keywords" content="php,css,js,html5,jquery"></meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> </meta>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
  <meta http-equiv="empires" content="9,oco,2016"></meta>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312" /></meta>
  <title>login Aibook</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <?php
    $conn=mysql_connect("localhost","root","")or die("数据库未连接".mysql_error());
    mysql_select_db("test",$conn);
  ?>
  <script language="javascript" src="js/login.js"> #引用login.js文件
  </script>
  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script> #引用jquery文件
</head>
  <?php 
     @session_start();
  ?>
<body>
  <div class="wrapper">
	  <div class="container">
		  <h1 name="h1">Welcome to Aibook System</h1>
		  <form class="form" method="post" action="index.php" name="form">
		        <input type="hidden" name="ident" id="ident" value="0"/>
			    <input type="text" placeholder="UserId" id="name" name="name">
			    <input type="password" placeholder="Password"  id="pwd" name="pwd">
          <input type="submit" id="submit" name="submit" value="Login" onClick="checkit()"><br/><br/>
             <a href="sign.php">Register</a>
       </form>
	</div>
    <ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	  </ul>
	</div>
  <?php
      $select=mysql_query("select * from userinfo where User_Id='".$_POST['name']."' and Password='".$_POST['pwd']."'",$conn);
      
      if(isset($_POST['submit']) and $_POST['name']!=null and $_POST['pwd']!=null){
	      $id=$_POST['name'];
          if(mysql_num_rows($select)==1&&substr($_POST['name'],0,2)=="00"){
              echo"<script>document.getElementById('ident').value='1';window.location.href='admin.php';</script>";
          }
          
		      else if((mysql_num_rows($select)==1&&substr($_POST['name'],0,2)!="00")){
			     $_SESSION['only']=$_POST['name'];
		         echo "<script>document.getElementById('ident').value='1';window.location.href='homepage.php?User_Id=$id';</script>";
		      } 
      
          else{
            echo"<script> alert('登陆失败');window.location.href='index.php'</script>";
          }
          
       }
?>

  
  <script type="text/javascript">
    $('#submit').click(function(event){
		    $('form').fadeOut(500);		  
	        $('.wrapper').addClass('form-success');
    });
  </script>
</body>
</html>