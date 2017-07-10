<?xml version="1.0" encoding="gb2312"?>
<?php 
if(isset($_GET['id'])) { 
$id = $_GET['id'];
$connect = MYSQL_CONNECT( "localhost", "root", "root") or die("Unable to connect to MySQL server"); 
mysql_select_db( "aibookdb") or die("Unable to select database"); 
$query = "select Image,Type from userinfo where User_Id=$id"; 
$result =mysql_query($query); 
$row=mysql_fetch_object($result); 
$data=$row->Image;
$data=base_convert($data,16,2);
Header( "Content-type: $row->Type"); 

} 
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
  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script> <!--引用jquery文件-->
  </head>
  <body>
  <?php 
        echo $data;?>
  </body>
  </html>