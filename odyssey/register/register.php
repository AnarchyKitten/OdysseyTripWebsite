<!DOCTYPE html>
<html>
<head>
    <title>注册</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="App Sign in Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>

</head>
<body>
<h1>Odyssey 注册</h1>
<div class="app-cam">
    <div class="cam"><img src="images/cam.png" class="img-responsive" alt="" /></div>
    <form method="post">
        <label><input type="text" class="text" name="email" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" ></label>
        <label><input type="text" class="text" name="nickname" value="Nickname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nickname';}" ></label>
        <label><input type="password" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"></label>
        <div><input type="submit" name="submit" value="注册"></div>
    </form>
</div>

</body>
</html>

<?php
//php接收表单user并添加至数据库中
$link = mysqli_connect('localhost', 'root', '123456', 'odyssey');
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}else {
    if (isset($_POST['submit'])){
        $query = "select * from user where email = '{$_POST['email']}'";
        $result = mysqli_query($link, $query);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email'])) {
            echo "<script type=text/javascript>alert('无效的 email 格式！')</script>";
        }
        else if(mysqli_num_rows($result) == 1)
        {
            echo "<script type=text/javascript>alert('Email已被他人注册！')</script>";
        }
        else if(empty($_POST['password']='Password'))
        {
            echo "<script type=text/javascript>alert('密码不得为空！')</script>";
        }
        else if($_POST['nickname']=='Nickname')
        {
            echo "<script type=text/javascript>alert('用户名不得为空！')</script>";
        }
        else
        {
            $query = "insert into user (email,password,nickname,userpic) 
values('{$_POST['email']}','{$_POST['password']}','{$_POST['nickname']}','defaultuserpic.jpg')";
            $result=mysqli_query($link, $query);
            echo "<script type=text/javascript>alert(\"您已成功在Odyssey注册\")</script>";
            header("Location:../login/login.php");
        }

        }
}
?>