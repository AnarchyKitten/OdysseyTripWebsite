<?php
session_start();
$link=mysqli_connect("localhost","root","123456","odyssey");
mysqli_set_charset($link, "utf8");
$query="select * from user where userid='{$_SESSION['userId']}'";
$result=mysqli_query($link,$query);
if(mysqli_num_rows($result)==1) {
    $list = mysqli_fetch_array($result);
    $nickname = $list['nickname'];
    $cell = $list['cell'];
    $age = $list['age'];
    $sex = $list['sex'];
    $birthday = $list['birthday'];
    $userpic = $list['userpic'];
}
else{}

//$query="select * from userlocation where userid='{$_SESSION['userId']}'";
//$result=mysqli_query($link,$query);
//while($row=mysqli_fetch_array($result)) {
//    $array[] = $row["locationid"];
//    $query2="select * from location where locationId='".$row["locationid"]."'";
//    $result2=mysqli_query($link,$query2);
//    $list2=mysqli_fetch_array($result2);
//    $locationid[]=$list2["locationId"];
//    $locationname[]=$list2["locationName"];
//    $locationimage[]=$list2["locationImage1"];
//}
//$size=sizeof($array);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>个人中心</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="../home/home." class="logo"><b>Odyssey</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <!-- inbox dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="../home/home.php">回到主页</a></li>
                <li><a class="logout" href="../login/login.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="basicinformation.php"><?php echo"<img src='../userimg/$userpic' class='img-circle' width='60'>"?></a></p>
                <h5 class="centered"><?php echo$nickname?></h5>

                <li class="mt">
                    <a href="basicinformation.php">
                        <i class="fa fa-dashboard"></i>
                        <span>个人信息</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="active" href="#" >
                        <i class="fa fa-desktop"></i>
                        <span>收藏</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="edittrip.php" >
                        <i class="fa fa-cogs"></i>
                        <span>个人计划</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="strategypublished.php" >
                        <i class="fa fa-book"></i>
                        <span>发布过的攻略</span>
                    </a>
                </li>


            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> 收藏内容</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <h3>景点：</h3>
                    <?php
                    $query="select * from userlocation where userid='{$_SESSION['userId']}'";
                    $result=mysqli_query($link,$query);
                    while($row=mysqli_fetch_array($result)) {
                        $array[] = $row["locationId"];
                        $query2="select * from location where locationId='".$row["locationId"]."'";
                        $result2=mysqli_query($link,$query2);
                        $list2=mysqli_fetch_array($result2);
                        echo "<div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-4 mb'>
                            <div class='product-panel-2 pn'>

                                <a href=../locationpage/location.php?locationId=".$list2["locationId"]."><img src=".$list2["locationImage1"]." height='200' alt=''></a>
                                <h5 class='mt'>".$list2["locationName"]."</h5>
                                <button class=\"btn btn-default btn-sm pull-right\" onclick='window.location.href=\"deletecollection.php?locationId=".$list2["locationId"]."\"'>删除</button>
                            </div>
                        </div>";
                    }

//                    for($count=0;$count<$size;$count++){
//                        echo $locationname[$count];
//                        echo "<div class='row'>
//                        <div class='col-lg-4 col-md-4 col-sm-4 mb'>
//                            <div class='product-panel-2 pn'>
//
//                                <a href='../locationpage/location.php?locationId=$locationid[$count]'><img src='$locationimage[$count]' height='200' alt=''></a>
//                                <h5 class='mt'>$locationname[$count]</h5>
//                                <button class=\"btn btn-default btn-sm pull-right\" onclick='window.location.href=\"deletecollection.php?locationId=$locationid[$count]\"'>删除</button>
//                            </div>
//                        </div>";
//                    }

                    ?>

                </div><!-- CHART PANELS -->


                    <! -- 5TH ROW OF PANELS --><!-- /END 5TH ROW OF PANELS -->


                    <! -- 6TH ROW OF PANELS -->
                <div class="col-lg-12">
                    <h3>攻略：</h3>
                    <?php $query="select * from userstrategy where userid='{$_SESSION['userId']}'";
                    $result=mysqli_query($link,$query);
                    while($row=mysqli_fetch_array($result)) {
                        $array[] = $row["strategyId"];
                        $query2="select * from strategy where strategyId='".$row["strategyId"]."'";
                        $result2=mysqli_query($link,$query2);
                        $list2=mysqli_fetch_array($result2);
//                        $locationid[]=$list2["locationId"];
//                        $locationname[]=$list2["locationName"];
//                        $locationimage[]=$list2["locationImage1"];
                        echo "<div class='row'>
                        <div class='col-lg-4 col-md-4 col-sm-4 mb'>
                            <div class='product-panel-2 pn'>

                                <a href=../strategypage/strategy.php?strategyId=".$list2["strategyId"]."><img src=".$list2["strategyImage"]." height='200' alt=''></a>
                                <h5 class='mt'>".$list2["strategyTitle"]."</h5>
                                <button class=\"btn btn-default btn-sm pull-right\" onclick='window.location.href=\"deletestrategycollection.php?strategyId=".$list2["strategyId"]."\"'>删除</button>
                            </div>
                        </div>";
                    }?>
                </div>


                </div>
            </div>

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>Welcome to Odyssey</p>
            <a href="panels.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>

<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>


<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
