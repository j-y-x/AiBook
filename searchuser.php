<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>ManageUser</title>

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
<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
<!--banner start here-->
<div class="banner">
<a name="top"></a>
  <div class="banner-bg">
	<div class="container">
		<div class="header-main">
			<div class="logo">
				<a href="admin.php"><img src="images/logo1.png" alt=""/></a>
			</div>
			<span class="menu"> <img src="images/icon.png" alt=""/></span>
				<div class="clear"> </div>
			<div class="navg">
				<ul class="res"> 
					<li><a href="admin.php">Home</a></li>
					<li><a href="insertbook.php">AddBook</a></li>
					<li><a class="active" href="searchuser.php">SearchUser</a></li>
					<li><a href="insertuser.php">AddUser</a></li>
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
	
<div class="new">
	<div class="new-head">
		<h3>Search Users</h3>
	</div><div class="clearfix"> </div>	
	
<div class="search">
<form id="search" method="post" action="searchuser.php" name="search">  
			<input type="text" name="search" value="" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'User_Id';}"/>
			<input type="submit" value="Search">
		 </form>
		 
</div>
<?php 
if(isset($_POST['search'])){
$searchs = $_POST['search'];  
$servername = "localhost";
$username = "root";
$password = "root";
$dbname="aibookdb";
if($_POST['search']!=null)
{
$conn =mysql_connect("localhost","root","root");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("aibookdb", $conn);
$sql="select User_Id,Password,Name,Email,School,User_Right,Penalty
from userinfo where User_Id like '%".$searchs."%'";
mysql_query('SET NAMES utf-8');
$result = mysql_query($sql,$conn)or die(mysql_error());
while($row = mysql_fetch_array($result))
  { 
        
	echo "  
	<div class='search'>
			<div class='coff-middle-grid'>
				<div class='middle-right-text'>";
	
	echo "			<h3>User_Name:". $row['Name'] ."</h3>";
	echo"			<p>User_Right:" . $row['User_Right'] . "&nbsp;&nbsp;&nbsp";echo "Email:". $row['Email'] ."</p>";
	echo"			<p>Fine:&yen;" . $row['Penalty'] . "&nbsp;&nbsp;&nbsp";echo "School:". $row['School'] ."</p>";
	echo "<form id='edit' method='post' action='updateuser.php' name='edit'>";
	echo "<input type='hidden' name='edit' value='".$row['User_Id']."'>";
	echo "<input type='submit' value='edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "</form>";
	$id= $row['User_Id'];
	echo "<form id='del' method='post' action='searchuser.php' name='del'>";
	echo "<input type='hidden' name='del' value='".$id."'>";
	echo "<input type='hidden' name='search' value='".$searchs."'>";
	echo "<input type='submit' name='delete' value='delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "</form>";
	echo"			</div>
				 <div class='clearfix'> </div>
				 </div>	    
	</div>
	<div class='clearfix'> </div>";
 	 }
	}
}
?>
<?php
if(isset($_POST['del'])){
$id = $_POST['del'];//获取要删除的ID
$con = mysql_connect("localhost","","");
	if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
mysql_select_db("aibookdb", $con);
$result = mysql_query("delete from userinfo where User_Id = '".$id."'");
if(isset($_POST['delete'])and$_POST['delete']=="提交"and $result){
echo "Delete Success";

}
}
?>
</div>

</body>

</html>