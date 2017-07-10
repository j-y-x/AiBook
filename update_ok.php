<?php
    $conn=mysql_connect("localhost","root","") or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	
	if(isset($_POST['upd']) and $_POST['upd']=="修改"and $_POST['id']!=""){
		$update=mysql_query("update booksinfo set Book_Index='".$_POST['id']."',TiTle='".$_POST['title']."',Author='".$_POST['author']."',Publisher='".$_POST['pub']."',ISBN='".$_POST['isbn']."',Edition='".$_POST['edition']."',Description='".$_POST['description']."',State='".$_POST['state']."',Amount='".$_POST['amount']."',Publish_Date='".$_POST['date']."' where Book_Index='".$_POST['id']."'",$conn);
	}
?>


<?php
     $sel=mysql_query("select * from booksinfo where Book_Index='".$_POST['id']."'");
	$row=mysql_fetch_array($sel);
    ?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="css/search.css">
<body background="backgroud.png">
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
<h1><font color="#663399" face="华文雅黑"><center>Aibook System</center></font></h1>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; Crystal</font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Exit System</a></font>
<br><font style="font-style:italic; color:#663399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Center</font>
</div>
</div>
<div id="bo2">
<center>
<table border=1>
<form id="form1" name="form1" method="post" action="#">
<tr>
<td width="123"> &nbsp;&nbsp;BookShelfId </td>
<td width="411"><textarea name="id" style="width:411px;"><?php echo $row['Book_Index'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;Author</td>
<td><textarea name="author" style="width:411px;"><?php echo $row['Author'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;Publisher</td>
<td><textarea name="publisher" style="width:411px;"><?php echo $row['Publisher'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;Title</td>
<td><textarea name="title" style="width:411px;"><?php echo $row['TiTle'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;Edition</td>
<td><textarea name="edition" style="width:411px;"><?php echo $row['Edition'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;PublishDate</td>
<td><textarea name="date" style="width:411px;"><?php echo $row['Publish_Date'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;ISBN</td>
<td><textarea name="isbn" style="width:411px;"><?php echo $row['ISBN'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;Description</td>
<td height="200px"><textarea wrap="hard" rows="10" name="description" style="width:411px;"><?php echo $row['Description'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;State</td>
<td><textarea name="state" style="width:411px;"><?php echo $row['State'] ?></textarea></td></tr>
<tr>
<td> &nbsp;&nbsp;Number</td>
<td><textarea name="amount" style="width:411px;"><?php echo $row['Amount'] ?></textarea></td></tr>
</form>
</table>
</center>
</div>
</div>
</body>
</html>