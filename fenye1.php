<?php
include 'fenye.php';

// �ܼ�¼��
$sql = "SELECT Book_Index  FROM  booksinfo ";
$totalnums = totalnums($sql);

// ÿҳ��ʾ����
$fnum = 8;

// ��ҳ��
$pagenum = ceil($totalnums / $fnum);

// ҳ������
@$tmp = $_GET['page'];

//��ֹ���ⷭҳ
if ($tmp > $pagenum)
    echo "<script>window.location.href='index.php'</script>";

//�����ҳ��ʼֵ
if ($tmp == "") {
    $num = 0;
} else {
    $num = ($tmp - 1) * $fnum;
}

// ��ѯ���
$sql = "SELECT Book_Index,Title FROM  booksinfo ORDER BY Book_Index DESC LIMIT  " . $num . ",$fnum";
$result = doresult($sql);

// �������
while (! ! $rows = dolists($result)) {
    echo $rows['Book_Index'] . " " . $rows['Title'] . "<br>";
}

// ��ҳ����
for ($i = 0; $i < $pagenum; $i ++) {
    echo "<a href=fenye1.php?page=" . ($i + 1) . ">" . ($i + 1) . "</a>";
}
?>
