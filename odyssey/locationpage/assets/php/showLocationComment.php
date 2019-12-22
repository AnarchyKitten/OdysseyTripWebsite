<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/19
 * Time: 14:33
 */

session_start();
$locationId = $_GET["locationId"];
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
//获取刚存入的strategyId .$locationId.
$sqlAllComment="SELECT * FROM locationcomment WHERE locationId = '1'";
//echo $sqlLatestId;
$commentResult = mysqli_query($con,$sqlAllComment);

$json = '{"comment":[';
while ($row = mysqli_fetch_array($commentResult))
{
    $sqlSearchUser = "SELECT userName FROM user WHERE userId = '".$row["userId"]."'";
    $userResult = mysqli_query($con,$sqlSearchUser);
    while ($row1 = mysqli_fetch_row($userResult))
    {
        $userName = $row1[0] ;
    }
    $json = $json.'{"userName":"'.$userName.'","commentContent":"'.$row["commentContent"].'","commentDate":"'.$row["commentDate"].'","locationId":"'.$row["locationId"].'"},';
}
$json = substr($json,0,-1);
$json = $json.']}';
echo $json;
mysqli_close($con);
exit;