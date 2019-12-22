<?php   

	$conn = mysql_connect("localhost","root","") or die("数据库链接错误".mysql_error());  
	mysql_select_db("odyssey",$conn) or die("数据库访问错误".mysql_error());  

?>  