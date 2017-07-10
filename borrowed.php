<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>Borrowed</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }>
</script>
<meta name="keywords" content="Coffee-House Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link href='http://fonts.useso.com/css?family=Exo:100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
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
<div class="banner">
<div class="banner-bg">
	<div class="container">
		<div class="header-main">
			<div class="logo">
				<a href="index.php"><img src="images/logo1.png" alt=""/></a>
			</div>
				<span class="menu"> <img src="images/icon.png" alt=""/></span>
				<div class="clear"> </div>
			<div class="navg">
				<ul class="res">
					<li><a href="homepage.php">Home</a></li>
					<li><a class="active" href="borrowed.php">Borrowed</a></li>
					<li><a href="Personal.php">Personal center</a></li>
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
<!--about start here-->

<a name="search"></a>
<div class="new">
	<div class="new-head">
		<h3>Borrowed</h3>
	</div><div class="clearfix"> </div>
	<?php
	@session_start();
	$on=$_SESSION['only'];
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("aibookdb", $con);
$sql="select booksinfo.Book_Index,Title,Author,Publication,Location,ISBN,Amount,Date,Renewal 
from booksinfo left join eachbooksinfo on
booksinfo.Book_Index=eachbooksinfo.Book_Index WHERE Owner = '$on'";
mysql_query('SET NAMES gbk');
$result = mysql_query($sql,$con)or die(mysql_error());
$num = mysql_num_rows($result);

echo "  
	<div class='search'>
			<div class='coff-middle-grid'>
				<div class='middle-right-text'>";
		?>			
	<table class="table table-hover">
	<thead>
	<tr>
	<?php		
	echo"	<th>Title</th>
			<th>Author</th>
			<th>Return date</th>
			<th>Book index</th>
			<th>Renewal</th>
			<th>Publication</th>
			<th>ISBN</th>";
	?>
	</tr>	
	</thead>
	<tbody>
	<tr>
	
	
<?php	
while($row = mysql_fetch_array($result))
  { 
    $da=date("Y-m-d",$row['Date']);
	echo "<td>".$row['Title']."</td>";
	echo "<td>".$row['Author']."</td>";
	echo "<td>".$da."</td>";
	echo "<td>".$row['Book_Index']."</td>";
	echo "<td>".$row['Renewal']."</td>";
	echo "<td>".$row['Publication']."</td>";
	echo "<td>".$row['ISBN']."</td>";
	$Book_in=$row['Book_Index'];

   ?>
   </tr>
   
   <?php
	
  }


mysql_close($con);

echo"			</div>
				 <div class='clearfix'> </div>
				 </div>	    
	</div>
	<div class='clearfix'> </div>";
	
?>

	</tbody>
    </table>
	<?php 
	  if($num==0){
	echo "No records!";
}
?>
</div>











<!--footer start here-->
<div class="footer">
	<div class="footer-main">
		
		<div class="footer-bottom">
			<div class="container">
			<div class="col-md-4 ftr-bottom bgimg-top">
			</div>
			<div class="col-md-4 ftr-bottom">
				<ul class="ftr-navg">
				<!--<h4 style="color:#0099FF">Copyright &copy;   2016   A9</h4>-->
				</ul>
			</div>
			<div class="col-md-4 ftr-bottom">

			</div>
			<div class="clearfix"> </div>
		</div>
		</div>
			<div class="clearfix"> </div>
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