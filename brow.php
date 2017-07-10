<?php
    $conn=mysql_connect("localhost","root","") or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	
	$ndate=time();
	$ndate=date("Y-m-d",$ndate);
	session_start();
	$t=substr($_SESSION['only'],0,1);
	$t=(4-$t)*10;
	$t=strtotime("now")+$t*24*3600;
	$t=date("Y-m-d",$t);
     
	$books=mysql_query("select * from booksinfo where Book_Index='".$_SESSION['book']."'",$conn);
	$user=mysql_query("select * from userinfo where User_Id='".$_SESSION['only']."'",$conn);
	$rbooks=mysql_fetch_array($books);
	$ruser=mysql_fetch_array($user);
	$select=mysql_query("insert into booksborrowed values('".$_SESSION['only']."','".$_SESSION['book']."','".$rbooks['TiTle']."','".$ndate."','".$t."','".$ruser['Penalty']."');",$conn);
	$bc=mysql_query("update booksinfo set State='0'",$conn);

	
?>
<?php
     $sel=mysql_query("select * from booksborrowed where Borrower_Id='".$_SESSION['only']."'",$conn);
	$row=mysql_fetch_array($sel);
    ?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="css/search.css">
<body>
<!--导航栏 左侧-->
<div id="navcontainer"> 
<ul id="navlist"> 
<li id="active"><a href="search.php" id="current">Search Books</a> </li> 
<li><a href="brow.php">Borrowed</a></li> 
<li><a href="#">Booking</a></li> 
<li><a href="#">Return</a></li> 
</ul> 
</div>
<!--导航栏右侧-->
<div class="barboxright">
<div id='tit'>
<h1><font face="华文雅黑" color="#0000B6"><center>Aibook Search</center></font></h1>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; Crystal</font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Exit System</a></font>
<br><font style="font-style:italic; color:#663399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Center</font><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="change" value=" Change Password " style="background-color:#D1CBD8;color:#8D8CCF; height:22px; font-size:16px;" onClick="checkit()">
</div>
<div id="bo2">
<center>
<table width="576" border=1>
<form id="form1" name="form1" method="post" action="#">
<tr>
<td width="138">&nbsp;&nbsp;UserId</td>
<td width="422"><textarea name="id"  style="width:422;"><?php echo $row['Borrower_Id']; ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;BookShelfId</td>
<td><textarea name="author" style="width:422;"><?php echo $row['Book_Id']; ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;BookName</td>
<td><textarea name="pub" style="width:422;"><?php echo $row['TiTle']; ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;BorrowDate</td>
<td><textarea name="title" style="width:422;"><?php echo $row['Borrow_Date']; ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;DueDate</td>
<td><textarea name="edition" style="width:422;"><?php echo $row['Return_Period']; ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Fine</td>
<td><textarea name="date" style="width:422;"><?php echo $row['Renewal'] ;?></textarea></td></tr>
</form>
</table></center></div>
</div></body></html>