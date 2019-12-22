<?php
session_start();
$link=mysqli_connect("localhost","root","123456","odyssey");

$userId=$_SESSION['userId'];
$locId=$_GET['locationId'];

$query="update userlocation set intripline=1 where userId='{$userId}' and locationId='{$locId}'";
$result=mysqli_query($link,$query);
echo "<script type=text/javascript>alert('添加成功！')</script>";
header("Location:../personality/tripline.php");


?>
