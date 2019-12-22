<?php
session_start();
$userid=$_SESSION['userId'];
$locationid=$_GET['locationId'];

$link=mysqli_connect("localhost","root","123456","odyssey");
mysqli_set_charset($link, "utf8");
if($locationid=="all")
{
    $query="update userlocation set intripline=0 where userid='{$userid}'";
    $result=mysqli_query($link,$query);
}
else {
    $query2="update userlocation set intripline=0 where userid='{$userid}' and locationid='{$locationid}'";
    $result=mysqli_query($link,$query2);
}
echo "<script type=text/javascript>alert('删除成功！')</script>";
header("Location:../personality/edittrip.php");
?>