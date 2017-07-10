<?php
    $conn=mysql_connect("localhost","root","")or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	$uinfo=$_GET['User_Id'];
	
?>
<html>
<head>
<title>Aibook</title>
<link rel="stylesheet" type="text/css" href="css/search.css"><br>
<script language="javascript">
function checkit(){
	window.event.returnValue=false;
	window.location.href="change.php";
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
</head>
<?php
 session_start();
 ?>
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
<input type="hidden" name="pid" value="<?php echo $_SESSION;?>">
<input type="hidden" name="only" value="<?php echo $uinfo ?>"/>

<div id='tit'>
<h1><font face="华文雅黑" color="#0000B6"><center>Aibook System</center></font></h1>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; User</font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Exit System</a></font>
<br><font style="font-style:italic; color:#663399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Center</font>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="change" value=" Change Password " style="background-color:#D1CBD8;color:#8D8CCF; height:22px; font-size:16px;" onClick="checkit()"></div>

<div id="bo">
<h2><font face="华文雅黑" color="#0000B6"><center>Search Books</center></font></h2>
<form name="form1" method="post" action="show.php?uinfo=<?php echo $uinfo;?>">
<input type="hidden" name="uinfo" value="<?php echo $uinfo ?>"/>
<div style="text-align:left; padding:10px 0 0 30%;">
BookName <input type="text" name="bname"><br><br>Author&nbsp; <input type="text" name="bauthor"><br><br>Publisher<input type="text" name="bpub"><br><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="requry" value=" Search " style="width:80px;height:25px;"></div>
<!--<input type="submit" name="change" value=" Change Password " onClick="checkit()">-->
</form>
</div>

</body>
</html>