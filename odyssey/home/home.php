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

$sqlTotalStrategyList="SELECT * FROM strategy";
$sqlTotalStrategyListResult = mysqli_query($con,$sqlTotalStrategyList);
$StrategyCount=mysqli_num_rows($sqlTotalStrategyListResult);
$sqlTotalUserList="SELECT * FROM user";
$sqlTotalUserListResult = mysqli_query($con,$sqlTotalUserList);
$UserCount=mysqli_num_rows($sqlTotalUserListResult);
$sqlTotalLocationList="SELECT * FROM location";
$sqlTotalLocationListResult = mysqli_query($con,$sqlTotalLocationList);
$LocationCount=mysqli_num_rows($sqlTotalLocationListResult);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Odyssey 爱达晒</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Trendy Travel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

		function hideURLbar() {
            window.scrollTo(0, 1);
        }
	</script>
	<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Gudea:400,400i,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic,latin-ext" rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="agileits-banner">
		<div class="bnr-agileinfo">
			<!-- navigation -->
			<div class="top-nav w3-agiletop">
				<div class="container">
					<div class="navbar-header w3llogo">
						<h1><a href="home.php">Odyssey.info<span></span></a></h1>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<div class="w3menu navbar-right">
							<ul class="nav navbar">
								<li><a href="home.php" class="active">主页</a></li>
								<li><a href="../strategylist/strategylist.php">攻略</a></li>
								<li><a href="../locationlist/locationlist.php">景点</a></li>
								<li><a href="#contact" class="scroll">联系我们</a></li>
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
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- //navigation -->
			<!-- banner-text -->
			<div class="banner-w3text">
				<div class="container">
					<div class="w3l-agile">
					  <h2>爱达晒 <span>Sharing &amp; Exploring</span></h2>
					  <div class="banner-pw3l">
					    <p>生活不仅仅有眼前的苟且，还有诗和远方。</p>
					  </div>
						<div class="w3lsmore">
							<a href="single.html" class="button-pipaluk button--inverted" data-toggle="modal" data-target="#myModal1"> Read More</a>
					  </div>
					</div>
				</div>
			</div>
			<!-- //banner-text -->
		</div>
	</div>
	<!-- Modal2 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4>ODYSSEY-爱达晒旅游网</h4>
					<img src="images/g1.jpg" alt=" " class="img-responsive">
					<h5>工作、学习，繁忙而平凡的事务占据了我们的生活，使我们忘记了对远方的追寻，然而生活在别处，是时候拿起行囊了。</h5>
					<p>Odyssey是一个智能旅游网站。该网站集旅游攻略，景点介绍于一身，一站式为用户解决对景点了解太少，出行难等一系列问题。在该网站上，通过注册用户，网站的使用者既可以在线搜索新鲜刺激的他人攻略，查询相关景点信息，也可以在线实时分享自己的旅游攻略，让他人了解关于你，关于这个世界的绚烂与美好。在这里，你可以收藏自己喜欢的攻略与景点，并将其添加到自己的日程安排之中。当身与心至少有一个在路上的时候，别忘了Odyssey的陪伴。</p>
				</div>
			</div>
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //banner -->
	<!-- Stats -->
	<div class="stats services news-w3layouts">
		<div class="container">
			<div class="stats-agileinfo agileits-w3layouts">
				<div class="col-sm-4 col-xs-4 stats-grid">
                    <?php echo"<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max=".$UserCount." data-delay='3' data-increment=\"1\">".$UserCount."</div>";?>
					<h6>USERS</h6>
				</div>
				<div class="col-sm-4 col-xs-4 stats-grid">
					<?php echo"<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max=".$StrategyCount." data-delay='3' data-increment=\"1\">".$StrategyCount."</div>";?>
					<h6>STRATEGIES</h6>
				</div>
				<div class="col-sm-4 col-xs-4 stats-grid">
                    <?php echo"<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max=".$LocationCount." data-delay='3' data-increment=\"1\">".$LocationCount."</div>";?>
					<h6>DESTINATIONS</h6>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<!-- //Stats -->
	<div class="footer-top">
		<div class="container">
			<div class="col-xs-8 agile-leftmk">
				<h3 class="title-w3-agile">试试好用的搜索功能</h3>
				<form role="form" id="mc-form" action = "homeSearch.php" onsubmit="" method = "get" content="text/html; charset=utf-8">
					<input type="text" placeholder="请输入关键字" name="keywords" id="keywords" value="" >
					<input type="submit" name="button" value="搜索" >
				</form>
			</div>
			<div class="col-xs-4 w3l-rightmk">
				<img src="images/4.png" alt=" ">
			</div>
		</div>
	</div>
	<!-- about -->
	<!-- //middle -->
	<!-- Gallery -->
	<div id="gallery" class="gallery">
		<div class="container">
			<h3 class="title-w3-agile">攻略，发现最棒的世界</h3>
		</div>
		<div class="agileinfo-gallery-row">
            <?php $count=0;
            while ($row = mysqli_fetch_array($sqlStrategyListResult))
            {
                echo"<div class=\"col-md-3 col-sm-3 col-xs-6 w3gallery-grids\">
                <a href=../strategypage/strategy.php?strategyId=".$row["strategyId"]." class=\"imghvr-hinge-right figure\">
                <img src=".$row["strategyImage"]." alt=\"\" title=\"example\" height='200px' width='100%'/>
                <div class=\"agile-figcaption\">
                <h4>".$row["strategyTitle"]."</h4>
                <p>点击浏览</p>
                </div></a></div>";
                $count++;
                if ($count==3) break;
            }?>
			<div class="col-md-3 col-sm-3 col-xs-6 w3gallery-grids">
				<a href="../strategylist/strategylist.php" class="imghvr-hinge-right figure">
				<img src="assets/img/Ellipsis.png" alt="" title="Trendy Travel Image"/>

			</a>
			</div>


			<div class="clearfix"> </div>

		</div>
	</div>
	<!-- //Gallery -->
	<!-- team -->
	<div class="team" id="team">
		<div class="container">
			<h3 class="title-w3-agile">景点，最好的时间&地点</h3>
			<div class="team-grids">
				<ul class="ch-grid">
                    <?php $count=0;
                    while ($row = mysqli_fetch_array($sqlLocationListResult)){
                        echo"<li class=\"col-xs-3 ch-grid-item\">
						<div class=\"ch-item ch-img-1\">
							<a href=../locationpage/location.php?locationId=".$row["locationId"].">
							<img class='image' width='256' src=".$row["locationImage1"]. " >
							</a>
						</div>
						<div class=\"ch-info\">
							<h3>".$row["locationName"]. "</h3>
							<p>".mb_substr(strip_tags($row["locationIntroduction"]),0,30,'UTF-8')."......</p>
							<div></div>

						</div>
					</li>";
                        $count++;
                        if ($count==3) break;
                    }

                    ?>

					<li class="col-xs-3 ch-grid-item">
						<div class="ch-item ch-img-4">
                            <a href="../locationlist/locationlist.php">
							<img src="assets/img/Ellipsis.png" alt=" ">
                            </a>
						</div>
						<div class="ch-info">
							<h3>了解更多</h3>
							<div></div>

						</div>
					</li>
				</ul>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="footer-agile" id="contact">
		<div class="container">
			<div class="footer-btm-agileinfo">
				<div class="col-md-4 col-xs-4 footer-grid">
					<h3>Contrat Us</h3>
					<ul>
                        <li><i class="fa fa-phone"></i>+86-13167228792</li>

                        <li><i class="fa fa-home"></i>上海市杨浦区国定路777号上海财经大学</li>
                        <li><i class="fa fa-envelope-o"></i>jerry_qq1996@sina.com</li>
					</ul>
				</div>
				<div class="col-md-8 col-xs-8 footer-grid footer-review">
					<h3>Few Words</h3>
					<p>随着不断的学习与研究，我们仍在不断更新网站的功能与界面。本网站在最开始是一项课程的课程作业，是对于PHP、HTML+CSS+JAVASCRIPT等知识的运用。所谓“知行合一”既是如此。</p>
					<p class="w3l-para-mk">由于对于旅游的热爱，我们开发了Odyssey这个智能旅游网站，在这一阶段他看上去并没有那么智能，仅仅提供了一些爬虫与搜索功能，核心仍是攻略、景点等基础功能。但谁知道呢，总有一天我会回来继续开发这个网站的。</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="footer-agilem">
				<div class="col-sm-12 col-xs-12 copy-w3lsright">
					<p>© 2018 Odyssey.info. All rights reserved | Design by Jerry</p>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //footer end here -->

	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- Progressive-Effects-Animation-JavaScript -->
	<script type="text/javascript" src="js/numscroller-1.0.js"></script>
	<!-- //Progressive-Effects-Animation-JavaScript -->
	<!-- responsiveslides -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
// You can also use "$(window).load(function() {"
$(function () {
    // Slideshow 4
    $("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
				after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
			});
		});
	</script>
	<!-- //responsiveslides -->
	<!-- simple-lightbox -->
	<script type="text/javascript" src="js/simple-lightbox.min.js"></script>
	<script>
$(function () {
    var gallery = $('.agileinfo-gallery-row a').simpleLightbox({
				navText: ['&lsaquo;', '&rsaquo;']
			});
		});
	</script>
	<link href='css/simplelightbox.min.css' rel='stylesheet' type='text/css'>
	<!-- Light-box css -->
	<!-- //simple-lightbox -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
    });
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };
        */

        $().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Flexslider-js -->
	<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
				visibleItems: 1,
				animationSpeed: 1000,
				autoPlay: false,
				autoPlaySpeed: 5000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
            portrait: {
                changePoint: 480,
						visibleItems: 1
					},
            landscape: {
                changePoint: 640,
						visibleItems: 1
					},
            tablet: {
                changePoint: 768,
						visibleItems: 1
					}
        }
			});
		});
	</script>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	<!-- //Flexslider-js -->
	<!-- Bootstrap core JavaScript
================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
	<!-- //Bootstrap core JavaScript -->

</body>

</html>