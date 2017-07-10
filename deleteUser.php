<?php
	$con = mysql_connect('localhost','root','root');
	$db = mysql_select_db('aibookdb',$con);
	$delete_user_id = $_POST['delete_user_id'];
	$sql_del = "delete from userinfo where User_Id = '$delete_user_id'";
	$url = "./deleteUser.html";
	$sql_exist ="select * from userinfo where User_Id = '$delete_user_id'";
	$exist_result = mysql_query($sql_exist,$con);
	$x = mysql_num_rows($exist_result);
	if($x == 0){
		echo "<script type='text/javascript' language='javascript'>;alert('Failed!');window.location.href='$url';</script>";
	}
	else{
		if(!mysql_query($sql_del,$con))
		{
			die('Error: '.mysql_error());
		}
		echo "<script type='text/javascript' language='javascript'>;alert('Success!');window.location.href='$url';</script>";
	}
	mysql_close($con);
?>