<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $con);
@session_start();
$file = $_FILES['file'];//得到传输的数据
//得到文件名称
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
  //如果不被允许，则直接停止程序运行
  return ;
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
  //如果不是通过HTTP POST上传的
  return ;
}
$upload_path = "./123/"; //上传文件的存放路径
//开始移动文件到相应的文件夹
$upload=$upload_path.$file['name'];
if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
  
  mysql_query("UPDATE booksinfo SET Image = '".$upload."' WHERE Book_Index='9787121194276'");
  echo "Successfully!<br/>";

}
  
else{
  echo "Failed!";
}

?>

   <a href="Personal.php">back</a>