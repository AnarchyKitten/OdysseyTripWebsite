<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/18
 * Time: 10:35
 */
session_start();
//
$con = mysqli_connect('localhost', 'root', '123456');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con, "odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

//echo (empty($strategyId));
//取得最小/大的strategyId
    $sqlMin = "SELECT MIN(strategyId) FROM strategy";
    $sqlMax = "SELECT MAX(strategyId) FROM strategy";
//echo $sqlMin;
    $minStrategyId;
    $maxStrategyId;
    $minIdResult = mysqli_query($con, $sqlMin);
    $maxIdResult = mysqli_query($con, $sqlMax);
    if (!$minIdResult) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    if (!$maxIdResult) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    while ($row = mysqli_fetch_row($minIdResult)) {
        $minStrategyId = $row[0];
    }
//    echo $minStrategyId;
    while ($row = mysqli_fetch_row($maxIdResult)) {
        $maxStrategyId = $row[0];
    }
    if(empty($minStrategyId)){
        $minStrategyId = -1;}
    if(empty($maxStrategyId)){
        $maxStrategyId = -1;}
    $json = '{"minStrategyId":"'.$minStrategyId.'","maxStrategyId":"'.$maxStrategyId.'"}';
//    echo $json;
    echo $json;
mysqli_close($con);
exit;