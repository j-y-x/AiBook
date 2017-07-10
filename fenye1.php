<?php
include 'fenye.php';

// 总记录数
$sql = "SELECT Book_Index  FROM  booksinfo ";
$totalnums = totalnums($sql);

// 每页显示条数
$fnum = 8;

// 翻页数
$pagenum = ceil($totalnums / $fnum);

// 页数常量
@$tmp = $_GET['page'];

//防止恶意翻页
if ($tmp > $pagenum)
    echo "<script>window.location.href='index.php'</script>";

//计算分页起始值
if ($tmp == "") {
    $num = 0;
} else {
    $num = ($tmp - 1) * $fnum;
}

// 查询语句
$sql = "SELECT Book_Index,Title FROM  booksinfo ORDER BY Book_Index DESC LIMIT  " . $num . ",$fnum";
$result = doresult($sql);

// 遍历输出
while (! ! $rows = dolists($result)) {
    echo $rows['Book_Index'] . " " . $rows['Title'] . "<br>";
}

// 翻页链接
for ($i = 0; $i < $pagenum; $i ++) {
    echo "<a href=fenye1.php?page=" . ($i + 1) . ">" . ($i + 1) . "</a>";
}
?>
