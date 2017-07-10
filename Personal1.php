<?xml version="1.0" encoding="gb2312"?>
<html>
<title>
ChangePassword
</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<meta name="keywords" content="Coffee-House Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.useso.com/css?family=Exo:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
</head>
<body>
<?php
   @session_start();
   ?>
<!--banner start here-->
<div class="banner-bg">
	<div class="container">
		<div class="header-main">
			<div class="logo">
				<a href="index.html"><img src="images/logo1.png" alt=""/></a>
			</div>
			<span class="menu"> <img src="images/icon.png" alt=""/></span>
				<div class="clear"> </div>
			<div class="navg">
				<ul class="res">
					<li><a href="homepage.php">Home</a></li>
					<li><a href="borrowed.php">Borrowed</a></li>
					<li><a class="active" href="Personal.php">Personal center</a></li>
					<li><a href="index.php">Exit system</a></li>
				</ul>
				<script>
                                  $( "span.menu").click(function() {
                                                                    $(  "ul.res" ).slideToggle("slow", function() {
                                                                     // Animation complete.
                                                                     });
                                                                     });
		       </script>
			</div>
		  <div class="clearfix"> </div>
		</div>
	</div>
	</div>
<!--banner end here-->	

<body>
<form action="Personal1.php" name="form1" method="post" enctype="multipart/form-data">
 	 				<input type="password" name="oldpw"  placeholder="old password"/>
					<input type="password" name="newpw1"  placeholder="new password"/>
					<input type="password" name="newpw2"  placeholder="confirm new password"/>
  					<input type="submit" name="submit" value="Change Password" />
					</form>
<?php  
if(isset($_POST['submit'])){
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("aibookdb", $con);
$id=$_SESSION['only'];
$pwd=$_POST['oldpw'];
$pwd1=$_POST['newpw1'];
$pwd2=$_POST['newpw2'];
$sql="SELECT * FROM userinfo where User_Id=$id and Password='".$pwd."'";
$check=mysql_query($sql,$con);
if($pwd1==$pwd2&&strlen($pwd1)>4&&strlen($pwd1)<10)
{  
if(mysql_num_rows($check)){
  mysql_query("UPDATE userinfo SET Password = '".$pwd1."'
  WHERE User_Id='$id' and Password='$pwd'");
  echo "Successfully!";
}
 else{
 echo"<script> alert('error,please try again');</script>";}
}
else{
echo"<script> alert('error,please enter again');</script>";
}
mysql_close($con);
}
?> 

 
</body> 
</html>