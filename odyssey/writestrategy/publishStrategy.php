<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/9
 * Time: 10:38
 */
session_start();
//echo $_SESSION['userId'];
//    $pattern = array(
//        '/ /',//半角下空格
//        '/　/',//全角下空格
//        '/\r\n/',//window 下换行符
//        '/\n/',//Linux && Unix 下换行符
//    );
//    $replace = array('&nbsp;','&nbsp;','<br />','<br />');
//$title = preg_replace($pattern, $replace, $_POST['title']);
//$content = preg_replace($pattern, $replace, $_POST['content']);
$title = $_POST["title"];
$content = $_POST["content"];
$strategyImage = "\"".$_POST["strategyImage"]."\"";
//if(trim($title)==""||trim($content)==""||$title==NULL||$content==NULL)
//{
//    alert("请输入标题和正文！");
//    return ;
//}
//echo $title."<br/>",$content;
//echo date('Y-m-d h:m:s',time());
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

$sql="INSERT INTO strategy (userId,strategyTitle,strategyContent,strategyDate,strategyImage) VALUES ('".$_SESSION['userId']."','".$title."','".$content."','".date('Y-m-d H:i:s',time()+3600*8)."','".$strategyImage."')";
//echo $sql;

$result = mysqli_query($con,$sql);

//获取刚存入的strategyId
$sqlLatestId="SELECT max(strategyId) FROM strategy WHERE userId = '".$_SESSION['userId']."'";
//echo $sqlLatestId;
$latestIdResult = mysqli_query($con,$sqlLatestId);
while ($row = mysqli_fetch_row($latestIdResult))
{
    $latestId = $row[0] ;
}
//$sql2="INSERT INTO userstrategy (strategyid,userid) VALUES ('".$latestId."','".$_SESSION['userId']."')";
////echo $sql;
//
//$result2 = mysqli_query($con,$sql2);

//echo $latestId;
mysqli_close($con);

//跳转
header("Location:publishSuccess.html?strategyId=$latestId");
exit;
