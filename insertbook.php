<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>AddBook</title>
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
<script type="text/javascript" src="js/insertbook.js"></script>
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
					<li><a class="active" href="insertbook.php">AddBook</a></li>
					<li><a href="searchuser.php">SearchUser</a></li>
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
<!--banner end here-->	 
<!--contact start here-->
<div class="contact">
	<div class="container">
		<div class="contact-main">
			


<?php		
		if(isset($_POST['insert'])){
		$con = mysql_connect("localhost","root","root");
			if (!$con)
  		{
  		die('Could not connect: ' . mysql_error());
  		}
		mysql_select_db("aibookdb", $con);
		mysql_query('set NAMES gb2312');
		$sq="select * from booksinfo where Book_Index='".$_POST['Book_Index']."'";
		$ss = mysql_query($sq,$con)or die(mysql_error());
		$num = mysql_num_rows($ss);
		if(!$num){
			$sql="insert into booksinfo(Book_Index,Title,Author,Publication,Amount,ISBN,Description)values('$_POST[Book_Index]','$_POST[Title]','$_POST[Author]','$_POST[Publication]','$_POST[Amount]','$_POST[ISBN]','$_POST[Description]')";
			$sql1="insert into eachbooksinfo(Book_Index,BarCode,Location,State,Owner,Date,Renewal)values('$_POST[Book_Index]','$_POST[BarCode]','$_POST[Location]','1','available','0','1')";
			$result1=mysql_query($sql1,$con)or die(mysql_error());
			$result=mysql_query($sql,$con)or die(mysql_error());
			if($result&&$result1){
				echo"<script> alert('Add Successful');window.location.href='insertbook.php';</script>";
			}
			mysql_close($con);
		}
		else{
			echo"<script> alert('The Book_index has existe, please input a new one');window.location.href='insertbook.php';</script>";
		}
		}
?>

			<div class="contact-bottom">
				
				<form action="insertbook.php" name="form1" id="form1" method="post" onSubmit="return checkit()">
						<div class="new-head">
							<h3>Add Books</h3>
						</div>
                        <div style="height:25px;width:100%;">
                        	
                        </div>
                        <div class="col-md-6 contact-bottom-left">
                        <div style="padding:10px 5px 10px 20px;">
						<p>Title</p>
						<input type="text" name="Title"  />
						<p>Author</p>
						<input type="text" name="Author" />
						<p>Book_index</p>
						<input type="text" name="Book_Index" />
						<p>Publication</p>
						<input type="text" name="Publication"   />
						<p>Amount</p>
						<input type="text" name="Amount"  />
						<p>BarCode</p>
						<input type="text" name="BarCode"  />
						<p>Location</p>
						<input type="text" name="Location"  />
					</div></div>
					<div class="col-md-6 contact-bottom-right">
						<div style="padding:10px 0px 10px 5px;">
                        <p>ISBN</p>
						<input type="text" name="ISBN" />
						<p>Description</p>
						<textarea  name="Description" /> </textarea>
						<input type="submit" name='insert' value="Submit">
				</div></div></form>
				
			  <div class="clearfix"> </div>
			</div>
		   <div class="clearfix"> </div>
		</div>
	</div>
</div>

</body>
</html>
