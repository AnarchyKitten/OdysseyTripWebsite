<?php


session_start();
$userId=$_SESSION['userId'];
$strategyid=$_GET['strategyId'];

$link=mysqli_connect("localhost","root","123456","odyssey");
mysqli_set_charset($link, "utf8");
$query="delete  from userstrategy where userId='{$userId}' and strategyId='{$strategyid}'";
$result=mysqli_query($link,$query);
echo "<script type=text/javascript>alert('删除成功！')</script>";

header("Location:collection.php");


?>