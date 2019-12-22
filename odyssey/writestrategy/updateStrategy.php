<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/21
 * Time: 10:46
 */
session_start();
$strategyId = $_POST["strategyId"];
//echo $strategyId;
$title = $_POST["title"];
$content = $_POST["content"];

$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

$sql="UPDATE strategy SET strategyTitle ='".$title."', strategyContent = '".$content."', strategyDate ='".date('Y-m-d H:i:s',time()+3600*8)."'WHERE strategyId ='".$strategyId."'";
//echo $sql;

$result = mysqli_query($con,$sql);

mysqli_close($con);

//跳转
header("Location:publishSuccess.html?strategyId=".$strategyId);
exit;