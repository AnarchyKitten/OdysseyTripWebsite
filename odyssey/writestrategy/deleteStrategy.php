<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/21
 * Time: 13:35
 */
session_start();
//$locationId = $_GET["locationId"];
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
$strategyId = $_GET["strategyId"];
$sqlTitle = "DELETE FROM strategy WHERE strategyId = '".$strategyId."'";
$titleResult = mysqli_query($con,$sqlTitle);
header("Location:../strategylist/strategylist.php");
exit;