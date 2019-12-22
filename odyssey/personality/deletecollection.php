<?php
session_start();
$userId=$_SESSION['userId'];
$locationid=$_GET['locationId'];

$link=mysqli_connect("localhost","root","123456","odyssey");
mysqli_set_charset($link, "utf8");
$query="delete  from userlocation where userId='{$userId}' and locationId='{$locationid}'";
//echo $query;
$result=mysqli_query($link,$query);

header("Location:collection.php");
echo "<script type=text/javascript>alert('删除成功！');</script>";

?>