
<?php
session_start();
?>
<html>
<head>
<?php    $conn=mysql_connect("localhost","root","")or die("数据库未连接".mysql_error());  
  mysql_select_db("db_abook",$conn);
?>
<script language="javascript" src="javascript/change.js"></script>
</head>
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
<h2><font face="华文雅黑" color="#0000B6"><center>Aibook System</center></font></h2>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; User</font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Exit System</a></font>
<br><font style="font-style:italic; color:#663399;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Center</font>
</div>
<div id="bo2">
<h1 align="center"><font color="#663399" face="华文雅黑">Modify The Password</font></h1>
<div align="center"  style="padding:40px 0px 20px 0;">
<center>
<form class="form" method="post" action="first.php" name="form" style="border:1px solid #FFF;width:390px;padding:14px;">

OldPassword: &nbsp; <input type="text" id="oldpwd"  name="oldpwd">
<br>
<br>
<br>
NewPassword: &nbsp; <input type="text" id="newpwd" name="newpwd">
<br>
<br>
<br>
ConfirmPassword:<input type="text" id="newpwd1" name="newpwd1">
<br>
<br>
<button type="submit" id="submit1" name="submit" onClick="check()"> Submit </button>
<br>
<br>
</form></center>
 
</div></div>
<?php
  $pwd11=$_POST['newpwd'];
  $pwd22=$_POST['newpwd1'];
  $select="select * from userinfo 
where User_Id='".$_SESSION['name']."' and Password='".$_POST['oldpwd']."";
if($pwd11!=$pwd22||strlen($pwd11)<6||strlen($pwd11)>12)
{ 
  echo"<script> alert('fail');</script>";
}
else
{  
     
 if(mysql_num_rows( mysql_query($select) ) )
{
      $select="Update userinfo set Password=$pwd22
where User_Id='".$_SESSION['name']."'";
      
mysql_query($select) or die(mysql_error());
echo"<script> alert('success');</script>";
}
else
{
echo"<script> alert('fail');</script>";
}
}
?>
</body>
</html>
