<?php

session_start();
$userId=$_SESSION['userId'];
$strategyId=$_GET['strategyId'];

$link=mysqli_connect("localhost","root","123456","odyssey");
mysqli_set_charset($link, "utf8");
$query="delete from strategy where userId='{$userId}' and strategyId='{$strategyId}'";
//echo $query;
$result=mysqli_query($link,$query);

header("Location:../personality/strategypublished.php");

?>