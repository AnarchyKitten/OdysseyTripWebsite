<?php
session_start();
//$locationId = $_GET["locationId"];
$con = mysqli_connect('localhost','root','123456');
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"odyssey");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");
$strategyId = $_GET["strategyId"];
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
$sqlUserImage = "SELECT userpic FROM user WHERE userId = '".$userId."'";
$userpicResult = mysqli_query($con,$sqlUserImage);
while ($row = mysqli_fetch_row($userpicResult))
{
    $userpic = $row[0] ;
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
$sqlImage = "SELECT strategyImage FROM strategy WHERE strategyId = '".$strategyId."'";
$imageResult = mysqli_query($con,$sqlImage);
while ($row = mysqli_fetch_row($imageResult))
{
    $image = $row[0] ;
}
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/20
 * Time: 10:29
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Strategy &mdash; Odyssey</title>
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
    <link rel="stylesheet" href="css/skel.css">

</head>
<body class="single">

<div class="fh5co-loader"></div>

<div id="page">
    <div id="fh5co-aside" style="background-image: <?php echo"url(".substr($image,1,-1).")"?>" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <nav role="navigation">
            <ul>
                <li><a href="../home/home.php"><i class="icon-home"></i></a></li>
            </ul>
        </nav>
        <div class="page-title">
            <h2><?php echo $title?></h2>
        </div>
    </div>
    <div id="fh5co-main-content">
        <div class="fh5co-post">
            <a class="fh5co-entry padding">


                    <div class="page-title">

                        <img <?php echo"src='../userimg/$userpic'"?>  width="50px">
                        <span><?php echo $username?></span>


                        <br />
                        <span><?php echo $date?></span>


                    </div>


                    <br />
                    <p><?php echo $content?></p>

                <div <?php if($_SESSION['userId']==$userId) echo "";else echo"style=\"display:none\""?>>
                <?php echo "<a href=\"../writestrategy/updateStrategyPage.php?strategyId=".$strategyId."\""?> >编辑 </a>
                <?php echo "<a href=\"../writestrategy/deleteStrategy.php?strategyId=".$strategyId."\""?> >删除 </a>
                </div>




                    <!--
                    <ul class="actions">
                        <li ><a href="#" class="button" value="编辑"><p style="color: #FFFFFF">编辑</p></a></li>
                        <li ><a href="#" class="button" ><p style="color: #FFFFFF">删除</p></a></li>
                    </ul>
                    -->
                    <br />
                    <br />


                    <form method="post" action="addToCollection.php">
                        <ul class="actions">
                            <?php echo "<a href=\"../strategypage/addToCollection.php?strategyId=".$strategyId."\""?> >加入收藏 </a>
<!--                            <li ><input  --><?php //echo"type=\"hidden\" value=\"".$strategyId."\""?><!-- /></li>-->
<!--                            <li ><input class="button" type="submit" value="加入收藏" /></li>-->
                        </ul>
                    </form>

                    <!--
                    <ul class="actions">
                        <li ><a href="#" class="button" ><p style="color: #FFFFFF">加入收藏</p></a></li>
                    </ul>
                    <br />
                    <br />
                    -->


        <div>
            <h3>评论区：</h3>
            <br />
            <?php
            $sqlAllComment="SELECT * FROM strategycomment WHERE strategyId = '".$strategyId."'ORDER by strategyCommentId desc" ;
            //echo $sqlLatestId;
            $commentResult = mysqli_query($con,$sqlAllComment);

            //$json = '{"comment":[';
            while ($row = mysqli_fetch_array($commentResult))
            {
                $sqlSearchUser = "SELECT nickname FROM user WHERE userId = '".$row["userId"]."'";
                $userResult = mysqli_query($con,$sqlSearchUser);
                while ($row1 = mysqli_fetch_row($userResult))
                {
                    $userName = $row1[0] ;
                }
                //$json = $json.'{"userName":"'.$userName.'","commentContent":"'.$row["commentContent"].'","commentDate":"'.$row["commentDate"].'","locationId":"'.$row["locationId"].'"},';
                echo "
            <p>$userName</p >
            <blockquote>".$row["commentDate"]."<br /><br />".$row["strategyComment"]."</blockquote>
            <br />";

            }
            ?>


        </div>
        <br />
        <br />
        <br />
        <br />

                    <form <?php echo "action = \"../strategypage/publishStrategyComment.php?strategyId=".$strategyId."\""?>  onsubmit=""  method = "post">
                        <div class="row uniform half">
                            <div class="12u">

                                <textarea name="comment" id="comment" placeholder=" 评论..." rows="6" cols="95" style="width: 852px; height: 176px;border-radius:6px;background:#f8f8f8;border:solid 1px;border-color:#ddd;"></textarea>

                            </div>
                        </div>

                        <ul class="actions">
                            <li ><input class="button" type="submit" value="提交" /></li>
                        </ul>


                    </form>



                </div>
            </div>



        </div>
    </div>
</div>



<footer>
</footer>

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

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>攻略</title>-->
<!--</head>-->
<!--<body>-->
<!--<b>--><?php //echo $title ?><!--</b><span id = "title"><br/></span>-->
<!--<p>--><?php //echo $content ?><!--</p><span id = "content"></span>-->
<!---->
<!--</body>-->
<!--</html>-->
