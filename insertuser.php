<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>AddUser</title>
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
<!--banner start here-->
<div class="banner-bg">
	<div class="container">
		<div class="header-main">
			<div class="logo">
				<a href="admin.php"><img src="images/logo1.png" alt=""/></a>
			</div>
			<span class="menu"> <img src="images/icon1.png" alt=""/></span>
				<div class="clear"> </div>
			<div class="navg">
				<ul class="res"> 
					<li><a href="admin.php">Home</a></li>
					<li><a href="insertbook.php">AddBook</a></li>
					<li><a href="searchuser.php">SearchUser</a></li>
					<li><a class="active" href="insertuser.php">AddUser</a></li>
					<li><a href="m1add.php">Borrow & Book</a></li>
					<li><a href="index.php">Return</a></li>
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
<!--contact start here-->
<div class="contact">
	<div class="container">
		<div class="contact-main">
			


<?php		
		if(isset($_POST['user'])){
		$con = mysql_connect("localhost","","");
			if (!$con)
  		{
  		die('Could not connect: ' . mysql_error());
  		}
		mysql_select_db("test", $con);
		mysql_query('set NAMES gb2312');
		$sq="select * from userinfo where User_Id='".$_POST['User_id']."'";
		$ss = mysql_query($sq,$con)or die(mysql_error());
		$num = mysql_num_rows($ss);
		if(!$num){
			$sql="insert into userinfo(User_Id,Password,Name.Email,School,User_Right,Penalty) values('$_POST[User_id]','$_POST[password]','$_POST[name]','$_POST[Email]','$_POST[School]','$_POST[User_right]','$_POST[Penalty]')";
			$result=mysql_query($sql,$con)or die(mysql_error());
			if($result){
				echo"<script> alert('Add Success!');window.location.href='insertuser.php';</script>";
			}
			mysql_close($con);
		}
		else{
			echo"<script> alert('The user name has existed, please use a new one.');window.location.href='insertuser.php';</script>";
		}
		}
?>

			<div class="contact-bottom">
				
				<form action="insertuser.php" name="insertuser" id="insertuser" method="post" ">
						<div class="new-head">
							<h3>Add Users</h3>
						</div>
                        <div style="height:25px;width:100%;">
                        	
                        </div>
                    <div class="col-md-6 contact-bottom-left">
					<div style="padding:10px 5px 10px 20px;">
                    <p>Name</p>
					<input type="text" name="name"  />
					<p>password</p>
					<input type="text" name="password" />
					<p>User_id</p>
					<input type="text" name="User_id" />
					<p>User_right</p>
					<input type="text" name="User_right" />

				</div></div>
				<div class="col-md-6 contact-bottom-right">
					<div style="padding:10px 0px 10px 5px;">
                    <p>Penalty</p>
					<input type="text" name="Penalty" />
					<p>School</p>
					<input type="text" name="School" />
					<p>Email</p>
					<input type="text" name="Email" />
					<input type="submit" name="user" value="Submit">
					
				</div></div>
				</form>
				</div>
			  <div class="clearfix"> </div>
			</div>
		   <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--contact end here-->
<!--map end here-->

</body>
</html>
