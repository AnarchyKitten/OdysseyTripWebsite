<?php
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/20
 * Time: 9:49
 */
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

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>攻略，在这里发现最棒的世界</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
    <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="freehtml5.co" />



    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script>
    </script>

</head>
<body>

<div class="fh5co-loader"></div>
<div id="page">
    <div id="fh5co-aside" style="background-image: url(images/strategylist.jpeg)">
        <div class="overlay"></div>
        <nav role="navigation">
            <ul>
                <li><a href="../home/home.php"><i class="icon-home"></i></a></li>
            </ul>
        </nav>
        <div class="featured">
            <span>Odyssey</span>
            <h2>攻略，告诉你如何在路上</h2>
        </div>
    </div>
    <div id="fh5co-main-content">
        <div class="fh5co-post">

            <div class="fh5co-entry padding">
                <div>
                    <form name = "searchStrategy" action = "searchStrategy.php" onsubmit="" method = "get" content="text/html; charset=utf-8">
                    <h3><input type="text" name="keywords" id="keywords" placeholder="请输入关键字" value="" /><input type="submit" name="button" value="搜索" /> </a></h3>
                </form>
                </div>
            </div>
<?php
$sqlStrategyList = "SELECT * FROM strategy order by strategyId desc";
$sqlListResult = mysqli_query($con,$sqlStrategyList);
while ($row = mysqli_fetch_array($sqlListResult))
{
    echo "<div class=\"fh5co-entry padding\">
                <img src=".$row["strategyImage"]." alt=\"Free HTML5 Bootstrap Template by FreeHTML5.co\">
                <div>
                    <span class=\"fh5co-post-date\">".$row["strategyDate"]."</span>
                    <h2><a href=../strategypage/strategy.php?strategyId=".$row["strategyId"].">".mb_substr(strip_tags($row["strategyTitle"]),0,23)."</a></h2>
                    <p>".mb_substr(strip_tags($row["strategyContent"]),0,30,'UTF-8')."..."."</p>
                </div>
            </div>";
}
?>



        </div>
        <footer>
            <div>
                &copy; 2017 odyssey <a href="../home/home.php" target="_blank" > - welcome to odyssey</a>
            </div>
        </footer>
    </div>
</div>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>

