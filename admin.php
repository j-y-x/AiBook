<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE HTML>
<html>
<head>
<title>HomePage</title>
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
				<a href="index.php"><img src="images/logo1.png"  alt="AiBook System"/></a>
			</div>
			<span class="menu"> <img src="images/icon.png" alt=""/></span>
				<div class="clear"> </div>
			<div class="navg">
				<ul class="res"> 
					<li><a class="active" href="admin.php">Home</a></li>
					<li><a href="insertbook.php">AddBook</a></li>
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
	
<!--cafe start here-->



<a name="search"></a>
<div class="new">
	<div class="new-head">
		<h3>Search Books</h3>
	</div><div class="clearfix"> </div>
	<div class="search">
                   <form id="search" method="get" action="admin.php" name="form1">  
			<input type="text" name="title" value="enter Book Title" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Book Title';}"/>
			<input type="submit" value="search">
		 </form>
<?php 
@session_start();
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
if(isset($_GET['message_count'])){

}
else{
    $message_count=0;
}
if(isset($_GET['page_count'])){

}
else{
    $page_count=1;
}
  if(isset($_GET['title'])){
      
	  $_SESSION['title']=$_GET['title'];
      $searchs = $_GET['title'];  
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbname="aibookdb";
      if($_GET['title']!=null)
      {
          $conn =mysql_connect("localhost","root","root");
          if (!$conn){
              die('Could not connect: ' . mysql_error());
          }
          mysql_select_db("aibookdb", $conn);
          $sql="select booksinfo.Book_Index,Title,Author,Publication,Location,ISBN,Amount,Date,Renewal from booksinfo left join eachbooksinfo on booksinfo.Book_Index=eachbooksinfo.Book_Index where Title like '%".$searchs."%'";
          mysql_query('SET NAMES gbk');
		  $page_size=4;
          $result = mysql_query($sql,$conn)or die(mysql_error());
		  $message_count=mysql_num_rows($result);
		  $page_count=ceil($message_count/$page_size);
		  $offset=($page-1)*$page_size;
		  $query="select * from booksinfo left join eachbooksinfo on booksinfo.Book_Index=eachbooksinfo.Book_Index where Title like '%".$searchs."%' limit $offset,$page_size";
		  $result=mysql_query($query);
while($row = mysql_fetch_array($result))
  { 
         
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
			<th>Book index</th>
			<th>Amount</th>
			<th>ISBN</th>
			
			<th>Publication</th>";
			
	?>
	
	</tr>	
	</thead>
	<tbody>
	<tr>
	
	<?php			
	echo "<td>".$row['Title']."</td>";
	echo "<td>".$row['Author']."</td>";
	echo "<td>".$row['Book_Index']."</td>";
	echo "<td>".$row['Amount']."</td>";
	echo "<td>".$row['ISBN']."</td>";

	echo "<td>".$row['Publication']."</td>";
	$_SESSION['bi']=$row['Book_Index'];
	?>
   </tr>
   </tbody>
   </table>
   <div align="right">
   <?php
	echo "<form method='post' action='updatebook.php' name='form2'>";
	echo "<input type='hidden' name='edit' value='".$_SESSION['bi']."'>";
	echo "<input type='submit' value='Edit'>";
	echo "</form>";
	
	$id= $row['Book_Index'];
	echo "<form id='del' method='post' action='admin.php' name='form3'>";
	echo "<input type='hidden' name='delete' value='".$id."'>";
	echo "<input type='submit' name='del' value='Delete'>";
	echo "</form>";
	?></div>
	<?php
	
	echo"			</div>
				 <div class='clearfix'> </div>
				 </div>	    
	</div>
	<div class='clearfix'> </div>";
  }
}}
?>
<div class='clearfix'>
<center>Page：<?php echo $page;?>/<?php echo $page_count;?>page&nbsp;Amount：<?php echo $message_count;?></center>
<?php 
echo "<center>";
    if($page>1){
		
	    echo "<a href=admin.php?page=1&title=".$_SESSION['title'].">First Page</a>&nbsp;&nbsp;";
		echo "<a href=admin.php?page=".($page-1)."&title=".$_SESSION['title'].">Previous Page</a>";
	}

	if($page<$page_count){
	    echo "<a href=admin.php?page=".($page+1)."&title=".$_SESSION['title'].">Next Page</a>&nbsp;&nbsp;";
		echo "<a href=admin.php?page=".($page_count)."&title=".$_SESSION['title'].">Last Page</a>";
		
	}
echo "</center>";
?> 	
	 </div>

<?php
if(isset($_POST['del'])){
$id = $_POST['delete'];//获取要删除的ID
$con = mysql_connect("localhost","root","root");
	if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}
mysql_select_db("aibookdb", $con);
$result1=mysql_query("select State from eachbooksinfo where Book_Index='".$id."'");
$row = mysql_fetch_array($result1);
if($row['State']==2){
echo "<script>alert('this book has borrowed');</script>";
}
else{
$sql=mysql_query("delete from eachbooksinfo where Book_Index = '".$id."'");
$result = mysql_query("delete from booksinfo where Book_Index = '".$id."'");
if($result&&$sql){
echo "Delete Successfully!";
echo"<script>window.location.href=admin.php;</script>";
}}}
?>
			   
	</div>	
</div>







</body>
</html>