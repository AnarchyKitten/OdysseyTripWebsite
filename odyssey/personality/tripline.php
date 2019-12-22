<?php
session_start();
$link = mysqli_connect("localhost", "root", "123456", "odyssey");
mysqli_set_charset($link, "utf8");
$query = "select * from user where userid='{$_SESSION['userId']}'";
$result = mysqli_query($link, $query);
$userid = $_SESSION['userId'];
if (mysqli_num_rows($result) == 1) {
    $list = mysqli_fetch_array($result);
    $nickname = $list['nickname'];
    $cell = $list['cell'];
    $age = $list['age'];
    $sex = $list['sex'];
    $birthday = $list['birthday'];
    $userpic = $list['userpic'];
} else {
}
$query = "select * from userlocation where userid='{$_SESSION['userId']}'";
$result = mysqli_query($link, $query);
$size=0;
while ($row = mysqli_fetch_array($result)) {
    $array[] = $row['locationId'];
    $intripline[] = $row['intripline'];
    $query2 = "select * from location where locationId='{$row['locationId']}'";
    $result2 = mysqli_query($link, $query2);
    $list2 = mysqli_fetch_array($result2);
    $locationId[] = $list2['locationId'];
    $locationName[] = $list2['locationName'];
    $locationImage1[] = $list2['locationImage1'];
    $size++;
}

//$query = "select * from userlocation where userid='{$_SESSION['userId']}'";
//$result = mysqli_query($link, $query);
//$array=array();
//while ($row = mysqli_fetch_array($result)) {
//    $array[] = $row['locationid'];
//    $intripline[] = $row['intripline'];
//    $query2 = "select * from location where locaionid='{$row['locationid']}'";
//    $result2 = mysqli_query($link, $query2);
//    $list2 = mysqli_fetch_array($result2);
//    $locationid[] = $list2['locationId'];
//    $locationname[] = $list2['locationName'];
//    $locationimage1[]=$list2['locationImage1'];
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
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/to-do.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="../home/home.html" class="logo"><b>Odyssey</b></a>
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
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a
                            href="basicinformation.php"><?php echo "<img src='../userimg/$userpic'class='img-circle' width='60'>" ?></a>
                </p>
                <h5 class="centered"><?php echo "" . $nickname . "" ?></h5>

                <li class="mt">
                    <a href="basicinformation.php">
                        <i class="fa fa-dashboard"></i>
                        <span>个人信息</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="collection.php">
                        <i class="fa fa-desktop"></i>
                        <span>收藏</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a class="active" href="#">
                        <i class="fa fa-cogs"></i>
                        <span>个人计划</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="strategypublished.php">
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
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 您所收藏的景点</h3>

            <!-- SIMPLE TO DO LIST -->


            <!-- COMPLEX TO DO LIST -->
            <div class="row mt">
                <div class="col-md-12">
                    <section class="task-panel tasks-widget">
                        <div class="panel-heading">
                            <div class="pull-left"><h5><i class="fa fa-tasks"></i></h5></div>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="task-content">

                                <ul class="task-list">
                                    <li>
                                        <?php
                                        if ($size==0) {
                                            echo "您的行程中没有已添加的景点";
                                        } else {
                                            for($count=0;$count<$size;$count++)
                                            {
                                                echo "<div class='task-title'>
                                                      <a href='../locationpage/location.php?locationId=".$locationId[$count]."'><img src=".$locationImage1[$count]." height='50' alt=''></a>
                                                      <span class='task-title-sp'>" .$locationName[$count] . "</span>
                                                      <button class='btn btn-default btn-sm pull-right' name='delete' onclick='window.location.href=\"addtripline.php?locationId=".$locationId[$count]."&userId=".$userid."\"'>添加到我的行程中</button>
                                                      </div>";
                                            }


//                                            for ($count = 0; $count < $size; $count++) {
//                                                echo "<div class='task-title'>
//                                                      <a href='../locationpage/location.php?locationid=$locationid[$count]'><img src='$locationimage1[$count]' height='50' alt=''></a>
//                                                      <span class='task-title-sp'>" . $locationname[$count] . "</span>
//                                                      <button class='btn btn-default btn-sm pull-right' name='delete' onclick='window.location.href=\"addtripline.php?locationId=$locationid[$count]&userId=$userid\"'>添加到我的行程中</button>
//                                                      </div>";
//                                            }

                                        }

                                        ?>

                                    </li>
                                </ul>
                            </div>

                            <div class=" add-task-row">
                                <button class="btn btn-success btn-sm pull-left" onclick="<?php

                                ?>location='edittrip.php'">编辑我的行程
                                </button>
                            </div>
                        </div>
                    </section>
                </div><!-- /col-md-12-->
            </div><!-- /row -->


            <!-- SORTABLE TO DO LIST -->


        </section>
        <! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>Welcome to Odyssey</p>
            <a href="todo_list.html#" class="go-top">
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


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="assets/js/tasks.js" type="text/javascript"></script>

<script>
    jQuery(document).ready(function () {
        TaskList.initTaskWidget();
    });

    $(function () {
        $("#sortable").sortable();
        $("#sortable").disableSelection();
    });

</script>


<script>
    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
