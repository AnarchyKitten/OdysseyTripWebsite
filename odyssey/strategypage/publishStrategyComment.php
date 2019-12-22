<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/18
 * Time: 15:08
 */
session_start();
//echo $_SESSION['userId'];
$comment = $_POST["comment"];
$strategyId = $_GET["strategyId"];
//echo $comment;
//if(trim($comment)==""||$comment==NULL)
//{
//    alert("请输入评论！");
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

$sql="INSERT INTO strategycomment (strategyId,strategyComment,commentDate,userId) VALUES ('".$strategyId."','".$comment."','".date('Y-m-d H:i:s',time()+3600*8)."','".$_SESSION['userId']."')";
//echo $sql;
$result = mysqli_query($con,$sql);
//echo $result;
////获取刚存入的strategyId
//$sqlAllComment="SELECT * FROM locationcomment";
////echo $sqlLatestId;
//$commentResult = mysqli_query($con,$sqlAllComment);
//$commentId = array();
//$userId = array();
//$commentContent = array();
//$commentDate = array();
//$locationId = array();
////格式var txt = '{"employees":[' +
////'{"firstName":"Bill","lastName":"Gates" },' +
////'{"firstName":"George","lastName":"Bush" },' +
////'{"firstName":"Thomas","lastName":"Carter" }]}';
////用substr()截取最后一个逗号 substr($str, -8,-2); // o worl 右起第8与右起第2之间的字符
//$json = '{"comment":[';
//while ($row = mysqli_fetch_array($commentResult))
//{
////    $commentId += $row["locationCommentId"];
////    $userId += $row["userId"];
////    $commentContent += $row["commentContent"];
////    $commentDate += $row["commentDate"];
//    $json = $json.'{"locationCommentId":"'.$row["locationCommentId"].'","commentContent":"'.$row["commentContent"].'","commentDate":"'.$row["commentDate"].'","locationId":"'.$row["locationId"].'"},';
//
////    echo $row["locationCommentId"] . " " . $row["commentContent"] . " " .$row["commentDate"] . " " .$row["locationId"];
////    echo "<br />";
//}
//$json = substr($json,0,-1);
//$json = $json.']}';
//echo $json;
//echo $commment;
mysqli_close($con);

//跳转
header("Location:strategy.php?strategyId=$strategyId");
exit;