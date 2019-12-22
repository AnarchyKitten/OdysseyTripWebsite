<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/21
 * Time: 10:34
 */
session_start();
$strategyId = $_GET["strategyId"];
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

$sqlTitle = "SELECT strategyTitle FROM strategy WHERE strategyId = '".$strategyId."'";
$titleResult = mysqli_query($con,$sqlTitle);
while ($row = mysqli_fetch_row($titleResult))
{
    $title = $row[0] ;
}
$sqlUserId = "SELECT userId FROM strategy WHERE strategyId = '".$strategyId."'";
$userResult = mysqli_query($con,$sqlUserId);
while ($row = mysqli_fetch_row($userResult))
{
    $userId = $row[0] ;
}
$sqlUsername = "SELECT nickname FROM user WHERE userId = '".$userId."'";
$usernameResult = mysqli_query($con,$sqlUsername);
while ($row = mysqli_fetch_row($usernameResult))
{
    $username = $row[0] ;
}
$sqlDate = "SELECT strategyDate FROM strategy WHERE strategyId = '".$strategyId."'";
$dateResult = mysqli_query($con,$sqlDate);
while ($row = mysqli_fetch_row($dateResult))
{
    $date = $row[0] ;
}
$sqlContent = "SELECT strategyContent FROM strategy WHERE strategyId = '".$strategyId."'";
$contentResult = mysqli_query($con,$sqlContent);
while ($row = mysqli_fetch_row($contentResult))
{
    $content = $row[0] ;
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑攻略</title>
    <link rel="stylesheet" href="editor/themes/default/default.css" />
    <link rel="stylesheet" href="editor/plugins/code/prettify.css" />
    <script charset="utf-8" src="editor/kindeditor-min.js"></script>
    <script charset="utf-8" src="editor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="editor/lang/zh-CN.js"></script>
    <script>
        function validateForm() {
            var x = document.forms["writeStrategy"]["title"].value;
            var y = document.forms["writeStrategy"]["content"].value;
            if (x == null || x == ""|| y == null || y == "" ) {
                alert("请输入标题和攻略内容。");
                return false;
            }
            return true;
        }
    </script>
    <script>
        KindEditor.ready(
            function(K) {
                var editor1 = K.create('textarea[name="content"]', {
                    cssPath : 'editor/plugins/code/prettify.css',
                    uploadJson : 'editor/php/upload_json.php',
                    fileManagerJson : 'editor/php/file_manager_json.php',
                    allowFileManager : true,
                    allowImageUpload : true,

                    afterCreate : function() {
                        var self = this;
                        K.ctrl(document, 13, function() {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                        K.ctrl(self.edit.doc, 13, function() {
                            self.sync();
                            K('form[name=example]')[0].submit();
                        });
                    }
                });
                prettyPrint();
            });
        KindEditor.ready(function(K) {
            var editor = K.editor({
                allowFileManager : true,
                allowImageUpload : true
            });
            K('#image1').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        imageUrl : K('#url1').val(),
                        clickFn : function(url, title, width, height, border, align) {
                            K('#url1').val(url);
                            editor.hideDialog();
                        }
                    });
                });
            });
        });
    </script>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body {
            background-image: url(../register/images/bg.jpg);
            margin-left: 400px;
            margin-right: 400px;
        }
        body,td,th {
            color: #FCF9F9;
        }
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container"></div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="publishSuccess/index.html" title="HOME"><em class="ion-paper-airplane"></em><strong> Odyssey &nbsp; </strong><span><strong>爱达晒</strong></span></a></div>
        <!-- /.navbar-header -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"></li>
                <li><a href="home.html">主页</a></li>
                <li><a href="login.html">登录</a></li>
                <li><a href="register.html">注册</a></li>
                <li><a href="strategylist.html">攻略</a></li>
                <li><a href="locationlist.html">景点</a></li>
                <li><a href="#contact">联系我们</a></li>
                <li><a href="../../writestrategy.html">写攻略</a></li>
            </ul>
            <!-- /.nav -->
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<div class="container"></div>
<div class="container"></div>
<div>
    <header>&nbsp;</header>
    <p>&nbsp; &nbsp;</p>
    <strong><b></b></strong>
    <h1 class="text-left"> &nbsp;-Write your stratege</h1>


    <form name="writeStrategy" method="post" action = "updateStrategy.php?" onsubmit = "return validateForm()">
        <input type="hidden" <?php echo "value=\"".$strategyId."\""?> name="strategyId" id="strategyId" />
        <p>标题：<input type="text" name="title" id="title" <?php echo "value=\"".$title."\"" ?> /></p>


        <p>封面图片：<input type="text" name="url1" id="url1" value="" /> <input type="button" id="image1" value="选择图片" />（网络图片 + 本地上传）</p>


        <p>内容：</p>
        <textarea name="content" <?php echo "value=\"".$content."\"" ?> style="width:700px;height:200px;visibility:hidden;"></textarea>
        <br />
        <input type="submit" name="button" value="提交" /> (提交快捷键: Ctrl + Enter)
    </form>

    <form class="col-lg-12">
        &nbsp;
    </form>
    <div class="row">
        <h3 class="text-center col-lg-offset-0 col-lg-12"><strong>景点，是最好的时间&amp;最好的地点</strong></h3>
        <br>
        <br>
        <div class="col-lg-2"></div>
        <div class="col-lg-8"> <br>
            <br>
        </div>
        <div class="col-lg-2"></div>
        <div class="team col-lg-4">
            <h4><strong>外滩</strong></h4>
            <img src="../home/assets/img/i1.jpeg" width="200" height="131" alt=""/>
            <p>位于上海市中心黄浦区的黄浦江畔，是最具上海城市象征意义的景点之一。<br>
                --有人说“外滩的故事就是上海的故事”， 外滩的精华就在于52幢风格各异被称为“万国建筑博览”的外滩建筑群。</p>
        </div>
        <div class="team col-lg-4">
            <h4><strong>神户港</strong></h4>
            <img src="../home/assets/img/i2.jpeg" width="200" height="114" alt=""/>
            <p>&nbsp;</p>
            <p>神户港是日本重要的港口，现在这里也是现代化的大型区域，非常适合徒步观光和游玩。港区建筑以现代设计感和灯光效果闻名，景色超级好。下面这些酒店，都可以在酒店内欣赏到神户港的美丽风光。</p>
        </div>
        <div class="team col-lg-4">
            <h4><strong>普罗旺斯</strong></h4>
            <img src="../home/assets/img/i3.jpeg" alt="" width="200" height="131"/>
            <p>从五月的戛纳电影节开始，一直到九月，都是普罗旺斯的旅游季节。这时候的普罗旺斯天气晴朗，温度适宜，是最适合旅行的时间。其中每年7月和8月，薰衣草和向日葵相继开放，会迎来普罗旺斯地区的旅游高峰期，此时前往旅行可以看到大片大片的花田。</p>
        </div>
    </div>
    <div id="f2">
        <div class="container"> </div>
    </div>
    <div id="c">
        <div class="container">
            <p> </p>
        </div>
    </div>
    <div id="f">
        <div class="container"> </div>
    </div>
</div>




</body>
</html>




