<?php

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
?>
<?php

session_start();
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
$sqlStrategyList = "SELECT * FROM strategy order by strategyId desc";
$sqlStrategyListResult = mysqli_query($con,$sqlStrategyList);
$sqlLocationList = "SELECT * FROM location order by locationId desc";
$sqlLocationListResult = mysqli_query($con,$sqlLocationList);
$sqlUserInfo = "SELECT * FROM user WHERE userId = '".$_SESSION['userId']."'";
$sqlUserResult = mysqli_query($con,$sqlUserInfo );
while ($row = mysqli_fetch_array($sqlUserResult))
{
    $userpic = $row["userpic"];
    $nickname = $row["nickname"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Odyssey 爱达晒</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/Chart.js"></script>
    <script src="assets/js/modernizr.custom.js"></script>



    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-offset="0" data-target="#theMenu">

<!-- Menu -->
<header role="banner" class="transparent light">
    <div class="row">
        <div class="nav-inner row-content buffer-left buffer-right even clear-after">
            <div id="brand">
                <h1 class="reset"><!--<img src="img/logo.png" alt="logo">--></h1>
            </div><!-- brand -->
            <a id="menu-toggle" href="#"><i class="fa fa-bars fa-lg"></i></a>
            <nav> </nav>
        </div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="../home/home.php" title="HOME"><em class="ion-paper-airplane"></em><strong> Odyssey &nbsp; </strong><span><strong>爱达晒</strong></span></a></div>
                <!-- /.navbar-header -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"></li>
                        <li><a href="home.php">主页</a></li>
                        <li><a href="../strategylist/strategylist.php">攻略</a></li>
                        <li><a href="../locationlist/locationlist.php">景点</a></li>
                        <li><a href="#contact">联系我们</a></li>
                        <?php
                        error_reporting(0);
                        session_start();
                        include('../personality/assets/php/userinformation.php');
                        if(isset($_SESSION['userId']))
                        {
                            echo "
                            <li><a href=\"../writestrategy/writestrategy.html\">写攻略</a></li>
							<li><img src='../userimg/$userpic'  width=\"50\"></li>
							<li><a href=\"../personality/basicinformation.php\">$nickname</a></li>
							
							";
                        }
                        else
                        {
                            echo "<li><a href=\"../login/login.php\">登录/注册</a></li>";
                        }
                        ?>
                    </ul>
                    <!-- /.nav -->
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- row-content -->
    </div><!-- row -->
</header>




<!-- ========== HEADER SECTION ========== -->
<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <br>
        <h1>Odyssey</h1>
        <h2>爱达晒</h2>
        <div class="row">
            <br>
            <br>
            <br>
            <!--<div class="col-lg-6 col-lg-offset-3">
            </div>-->
        </div>
    </div><!-- /container -->
</div><!-- /headerwrap -->


<!-- ========== WHITE SECTION ========== -->
<div id="w">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>欢迎来到 <bold>Odyssey
                </h3>
                <div>
                    <form  role="form" id="mc-form" action = "homeSearch.php" onsubmit="" method = "get" content="text/html; charset=utf-8">
                        <h3><input type="text" class="form-control" name="keywords" id="keywords" placeholder="请输入关键字" <?php echo "value=\"".$_GET["keywords"]."\"" ?>/><input type="submit" name="button" value="搜索" /> </a></h3>
                    </form>
                </div>

<!--                <form role="form" id="mc-form" action = "homeSearch.php" method = "get" >-->
<!--                    <div class="input-group">-->
<!--                        <input type="search"  class="form-control" placeholder="请输入关键字" --><?php //echo "value=\"".$_GET["keywords"]."\"" ?><!-- name="EMAIL">-->
<!--                        <span class="input-group-btn">-->
<!--                  <button type="submit" class="btn btn-default" id="mc-subscribe" value="Subscribe" name="subscribe">Search<em class="fa fa-paper-plane"></em></button>-->
<!--                  </span> </div>-->
<!--                </form>-->

            </div>
        </div>
    </div><!-- /container -->
    <br />



    <!--
    <div>
        <form method="get">
            搜索:<input type="search" name="search1"/>
            <input type="submit" value="搜索"
        </form>
    </div>
    <br />
    -->
</div><!-- /w -->


<!-- ========== SERVICES - GREY SECTION ========== -->
<section id="strategy" name="strategy"></section>
<div id="g">
    <div class="container">
        <div class="row">
            <h3>攻略，在这里发现最棒的世界</h3>
            <br>
            <br>
            <?php
            if($_GET["keywords"]) {

                $sqlKeywords = "SELECT * FROM strategy WHERE strategyTitle LIKE '%".$_GET["keywords"]."%' or strategyContent LIKE '%".$_GET["keywords"]."%' order by strategyId desc ";
                $keywordsResult = mysqli_query($con,$sqlKeywords);
                while ($row = mysqli_fetch_array($keywordsResult))
                {
                    echo "<a href=../strategypage/strategy.php?strategyId=".$row["strategyId"]."> <div class=\"col-lg-3\">
                <img class=\"image1\" src=".$row["strategyImage"].">
                <h4>".$row["strategyTitle"]."</h4>
                <p>".mb_substr(strip_tags($row["strategyContent"]),0,50,'UTF-8')."……</p>
                </div></a>";
                }
            }
            else{$sqlStrategyList = "SELECT * FROM strategy order by strategyId desc";
                $sqlListResult = mysqli_query($con,$sqlStrategyList);
                while ($row = mysqli_fetch_array($sqlListResult))
                {
                    echo "<a href=../strategypage/strategy.php?strategyId=".$row["strategyId"]."> <div class=\"col-lg-3\">
                <img class=\"image1\" src=".$row["strategyImage"].">
                <h4>".$row["strategyTitle"]."</h4>
                <p>".mb_substr(strip_tags($row["strategyContent"]),0,50,'UTF-8')."……</p>
                </div></a>";
                }}
            ?>






            <a href="../strategylist/strategylist.php"><div class="col-lg-3">
                    <img class="image1" src="assets/img/Ellipsis.png">
                    <h4>了解更多</h4>
                </div></a>
        </div>
    </div><!-- /container -->
</div><!-- /g -->




<!-- ========== WHITE SECTION ========== -->
<div id="w">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h3>Life is like a running river, never return. Take advantage of the young, a trip to say go.
                </h3>
            </div>
        </div>
    </div><!-- /container -->
</div><!-- /w -->

<!-- ========== ABOUT - GREY SECTION ========== -->
<section id="location" name="location"></section>
<div id="g">
    <div class="container">
        <div class="row">
            <h3>景点，是最好的时间&最好的地点</h3>
            <br>
            <br>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <br>
                <br>
            </div>
            <div class="col-lg-2"></div>

<!--            <div class="col-lg-3 team">-->
<!--                <img class="image1" src="assets/img/i1.jpeg" >-->
<!--                <h4>外滩</h4>-->
<!---->
<!--                <p>--位于上海市中心黄浦区的黄浦江畔，是最具上海城市象征意义的景点之一。<br />--有人说“外滩的故事就是上海的故事”， 外滩的精华就在于52幢风格各异被称为“万国建筑博览”的外滩建筑群。</p>-->
<!---->
<!--            </div>-->
            <?php
            if($_GET["keywords"]){
                $sqlKeywords = "SELECT * FROM location WHERE locationName LIKE '%".$_GET["keywords"]."%' or locationIntroduction LIKE '%".$_GET["keywords"]."%' order by locationId desc ";
                $keywordsResult = mysqli_query($con,$sqlKeywords);
                while ($row = mysqli_fetch_array($keywordsResult))
                {
                    echo "<a href=../locationpage/location.php?locationId=".$row["locationId"]."> <div class=\"col-lg-3 team\">
                <img class=\"image1\" src=".$row["locationImage1"]. " >
                <h4>".$row["locationName"]. "</h4>
                <p>".mb_substr(strip_tags($row["locationIntroduction"]),0,30,'UTF-8')."</p>
            </div></a>";
                }
            }
            else{
                $sqlList = "SELECT * FROM location order by locationId desc";
                $sqlListResult = mysqli_query($con,$sqlList);
                while ($row = mysqli_fetch_array($sqlListResult)) {
                    echo "<a href=../locationpage/location.php?locationId=".$row["locationId"]."> <div class=\"col-lg-3 team\">
                <img class=\"image1\" src=".$row["locationImage1"]. " >
                <h4>".$row["locationName"]. "</h4>
                <p>".mb_substr(strip_tags($row["locationIntroduction"]),0,30,'UTF-8')."</p>
            </div></a>";
                }
            }
            ?>




            <!--            <div class="col-lg-3 team">-->
            <!--                <img class="image1" src="assets/img/i2.jpeg" >-->
            <!--                <h4>神户港</h4>-->
            <!---->
            <!--                <p>神户港是日本重要的港口，现在这里也是现代化的大型区域，非常适合徒步观光和游玩。港区建筑以现代设计感和灯光效果闻名，景色超级好。下面这些酒店，都可以在酒店内欣赏到神户港的美丽风光。</p>-->
            <!--                </div>-->
            <!---->
            <!--            <div class="col-lg-3 team">-->
            <!--                <img class="image1" src="assets/img/i3.jpeg" >-->
            <!--                <h4>普罗旺斯</h4>-->
            <!---->
            <!--                <p>从五月的戛纳电影节开始，一直到九月，都是普罗旺斯的旅游季节。这时候的普罗旺斯天气晴朗，温度适宜，是最适合旅行的时间。其中每年7月和8月，薰衣草和向日葵相继开放，会迎来普罗旺斯地区的旅游高峰期，此时前往旅行可以看到大片大片的花田。</p>-->
            <!---->
            <!--            </div>-->

            <a href="../locationlist/locationlist.php"><div class="col-lg-3 team">
                    <img class="image1" src="assets/img/Ellipsis.png">
                    <h4>了解更多</h4>
                </div></a>
        </div>
    </div><!-- /container -->
</div><!-- /g -->

<!-- ========== FOOTER SECTION ========== -->
<section id="contact" name="contact"></section>
<div id="f">
    <div class="container">
        <div class="row">
            <h3><b>CONTACT US</b></h3>
            <br>
            <div class="col-lg-4">
                <h3><b>Send Us A Message:</b></h3>
                <h3>suntengwork@163.com</h3>
                <br>
            </div>

            <div class="col-lg-4">
                <h3><b>Call Us:</b></h3>
                <h3>+8613122669063</h3>
                <br>
            </div>

            <div class="col-lg-4">
                <h3><b>We Are Social</b></h3>
                <p>
                    <a href="index.html#"><i class="icon-facebook"></i></a>
                    <a href="index.html#"><i class="icon-twitter"></i></a>
                    <a href="index.html#"><i class="icon-envelope"></i></a>
                </p>
                <br>
            </div>
        </div>
    </div>
</div><!-- /container -->
</div><!-- /f -->

<div id="c">
    <div class="container">
        <p>   </p>

    </div>
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/classie.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

