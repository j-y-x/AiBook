			<?php/*
				$con = mysql_connect("localhost","","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("test", $con);
				$result = mysql_query("SELECT * FROM userinfo where User_Id='2014303362'");
  $row = mysql_fetch_array($result);
  $load=$row['Image'];
//  echo "<img src='$load'/>";
*/
?>







<?php

$file = $_FILES['file'];//�õ����������
//�õ��ļ�����
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); //�õ��ļ����ͣ����Ҷ�ת����Сд
$allow_type = array('jpg','jpeg','gif','png'); //���������ϴ�������
//�ж��ļ������Ƿ������ϴ�
if(!in_array($type, $allow_type)){
  //�������������ֱ��ֹͣ��������
  return ;
}
//�ж��Ƿ���ͨ��HTTP POST�ϴ���
if(!is_uploaded_file($file['tmp_name'])){
  //�������ͨ��HTTP POST�ϴ���
  return ;
}
$upload_path = "./123/"; //�ϴ��ļ��Ĵ��·��
//��ʼ�ƶ��ļ�����Ӧ���ļ���
$upload=$upload_path.$file['name'];
if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){

  	echo "Successfully!";
}else{
  echo "Failed!";
}





?>