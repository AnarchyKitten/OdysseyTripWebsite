<?php
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

setlocale(LC_ALL,array('zh_CN.gbk','zh_CH.gb2312','zh_CN.gb18030'));
function get_file_line( $file_name, $line){
    $n = 0;
    $handle = fopen($file_name,'r');
    if ($handle) {
        while (!feof($handle)) {
            ++$n;
            $out = fgets($handle, 4096);
            if($line==$n) break;
        }
        fclose($handle);
    }
    if( $line==$n) return $out;
    return false;
}
$count=2;
while($count<=200){
    $line= get_file_line("city.csv", $count);
    $arr=explode(",",$line);
    $query = "select * from location where locationName='$arr[0]'";
    $rows=mysqli_query($con,$query);
    if (!mysqli_num_rows($rows)){
        $query = "insert into location (locationName,locationImage1,locationIntroduction,locationImage2,locationIntroduction2,locationLandmark) 
values('$arr[0]','\\\\locationpage\\\\images\\\\$arr[2]1.jpg','$arr[4]','\\\\locationpage\\\\images\\\\$arr[2]2.jpg','热度：$arr[3]','$arr[5]')";
        $result=mysqli_query($con, $query);
    }

    $count++;
}

?>