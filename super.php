<?php
    $conn=mysql_connect("localhost","root","")or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	$uinfo=$_GET['User_Id'];
?>
<html>
<head>
<title>AdministratorInterface</title>
<meta http-equiv="Content-Type" content="text/php; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<?php
 session_start();
 ?>
<body background="backgroud.png">
<h1><font color="#663399" face="华文雅黑"><center>Welcome AiBook System</center></font></h1>

<div id='tit'>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; Admin </font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="index.php">Exit System</a></font>
<br>
</div>
<br><br><br><br><br><br><br><br><br>
<!--导航栏 左侧-->
<div id="navcontainer"> 
<ul id="navlist"> 
<li id="active"><a href="sign.php" id="current">Add User</a></li> 
<li><a>Delete User</a></li> 
<li><a>Update User</a></li> 
<li><a href="addBooks.php">Add Book</a></li> 
<li><a>Delete Book</a></li>
<li><a href="search.php?User_Id=<?php echo $uinfo; ?>">Update User</a></li>
</ul> 
</div>

</body>
</html>
