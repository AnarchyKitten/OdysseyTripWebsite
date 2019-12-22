<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/24
 * Time: 15:35
 */
session_start();
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

$locationId = $_GET["locationId"];
$sql = "INSERT INTO userlocation (locationid,userid,intripline )VALUES ('".$locationId."','".$_SESSION['userId']."','1')";
//$strategyId 没拿到
//echo $sql ;
$result = mysqli_query($con,$sql);
mysqli_close($con);

//跳转
//这里有问题
header("Location:../personality/edittrip.php");
exit;