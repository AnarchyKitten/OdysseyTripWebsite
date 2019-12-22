<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/22
 * Time: 19:37
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
$sql = "SELECT * FROM user WHERE userId = '".$_SESSION["userId"]."'";
$result = mysqli_query($con,$sql);
while ($row1 = mysqli_fetch_rarray($result))
{
    $nickname = $row["nickname"] ;
    $userpic = $row["userpic"];
}