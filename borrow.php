<html>
<head>
<title>Aibook</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php 
	echo "<form id='ssearch' method='post' action='borrow.php' name='search'>";
	echo "<input type='text' name='User_Id' value='' size='15'>";
	echo "<input type='text' name='Book_Id' value='' size='15'>";		
	echo "<input type='submit' value='Search'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "</form>";
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test";
$conn =mysql_connect("localhost","","");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $conn);
$sql="SELECT * FROM booksinfo where Book_Index='".$_POST['Book_Id']."'";
mysql_query('SET NAMES utf-8');
$result = mysql_query($sql,$conn)or die(mysql_error());
while($row = mysql_fetch_array($result))
  { 
	echo"			<h3>Book_name:". $row['Title'] ."</h3>";echo "<h4>Author:". $row['Author'] ."</h4>";
	echo"			<p>Book_index:" . $row['Book_Index'] . "&nbsp;&nbsp;&nbsp";echo "Publication:". $row['Publication'] ."</p>";
	echo"			<p>ISBN:" . $row['ISBN'] . "</p>";
	$load=$row['Image'];
	echo "<img src='$load'/>"; 
  }
  $User_Id=$_POST['User_Id'];
  $Book_Id=$_POST['Book_Id'];
	echo "<form id='borrow' method='post' action='borrow.php' name='borrow'>";
	echo "<input type='hidden' name='User_Id1' value='".$User_Id."'>";
	echo "<input type='hidden' name='Book_Id1' value='".$Book_Id."'>";
	echo "<input type='submit' value='Borrow'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
	echo "</form>";
	$sql2="UPDATE booksinfo SET Owner = '".$_POST['User_Id1']."',State= '2'
	WHERE Book_Index = '".$_POST['Book_Id1']."' and State='1'";
	$result2 = mysql_query($sql2,$conn)or die(mysql_error());
	if( mysql_num_rows($result2) )
	{ 
        $row = mysql_fetch_array($result2);
		$State= $row['State'];
		if($State==2){
			echo"<script> alert('Borrow success!');</script>";							
		}	
	} 
	else 
	{  
	mysql_error(); 
	}    
?>
</body>
</html>