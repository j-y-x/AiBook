<?php
// ���ݿ����ӳ���
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'test');

// �������ݿ�
function conn()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    mysqli_query($conn, "set names utf8");
    return $conn;
}

//��ý����
function doresult($sql){
   $result=mysqli_query(conn(), $sql);
   return  $result;
}

//�����תΪ���󼯺�
function dolists($result){
    return mysqli_fetch_array($result, MYSQL_ASSOC);
}

function totalnums($sql) {
    $result=mysqli_query(conn(), $sql);
    return $result->num_rows;
}




// �ر����ݿ�
function closedb()
{
    if (! mysqli_close()) {
        exit('�ر��쳣');
    }
}

?>
