<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/10
 * Time: 14:41
 */
//session_start();
//echo $_SESSION['name'];
$strategyId=$_GET["strategyId"];
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

//$sql="SELECT max(strategyId) FROM strategy WHERE userId = '".$_SESSION['userId']."'";
//echo $sql;
//$latestIdResult = mysqli_query($con,$sql);
//while ($row = mysqli_fetch_row($latestIdResult))
//{
//    $latestId = $row[0] ;
//}


$sqlTitle="SELECT strategyTitle FROM strategy WHERE strategyId = '".$strategyId."'";
$sqlContent = "SELECT strategyContent FROM strategy WHERE strategyId = '".$strategyId."'";
//echo $sqlTitle;

$titleResult = mysqli_query($con,$sqlTitle);
$contentResult = mysqli_query($con,$sqlContent);
while ($row = mysqli_fetch_row($titleResult))
{
    $title = $row[0] ;
}

while ($row = mysqli_fetch_row($contentResult))
{
    $content = $row[0] ;
}
header("content-type:text/html;charset=utf-8");
$json = '{"title":"'.$title.'","content":"'.$content.'"}';
echo $json;
mysqli_close($con);
exit;