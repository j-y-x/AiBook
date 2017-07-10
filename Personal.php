<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>Personal center</title>
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
<div class="banner">
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

<a name="search"></a>
<div class="new">
	<div class="new-head">
		<h3>Personal Center</h3>
			</div><div class="clearfix"> </div>
			<div class="personal_main_left">

				<?php
					$con = mysql_connect("localhost","root","root");
					if (!$con)
  					{
  					die('Could not connect: ' . mysql_error());
  					}
					mysql_select_db("aibookdb", $con);
					mysql_query('SET NAMES gbk');
 					$result = mysql_query("SELECT * FROM userinfo where User_Id='".$_SESSION['only']."'");
 					 $row = mysql_fetch_array($result);
  					$load=$row['Image'];
					if($load){
 					echo "<img src='$load'/>"; 
					}else{
						echo "<img src='./123/123.jpg'/>";
					}				
					mysql_close($con);
				?>

				<form action="123.php" name="form" method="post" enctype="multipart/form-data">
 	 				<input type="file" name="file"  />
  					<input type="submit" name="submit" value="Upload Picture" />
				</form>

			</div>
			
<div class="personal_main_right">			
<?php  

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("aibookdb", $con);
mysql_query('SET NAMES gb2312');
$sql1="SELECT * FROM userinfo where User_Id='".$_SESSION['only']."'";

$result = mysql_query($sql1,$con)or die(mysql_error());
while($row = mysql_fetch_array($result))
  { 
         
	?>
	
	<table class="table table-hover">
	<tbody>
	<tr>
	<?php
	echo "<td>"."Name"."</td>"."<td>".$row['Name']."</td>";
	?>
	</tr>
	
	<tr>
	<?php
	echo "<td>"."User Right"."</td>"."<td>".$row['User_Right']."</td>";
	?>
	</tr>
	
	<tr>
	<?php
	echo "<td>"."School"."</td>"."<td>".$row['School']."</td>";
	?>
	</tr>
	
	<tr>
	<?php
	echo "<td>"."Email"."</td>"."<td>".$row['Email']."</td>";
	?>
	</tr>
	
	<tr>
	<?php
	echo "<td>"."ID"."</td>"."<td>".$row['User_Id']."</td>";
	?>
	</tr>
	
	<tr>
	<?php
	echo "<td>"."Penalty"."</td>"."<td>".$row['Penalty']."</td>";
	?>
	</tr>
	
	<?php		

  }
	mysql_close($con);
?> 


	</tbody>
	</table>

	<table>
	<tbody>
	<tr>
	<td>
	<a href="Personal1.php"><button type="button"class="btn btn-default">change password</button></a>
	</td>
	
	</tr>
	</tbody>
	</table>

	</div>
			<div class="personal_main_right_bottom">
				
			</div>
			
	<div class="clearfix"> </div>

</div>
</div>


<div class="footer">

		<div class="footer-bottom">
			<div class="container">
			<div class="col-md-4 ftr-bottom">
				<ul class="ftr-navg">
					<!--<h4 style="color:#0099FF">Copyright &copy;   2016   A9</h4>-->
				</ul>
		</div>
		</div>
		</div>
			<script type="text/javascript">
										$(document).ready(function() {
											/*
											var defaults = {
									  			containerID: 'toTop', // fading element id
												containerHoverID: 'toTopHover', // fading element hover id
												scrollSpeed: 1200,
												easingType: 'linear' 
									 		};
											*/
											
											$().UItoTop({ easingType: 'easeOutQuart' });
											
										});
									</script>
						<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
<!--footer end  here-->
</div>
</body>
</html>