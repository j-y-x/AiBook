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
  <script language="javascript" src="js/sign.js">
  </script>
  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script> <!--引用jquery文件-->
  <title>Register</title>
</head>
<body background="backgroud.png">
  <h1 align="center"><font color="#663399" face="华文雅黑">Welcome Aibook System</font></h1>
    <div align="center"  style="padding:40px 0px 20px 0;">
      <form name="form1" method="post" action="sign_ok.php" onSubmit="return checkit()" enctype="multipart/form-data" style="border:1px solid #FFF;width:270px;padding:14px">
        UserId&nbsp;&nbsp;<input type="text" name="id" value="" /><br><br>
        Password&nbsp;<input type="password" name="pwd" value="" /><br><br>
        UserName&nbsp;<input type="text" name="name" value="" /><br><br>
        E-mail&nbsp;&nbsp;<input type="text" name="e" value=""/><br><br>
        School&nbsp;&nbsp;<input type="text" name="sch" value=""/><br><br>
        &nbsp;&nbsp;
        <input type="submit" name="submit1" id="submit1"  value="Submit"><br>
      </form>
    </div>
</body>
</html>