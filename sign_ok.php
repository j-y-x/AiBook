<?xml version="1.0" encoding="gb2312"?>
<!DOCTYPE html>
<?php
    $conn=mysql_connect("localhost","root","root")or die("数据库未连接".mysql_error());
    mysql_select_db("aibookdb",$conn);
?>
<html>
<head>
  <meta name="keywords" content="php,css,js,html5,jquery"></meta>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> </meta>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"></meta>
  <meta http-equiv="empires" content="9,oco,2016"></meta>
  <meta http-equiv="Content-Type" content="text/php; charset=gb2312" /></meta>
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
  <script language="javascript" src="javascript/sign.js">
  </script>
  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
  <title>Register</title>
</head>
<body background="backgroud.png">
  <?php
    session_start();
    $admit=$_POST['id'];
	$sel=mysql_query("select * from userinfo where User_Id='$_POST[id]'",$conn);
	$se=mysql_num_rows($sel);
	if($se>0){
	echo "<script> alert('the account has been registered!');</script>";
	echo "<script>window.location.href='sign.php'</script>";
	}
	else if($se==0){
    $update=mysql_query("insert into userinfo values('".$_POST['id']."','".$_POST['pwd']."','".$_POST['name']."','".$_POST['e']."',null,null,'".$_POST['sch']."',substr($admit,0,1),0)",$conn);
	if($update){
        echo"<script> alert('registered succeessful');</script>";
	}
    else{
	    echo"<script> alert('failed');</script>";
	}}
  ?>
<?php
     $sel=mysql_query("select * from userinfo where User_Id='".$_POST['id']."'");
	 $row=mysql_fetch_array($sel);
	 $_SESSION['imgs']=$row;
    ?>
	<h1 align="center"><font color="#663399" face="华文雅黑">Registered Successfully !</font></h1>
	
<center>
<table width="398" height="325" border=1>
<form id="form1" name="form1" method="post" action="getImg.php">
<tr>
<td width="107">&nbsp;&nbsp;&nbsp;&nbsp;UserId</td>
<td width="275"><textarea name="id" style="width:275px;"><?php echo $row['User_Id'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;Password</td>
<td><textarea name="pwd" style="width:275px;"><?php echo $row['Password'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;UserName</td>
<td><textarea name="pub" style="width:275px;"><?php echo $row['Name'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;E-mail</td>
<td><textarea name="title" style="width:275px;"><?php echo $row['Email'] ?></textarea></td></tr>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;School</td>
<td><textarea name="edition" style="width:275px;"><?php echo $row['School'] ?></textarea></td></tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;Fine</td>
<td><textarea name="isbn" style="width:275px;"><?php echo $row['Penalty'] ?></textarea></td></tr>
</form>
<tr><td ><input type="button" value="Return To Login" onClick="window.location.href='index.php';"></td></tr>
</table>
</center>
</body>
</html>