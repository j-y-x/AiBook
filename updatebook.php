<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>ManageBook</title>
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
<script type="text/javascript" src="js/insertbook.js"></script>
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
			<span class="menu"> <img src="images/icon.png" alt=""/></span>
				<div class="clear"> </div>
			<div class="navg">
				<ul class="res"> 
					<li><a href="admin.php">Home</a></li>
					<li><a href="insertbook.php">AddBook</a></li>
					<li><a href="searchuser.php">SearchUser</a></li>
					<li><a href="insertuser.php">AddUser</a></li>
					<li><a href="m1add.php">Borrow & Book</a></li>
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
		if(isset($_POST['edit'])){
		$id=$_POST['edit'];
		$row=null;
		$con = mysql_connect("localhost","root","root");
			if (!$con)
  		{
  		die('Could not connect: ' . mysql_error());
  		}
		mysql_select_db("aibookdb", $con);
		mysql_query('set NAMES gb2312');
		$sql="select * from booksinfo  WHERE Book_Index = '$id'";
		$result = mysql_query($sql,$con)or die(mysql_error());
		$num = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
		mysql_close($con);
		}

		
?>
<?php  
			
				if(isset($_POST['update'])){
				$con = mysql_connect("localhost","root","root");
				if (!$con)
  				{
  				die('Could not connect: ' . mysql_error());
  					}
				$id=$_POST['Book_Index'];
				mysql_select_db("aibookdb", $con);
				mysql_query('set NAMES gb2312');
				$sql="UPDATE booksinfo SET Title = '".$_POST['Title']."',
				Author= '".$_POST['Author']."', Publication= '".$_POST['Publication']."',Amount= '".$_POST['Amount']."',
				ISBN= '".$_POST['ISBN']."',Description= '".$_POST['Description']."'
  				WHERE Book_Index = '$id'";
				$result = mysql_query($sql,$con)or die(mysql_error());
  				if($result){
					echo"<script> alert('update successful');</script>";
							
				}			
				$sql="select * from booksinfo  WHERE Book_Index = '$id'";
		        $result = mysql_query($sql,$con)or die(mysql_error());
		        $num = mysql_num_rows($result);
		        $row = mysql_fetch_array($result);
		        
				}
?>   
			<div class="contact-bottom">
				
				<form action="updatebook.php" name="form1" id="form1" method="post" onSubmit="return checkit()">
						<div class="col-md-6 contact-bottom-left">
                        <h4>Update books</h4>
						<p>Title</p>
						<input type="text" name="Title" value="<?php echo $row['Title']; ?>" />
						<p>Author</p>
						<input type="text" name="Author"  value="<?php echo $row['Author']; ?>" />
						<p>Book_index</p>
						<input type="text" name="Book_Index"  value="<?php echo $row['Book_Index']; ?>" readonly/>
						<p>Publication</p>
						<input type="text" name="Publication"  value="<?php echo $row['Publication']; ?>" />
						<p>Amount</p>
						<input type="text" name="Amount"  value="<?php echo $row['Amount']; ?>" />
					</div>
					<div class="col-md-6 contact-bottom-right">
						<p>ISBN </p>
						<input type="text" name="ISBN" value="<?php echo $row['ISBN']; ?>"  />
						<p>Description</p>
						<textarea  name="Description" /> <?php echo $row['Description']; ?></textarea>
						<input type="submit" name='update' value="Submit">
						<input type="button" onClick="window.location.href='admin.php'" value="GoBack">
			</div>	</form>







				


		 
		
	</div>
</div>

</body>
</html>
