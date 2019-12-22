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
$locationId = $_GET["locationId"];
/**
 * Created by PhpStorm.
 * User: liutai798661793
 * Date: 2017/12/19
 * Time: 20:25
 */
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title><?php
            $sqlSearchName = "SELECT locationName FROM location WHERE locationId = '".$locationId."'";
            $locationNameResult = mysqli_query($con,$sqlSearchName);
            while ($row1 = mysqli_fetch_row($locationNameResult))
            {
                $locationName = $row1[0] ;
            }
            echo $locationName."- odyssey 爱达晒" ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
</head>
    <body>
<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Wrapper -->
					<div id="wrapper">

						<!-- Panel (Banner) -->
							<section class="panel banner right">
								<div class="content color0 span-3-75">
									<h1 class="major"><!--[--><!--]--><br />
									<!--[--><?php echo $locationName ?><!--]--></h1>
									<p><!--[--><?php $sqlSearchIntroduction = "SELECT locationIntroduction FROM location WHERE locationId = '".$locationId."'";
									$locationIntroductionResult = mysqli_query($con,$sqlSearchIntroduction);
									while ($row1 = mysqli_fetch_row($locationIntroductionResult))
                                    {
                                        $locationIntroduction = $row1[0] ;
                                    }
                                    echo $locationIntroduction; ?></p>
<!--									<p>伊亚Oia<br />被称为拥有世界上最美日落的地方，位于$圣托里尼岛$北边。夕阳西下的时候，这里的游客总会蜂拥而来，找一个观赏日落的最佳位置静静地坐上一小时，看着太阳慢慢的落下，消失在地平线上。白色的房子、蓝顶的教堂、传统的风车在夕阳的照耀下总是能让人陶醉。</p>-->
									<ul class="actions">
										<li><a href="#first" class="button special color1 circle icon fa-angle-right">Next</a></li>
									</ul>
								</div>
								<div class="image filtered span-1-75" data-position="25% 25%">
									<?php $sqlImage1 = "SELECT locationImage1 FROM location WHERE locationId = '".$locationId."'";
                                    $locationImage1Result = mysqli_query($con,$sqlImage1);
                                    while ($row1 = mysqli_fetch_row($locationImage1Result))
                                    {
                                        $locationImage1 = $row1[0] ;
                                    }
                                    echo "<img src=".$locationImage1." alt=\"\" /></img>"?>
								</div>
							</section>

						<!-- Panel (Spotlight) -->
							<section class="panel spotlight medium right" id="first">
								<div class="content span-7">
									<h2 class="major"><?php $sqlLandmark = "SELECT locationLandmark FROM location WHERE locationId = '".$locationId."'";
                                        $sqlLandmarkResult = mysqli_query($con,$sqlLandmark);
                                        while ($row1 = mysqli_fetch_row($sqlLandmarkResult))
                                        {
                                            $landmark = $row1[0] ;
                                        }
                                        echo $landmark; ?></h2>
									<p><?php $sqlIntro2 = "SELECT locationIntroduction2 FROM location WHERE locationId = '".$locationId."'";
                                        $Intro2 = mysqli_query($con,$sqlIntro2);
                                        while ($row1 = mysqli_fetch_row($Intro2))
                                        {
                                            $Intro2Text = $row1[0] ;
                                        }
                                        echo $Intro2Text; ?></p>
									<ul class="actions">
										<li><a href="#first" class="button special color1 circle icon fa-angle-right">Next</a></li>
									</ul>
								</div>
								<div class="image filtered tinted" data-position="top left">
                                    <?php $sqlImage1 = "SELECT locationImage2 FROM location WHERE locationId = '".$locationId."'";
                                    $locationImage2Result = mysqli_query($con,$sqlImage1);
                                    while ($row1 = mysqli_fetch_row($locationImage2Result))
                                    {
                                        $locationImage2 = $row1[0] ;
                                    }
                                    echo "<img src=".$locationImage2." alt=\"\" /></img>"?>
								</div>
							</section>




						<!-- Panel -->
							<section class="panel color2-alt">

								<div class="inner columns aligned">



									<div class="span-1-5">

										<h4>喜欢这个景点么？</h4>
										<ul class="actions">
											<?php echo "<a class='button' onclick='window.location.href=\"../locationpage/addToCollection.php?locationId=".$locationId."\"'>加入收藏</a>"?>
										</ul>
										<ul class="actions">
                                            <?php echo "<a class='button' onclick='window.location.href=\"../locationpage/addToTripline.php?locationId=".$locationId."\"'>加入行程</a>"?>
										</ul>
										<ul class="actions">
										<li><a href="#first" class="button special color1 circle icon fa-angle-right">Next</a></li>
									</ul>

									</div>

                                    <div class="span-3" style="position:relative; height:400px; overflow:auto">

											<h3 class="major">评论区</h3>
											<br />

										<?php
                                        $sqlAllComment="SELECT * FROM locationcomment WHERE locationId = '".$locationId."'ORDER by locationCommentId desc" ;
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
                                            echo "<h4>$userName</h4>
											<blockquote>".$row["commentDate"]."<br /><br />".$row["commentContent"]."</blockquote>";

                                        }
                                        ?>




										</div>


									<div class="span-4-5">
										<h3 class="major">写评论</h3>
<!--                                        action = "../locationpage/publishLocationComment.php?locationId="'-->
										<form name = "writeComment" <?php echo "action = \"../locationpage/publishLocationComment.php?locationId=".$locationId."\""?>  onsubmit=""  method = "post" content="text/html; charset=utf-8">
											<div class="field">
												<label for="comment">评论</label>
												<textarea id="comment" name="comment" placeholder="开始你的评论" rows="2"></textarea>
											</div>
											<ul class="actions">
												<li><input type="submit" value="发布评论" class="special color2" /></li>
											</ul>
										</form>

									</div>





									</div>

							</section>


					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>