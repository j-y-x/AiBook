<?php
    $conn=mysql_connect("localhost","root","") or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	$select=mysql_query("select * from booksinfo where Book_Index='".$_GET['id']."'");
	$row=mysql_fetch_array($select);
	$uinfo=$_GET['uinfo'];
	session_start();
   
?>
<html>
<head>
<title>Update</title>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<link rel="stylesheet" type="text/css" href="css/search.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script language="javascript">
function check(){
       
	if(document.form1.only.value.substring(0,1)!="0"){
	      alert("您没有权限修改");
          window.event.returnValue=false;
}

}
function brow1(){
    window.event.returnValue=false;
	if(document.form1.state.value==1)
	{window.location.href="brow.php";}
	else if(document.form1.state.value==0){
		window.event.returnValue=false;
	 alert("已借出！");
	 
	}
}
</script>
</head>
<?php

 $_SESSION['book']= $row['Book_Index'];
 ?>
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
<h1><font color="#663399" face="华文雅黑"><center>Aibook Search</center></font></h1>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; User</font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Exit System</a></font>
<br><font style="font-style:italic; color:#663399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Center</font>
</div>
<div id="bo2">
<center>
<table border=1>
<form id="form1" name="form1" method="post" action="update_ok.php?uinfo=<?php echo $uinfo ?>">
<input type="hidden" name="only" id="only" value="<?php echo $_SESSION['only'];?> "/>

<tr>
<td width="130">&nbsp;&nbsp;BookshelfId</td>
<td width="411"><textarea name="id" style="width:411px;" ><?php echo $row['Book_Index'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Author</td>
<td><textarea name="author" style="width:411px;"><?php echo $row['Author'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Publisher</td>
<td><textarea name="publisher" style="width:411px;"><?php echo $row['Publisher'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Title</td>
<td><textarea name="title" style="width:411px;"><?php echo $row['TiTle'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Edition</td>
<td><textarea name="edition" style="width:411px;"><?php echo $row['Edition'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;PublishDate</td>
<td><textarea name="publishdate" style="width:411px;"><?php echo $row['Publish_Date'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;ISBN</td>
<td><textarea name="isbn" style="width:411px;"><?php echo $row['ISBN'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Description</td>
<td height="200px"><textarea wrap="hard" rows="10" name="description" style="width:411px;"><?php echo $row['Description'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;State</td>
<td><textarea name="state" style="width:411px;"><?php echo $row['State'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Number</td>
<td><textarea name="amount" style="width:411px;"><?php echo $row['Amount'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Action</td>
<td>
<input type="submit" name="brow" value=" Borrow " style="margin:0 80px 0 90px;">
<input type="submit" name="upd" value=" Update " onClick="check()"/>
</td>
</tr>
</form>
</table>
</center>
</div>
</div>
</body>
</html>