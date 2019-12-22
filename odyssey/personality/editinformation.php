<?php
session_start();
$link=mysqli_connect("localhost","root","123456","odyssey");
mysqli_set_charset($link, "utf8");
$query="select * from user where userId='{$_SESSION['userId']}'";
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
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

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
                <li><a class="logout" href="../login/login.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start 侧标框-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="basicinformation.php"><?php echo"<img src='../userimg/$userpic'class='img-circle' width='60'>"?></a></p>
                <h5 class="centered"><?php echo$nickname?></h5>

                <li class="mt">
                    <a class="active" href="#">
                        <i class="fa fa-dashboard"></i>
                        <span>个人信息</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="collection.php" >
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
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 个人信息</h3>

            <!-- SIMPLE TO DO LIST -->



            <!-- COMPLEX TO DO LIST -->
            <div class="row mt">
                <div class="col-md-12">
                    <section class="task-panel tasks-widget">
                        <div class="panel-heading">
                            <div class="pull-left"><h5><i class="fa fa-tasks"></i> 修改个人信息</h5></div>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="task-content">

                                <ul class="task-list">
                                    <li>

                                        <div class="task-title">
                                            <span class="task-title-sp">头像：<?php echo"<a href='edituserpic.php'><img src='../userimg/$userpic'class='img-circle' width='60' alt='头像无法读取'></a>"?></span>
                                        </div>
                                    </li>
                                    <br/>

                                    <br/>
                                    <li>
                                        <div class="task-title">
                                            <form method="post">
                                                <label>用户名：<input type="text" class="text" name="nickname" value="<?php echo"$nickname";?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = <?php echo"'$nickname'";?>;}" ></label><br/>
                                                <label>手机号：<input type="text" class="text" name="cell" value="<?php echo"$cell";?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = <?php echo"$cell";?>;}" ></label><br/>
                                                <label>性别：<input type="text" class="text" name="sex" value="<?php echo"$sex";?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = <?php echo"'$sex'";?>;}" ></label><br/>
                                                <label>生日：<input type="date" class="text" name="birthday" value="<?php echo"$birthday"?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = <?php echo"$birthday";?>;}" ></label><br/>
                                                <div><input type="submit" name="submit2" value="修改个人信息"></div>
                                            </form>
                                            <?php
                                            if (isset($_POST['submit2'])) {
                                                $age = 0;
                                                if (!empty($_POST['birthday'])) {
                                                    $age = strtotime($_POST['birthday']);
                                                    if ($age === false) {
                                                        return 0;
                                                    }
                                                    list($y1, $m1, $d1) = explode("-", date("Y-m-d", $age));
                                                    list($y2, $m2, $d2) = explode("-", date("Y-m-d"), time());
                                                    $age = $y2 - $y1;
                                                    if ((int)($m2 . $d2) < (int)($m1 . $d1)) {
                                                        $age -= 1;
                                                    }
                                                }
                                                $query = "update user set nickname='{$_POST['nickname']}',cell='{$_POST['cell']}',age='{$age}',sex='{$_POST['sex']}',birthday='{$_POST['birthday']}'where userid='{$_SESSION['userId']}'";
                                                $result = mysqli_query($link, $query);
                                                if ($result) {
                                                    echo '<script>alert("提交成功！");location.href="../personality/basicinformation.php"</script>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </li>
                                    <br>
                                    <br>
                                    <br>
                                    <li><a class="logout" href="../personality/basicinformation.php">返回个人中心页面</a></li>
                                </ul>
                            </div>

                        </div>
                    </section>
                </div><!-- /col-md-12-->
            </div><!-- /row -->


            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <!-- SORTABLE TO DO LIST -->


        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>Welcome to Odyssey</p>
            <a href="index.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/jquery.sparkline.js"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="assets/js/gritter-conf.js"></script>

<!--script for this page-->
<script src="assets/js/sparkline-chart.js"></script>
<script src="assets/js/zabuto_calendar.js"></script>


<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>


</body>
</html>