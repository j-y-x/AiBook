<?php
    $conn=mysql_connect("localhost","root","") or die("数据库未连接".mysql_error());
    mysql_select_db("db_abook",$conn);
	session_start();
    echo $_SESSION['only'];
?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=gbk" />-->

<?php
$name=$_POST['bname'];
$author=$_POST['bauthor'];
$pub=$_POST['bpub'];
$uinfo=$_POST['uinfo'];
if(isset($_POST['requry'])){
    $query="select * from booksinfo";
    $result = mysql_query("select * from booksinfo where Publisher like('%".$_POST['bpub']."%') and Author like('%".$_POST['bauthor']."%') and TiTle like('%".$_POST['bname']."%')",$conn);   
}
?>

<html>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" type="text/css" href="css/search.css">
<body>
<!--导航栏 左侧-->
<div id="navcontainer"> 
<ul id="navlist"> 
<li id="active"><a href="search.php" id="current">Search Books</a></li> 
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
<!--<div id="bo2">-->


<input type="hidden" name="only" value="<?php echo $uinfo ?>"/>
<div class="bo3">
<table border=1>
<tr>
<td>BookShelfId</td>
<td>BookName</td>
<td>Author</td>
<td>Publisher</td>
<td>Description</td>
</tr>
<?php 
    while($myrow=mysql_fetch_array($result)){
?>
    <tr>
    <td><?php echo $myrow['Book_Index']; ?>&nbsp;</td>
    <td><?php echo $myrow['TiTle']; ?>&nbsp;</td>
    <td><?php echo $myrow['Author']; ?>&nbsp;</td>
    <td><?php echo $myrow['Publisher']; ?>&nbsp;</td>
    <td><div align="center"><a href="update.php?id=<?php echo $myrow['Book_Index']; ?>&uinfo=<?php echo $uinfo ?>">Detail</a>
	<input type="hidden" name="id" value="<?php echo $myrow['Book_Index']; ?>"/></div></td>
    </tr><br/>
<?php
    }
?>
</table>
</div><!--</div>-->
</div>
</body>
</html>