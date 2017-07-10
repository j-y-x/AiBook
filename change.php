<?php
    $conn=mysql_connect("localhost","root","root")or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	session_start();
	$select=mysql_query("select * from userinfo where User_Id='".$_SESSION['only']."'",$conn);
	$row=mysql_fetch_array($select);
?>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<script　language="javascript">
for(var i=0;i<document.form1.length;i++){ 
        　　if(document.form1.elements[i].value==""){
			 alert(document.form1.elements[i].name+"不为空");           
             document.form1.elements[i].focus();
			 return false;
             break;
         } 
     }
</script>
<link rel="stylesheet" type="text/css" href="css/search.css">
<body>
<!--导航栏 左侧-->
<div id="navcontainer"> 
<ul id="navlist"> 
<li id="active"><a href="#" id="current">Add User</a> </li> 
<li><a href="deleteUser.php">Delete User</a></li> 
<li><a href="#">Update User</a></li> 
<li><a href="addBooks.php">Add Book</a> </li> 
<li><a href="#">Delete Book</a></li> 
<li><a href="#">Update Book</a></li> 
</ul> 
</div>
<!--导航栏右侧-->
<div class="barboxright">
<div id='tit'>
<h1><font face="华文雅黑" color="#0000B6"><center>Aibook System</center></font></h1>
<img src="personal.png" width="44" height="44"><font color="#8D8CCD">&nbsp; Welcome ,</font>
<font color="#0000B6">&nbsp; Admin</font>
<font color="#0000B6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Exit System</a></font>
</div>
<div id="bo2">
<center>
<table border=1>
<form id="form1" name="form1" method="post" action="change_ok.php">
<tr>
<td width="138">&nbsp;&nbsp;User Id</td>
<td width="422"><textarea name="id" style="width:422;"><?php echo $row['User_Id'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;Password</td>
<td><textarea name="pwd" style="width:422;"><?php echo $row['Password'] ?></textarea>
<tr>
<td>&nbsp;&nbsp;Name</td>
<td><textarea name="name" style="width:422;"><?php echo $row['Name'] ?></textarea>
<tr>
<td>&nbsp;&nbsp;Email</td>
<td><textarea name="e" style="width:422;"><?php echo $row['Email'] ?></textarea>
<tr>
<td height="38">&nbsp;&nbsp;School</td>
<td><textarea name="sch" style="width:422;"><?php echo $row['School'] ?></textarea>
<tr><td height="33">
<input type="submit" name="cha" value="Update" onClick="check()" style="width:60px; height:30px;margin:2px 2px 2px 18px;"/></td></tr>
</form>
</table></center></div>
</div></body></html>