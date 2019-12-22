<!DOCTYPE html>
<html lang="en">
<head>
    <title>登录</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="App Sign in Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <!--webfonts-->
<!--    <link href='http://fonts.useso.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>-->
    <!--//webfonts-->
</head>


<body>
<h1>Odyssey 登录</h1>
<div class="app-cam">
    <div class="cam"><img src="images/cam.png" class="img-responsive" alt="" /></div>
    <form method="post">
        <label><input type="text" class="text" name="email" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" ></label>
        <label><input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"></label>
        <div><input type="submit" name="submit" value="登陆"></div>
        <div class="new">
            <p class="sign">新用户?请进入<a href="../register/register.php"> 注册界面</a></p>
            <div class="clear"></div>
        </div>
    </form>
</div>

</body>
</html>

<?php
$link = mysqli_connect('localhost', 'root', '123456', 'odyssey');
if (!$link){
    echo"<script>alert('数据库连接失败！')</script>";
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where email = '{$_POST['email']}' and password = '{$_POST['password']}'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            session_start();
            $_SESSION['logined']=1;
            $_SESSION['useremail']=$_POST['email'];
            $query = "select userid from user where email = '{$_POST['email']}'";
            $list=mysqli_fetch_array(mysqli_query($link, $query));
            $_SESSION['userId'] =$list['userid'];
            echo "<script type=text/javascript>alert('登陆成功！欢迎来到Odyssey！')</script>";
            header("Location:../home/home.php");
        }
        else{
            $query = "select userid from user where email = '{$_POST['email']}'";
            $result=mysqli_query($link,$query);
            if (mysqli_num_rows($result)==1) {
                echo "<script type=text/javascript>alert('密码错误！')</script>";
            }
            else
                echo "<script type=text/javascript>alert('用户名无效！')</script>";
        }

    }
}
?>