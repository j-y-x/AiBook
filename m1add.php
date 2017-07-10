<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>manage</title>
</head>
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
					<li><a href="searchuser.php">SearchUser</a></li>
					<li><a href="insertuser.php">AddUser</a></li>
					<li><a class="active" href="m1add.php">Borrow & Book</a></li>
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
	
	
	
<body>
<a name="search"></a>
<div class="new">
	<div class="new-head">
		<h3>Borrow and Return</h3>
	</div><div class="clearfix"> </div>
	<div style="height:25px;width:100%;">
                        	
    </div>
<div style="padding:10px 5px 10px 20px;">	
<table class="table table-hover">
<tbody>
<tr>
<th>
Operation
</th>
<th>
UserId
</th>
<th>
BarCode
</th>
<th>
&nbsp;
</th>
<th>
Date
</th>
<th>
Action
</th>
</tr>
<tr>
<form name="form1" action="m1add.php" method="post">

<td>Borrow Book</td>
<td><input type="text" name="uin" id="uin"></input></td>
<td><input type="text" name="bin" id="bin"></input></td>
<td><input type="hidden" name="din" id="din" value="<?php echo time(); ?>"></input></td>
<td><input type="text" name="show" value="<?php echo date('y/m/d',time());?>"></td>
<td><input type="submit" name="add" value=" Add  "></td>

</form>
</tr>

<tr>
<form name="form2" action="m1add.php" method="post">
<td>Return Book</td>
<td><input type="text" name="uin" id="uin"></input></td>
<td><input type="text" name="bin" id="bin"></input></td>
<td><input type="hidden" name="din" id="din" value="<?php echo time(); ?>"></input></td>
<td><input type="text" name="show" value="<?php echo date('y/m/d',time());?>"></td>
<td><input type="submit" name="delete" value="Return"></td>
</form>
</tr>

</tbody>
</table>
<?php
@session_start();
if(isset($_POST['add'])){
    $conn =mysql_connect("localhost","root","root");
    if (!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("aibookdb", $conn);
	$uin=$_POST['uin'];
	$bin=$_POST['bin'];
	$key=substr($uin,0,1);
	$din=$_POST['din']+24*60*60*(4-$key)*10;
	$sql="select State from eachbooksinfo where BarCode='$bin'";
	$result1=mysql_query($sql,$conn)or die(mysql_error());
	$row = mysql_num_rows($result1);
	if($row!=2){
       $sql="update eachbooksinfo set State='2',Renewal='1',Date='$din',Owner='$uin' where BarCode='$bin'";
       $result = mysql_query($sql,$conn)or die(mysql_error());
	   if($result){echo " add successful!";}  
	 }
	 else{
	 echo "the book has been borrowed!";
	 }
}
if(isset($_POST['delete'])){
    $conn =mysql_connect("localhost","root","root");
    if (!$conn)
    {
        die('Could not connect: ' . mysql_error());
    }

    mysql_select_db("aibookdb", $conn);
	
	$uin=$_POST['uin'];
	$bin=$_POST['bin'];
	$din=$_POST['din'];
	$sql="select * from eachbooksinfo where BarCode='$bin' AND Owner='$uin'";
	$result1=mysql_query($sql,$conn)or die(mysql_error());
	$row = mysql_num_rows($result1);
	if($row==0){echo "It is not your book";}
	else{
	$sql="select Date from eachbooksinfo where BarCode='$bin'";
	$result1=mysql_query($sql,$conn)or die(mysql_error());
	$row = mysql_fetch_array($result1);
	$din=intval($din,10);
	$row=intval($row['Date'],10);
	$money=($din-$row)/86400;
	if($money>0){
	 $sql="update userinfo set Penalty='$money' where User_Id='$uin'";
	 $result1 = mysql_query($sql,$conn)or die(mysql_error());
	 if($result1){echo "fine successfully!";}
	 else{echo "fine failed";}
	}
       $sql="update eachbooksinfo set State='1',Renewal='1',Date='0',Owner='available' where BarCode='$bin'";
       $result = mysql_query($sql,$conn)or die(mysql_error());
	   if($result){echo "return successful!";}  
	   else{
	        echo "try again";
	   }}
}
 ?>
</div>


</body>
</html>