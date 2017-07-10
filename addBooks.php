<?php
$con = mysql_connect('localhost','root','root');
$db = mysql_select_db('db_abook',$con);
$book_index = $_POST['book_index'];
$title = $_POST['title'];
$author = $_POST['author'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];
$publish_date = $_POST['publish_date'];
$ISBN = $_POST['ISBN'];
$description = $_POST['description'];
$state = $_POST['state'];
$amount = $_POST['amount'];

$sql = "insert into booksinfo(Book_Index,Title,Author,Edition,Publisher,Publish_Date,ISBN,Description,State,Amount) values ('$book_index','$title','$author','$edition','$publisher','$publish_date','$ISBN','$description','$state','$amount')";
//$sql="insert into booksinfo(Book_index,Title,Author,Edition)values('$book_index','$title','$author','$edition')";
if(!mysql_query($sql,$con))
{
	die('Error: '.mysql_error());
}
$url = "./addBooks.html";
echo "<script type='text/javascript' language='javascript'>;alert('Success!');window.location.href='$url';</script>";
mysql_close($con);
?>