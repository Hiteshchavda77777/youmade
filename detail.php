<?php include("./include/header.php"); ?>
<?php include("./include/config.php"); ?>
<?php
$id = $_GET['id'];
$cid = $_GET['cid'];

//$cid = category id

if(!empty($id && $cid))
{

						if (isset($_GET['id'])) 
						{
							$res = mysqli_query($cn, "SELECT posting.*, signup.* FROM `posting` JOIN `signup` ON posting.p_s_id = signup.s_id WHERE posting.p_id =$id");
							#p_s_id = post_student_id
							#select all records from posting as well as signup,join both table, then compare   p_s_id = s_id  where p_id = $id

							$aaa = mysqli_query($cn, "SELECT * FROM `review` WHERE r_p_id = $id"); #for comment query
						}
						if (isset($_GET['cid']))
						{
							$my =  "select * from posting where p_c_id=$cid";
							$mayur1= mysqli_query($cn,$my)or die ("ERROR :".mysqli_error($cn));
						}
						if (isset($_POST['posted'])) 
						{
							$sid = $_SESSION['sid'];
							$sname = $_SESSION['fname'];
							$comment = $_POST['cmnt'];

							$ins = "INSERT INTO `review`(`r_s_id`, `r_p_id`, `r_name`, `r_comment`) VALUES ('$sid','$id','$sname','$comment')";
							$exe = mysqli_query($cn, $ins);
							if ($exe) {
						?>
								<script>
									window.onload = function() {
										alert("Commented Succesfully");
										window.location = "detail.php?id=<?php echo $id; ?>&cid=<?php echo $cid; ?>";
									}
								</script>
						<?php

							}
						}
}else{ 
	?>
		<script>
			window.onload = function() {
				//alert("ERROR");
				window.location = "admin/404.html";
			}
		</script>
	<?php
}
?>




<style>
	.img {
		display: inline-block;
		max-width: 100%;
		height: 50%;
		margin-bottom: 2%;

	}

	.comment-wrapper .panel-body {
		max-height: 650px;
		overflow: auto;
	}

	.comment-wrapper .media-list .media img {
		width: 64px;
		height: 64px;
		border: 2px solid #e5e7e8;
	}

	.comment-wrapper .media-list .media {
		border-bottom: 1px dashed #efefef;
		margin-bottom: 25px;
	}
</style>
<!-- breadcrumbs -->
<div class="container">
	<ol class="breadcrumb breadcrumb1 dtail">
		<li><a href="index.php">Home</a></li>
		<li class="active">Video Page</li>
	</ol>
	<div class="clearfix"> </div>
</div>
<!-- //breadcrumbs -->
<!-- products -->
<div class="products">
	<div class="container">
		<div class="flexslider">
				<?php
			while ($rec = mysqli_fetch_array($res)) {

				$ress = mysqli_query($cn, "select c_name from category where c_id='" . $rec['p_c_id'] . "'");
				$result1 = mysqli_fetch_array($ress);
			?>
				<div class="thumb-image detail_images" >
					<div class="embed-responsive embed-responsive-4by3">
						<iframe class="embed-responsive-item"  src="<?php echo $rec['p_video']; ?>" allow="autoplay; fullscreen" allowfullscreen></iframe>
					</div>
				</div>

				<div class="jumbotron">
					
					
						<?php if(!empty($result1))
						{
							$kk = "select s_name from signup where s_id = '".$rec['p_s_id']."' ";
							$gg = mysqli_query($cn,$kk);
							$ff = mysqli_fetch_array($gg);
						?>
							<i style="color:black !important; font-size:20px; "> <?php echo $rec['p_duration']; ?></i> &nbsp;   &nbsp; 
							<h3 class="fa fa-user" style="color:blue; font-size:20px; "></h3> &nbsp; 
							<i style=" color:black; font-size:20px; "> <?php echo $ff['s_name']; ?></i>
							<br><br>
							<h3 class="display-4">Category: <?php echo $result1['c_name']; ?></h3>
							<h3 class="display-4">Title: <?php echo $rec['p_title']; ?></h3>
							<p class="lead"><?php echo $rec['p_time']; ?></p>
							<p class="lead"><?php echo $rec['p_dec']; ?></p>
						<?php
						}
						else
						{
						?>
							<h3 class="display-4">Title: <?php echo $rec['p_title']; ?></h3>
							<p class="lead"><?php echo $rec['p_time']; ?></p>
							<p class="lead"><?php echo $rec['p_dec']; ?></p>
						<?php 
						} 
						?>
					
				</div>
			<?php
			}
			?>
			<div class="clearfix"> </div>
		</div>
		<!-- $$$-->
		<div class="row bootstrap snippets bootdeys">
			<div class="col-md-12 col-sm-12">
				<div class="comment-wrapper">
					<div class="panel panel-info">
						<div class="panel-heading">
							Comment
						</div>
						<div class="panel-body">
							<?php
							if (isset($_SESSION['snm'])) {
							?>
								<form method="POST">
									<textarea class="form-control" placeholder="write a comment..." rows="3" name="cmnt" required></textarea>
									<br>

									<input type="submit" class="btn btn-info pull-right" name="posted" value="Post">
								</form>
							<?php
								}
							else
							{
								
								echo '<p>Please <a href="login.php">Login</a> to Comment!</p>';
							}
							?>

							<div class="clearfix"></div>
							<hr>

							<ul class="media-list">
								<?php
								while ($bbb = mysqli_fetch_array($aaa)) 
								{
								?>
									<li class="media">
										<div class="media-body">
											<strong class="text-success"><?php echo $bbb['r_name']; ?></strong>
											<p>
												<?php echo $bbb['r_comment']; ?>
											</p>
										</div>
									</li>
								<?php
								}
								?>
							</ul>
						</div>
					</div>
					</div>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- products end -->

<!-- for category-->
<div class="welcome">
	<div class="container">
		<div class="welcome-info">
			<h3 class="w3ls-title">
			<?php 
				echo 'Related videos';
			?>
			</h3>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
					<div class="tabcontent-grids">			
						<?php
						while($mayur2 = mysqli_fetch_array($mayur1,MYSQLI_BOTH))
						{
							if($mayur2['p_id'] !== $id )
							{
								$xxxxx = $mayur2['p_s_id'];
								$yyyyy = mysqli_query($cn, "select s_name from signup where s_id = $xxxxx ");
								while($zzzzz = mysqli_fetch_array($yyyyy))
								{?>
									<div  style="margin: 0px; color: #FFF;  -webkit-border-radius: 3px;  -moz-border-radius: 3px; border-radius: 3px;  text-align: center; 
									-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33); -moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  -o-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
									-ms-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
									width: 257px; margin-bottom: 25px;  height:auto; min-height: 251px; max-height:251px;  float : left ; margin-left:25px; ">
					
										<div class="item">
											<a href="detail.php?id=<?php echo $mayur2['p_id']; ?>&cid=<?php echo $mayur2['p_c_id'];?>">
												<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
													<source src="<?php echo $mayur2['p_video']; ?>" type="video/mp4">
												</video>
											</a>
											
											<div style="font: 14px oblique;  height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
												<a style="color:gray !important;" href="detail.php?id=<?php echo $mayur2['p_id']; ?>&cid=<?php echo $mayur2['p_c_id'];?>">
												<?php 
												//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp;&nbsp; '; 
												echo '<i style="color:black !important;">'; 
												echo $mayur2['p_duration']; 
												echo '</i> &nbsp &nbsp';
												echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
												echo '<i style=" color:black;">'; 
												echo $zzzzz['s_name']; 
												echo '</i>';
												echo '<br>';
												echo $mayur2['p_title'];
												echo '<br>'; 
												echo $mayur2['p_time'];
												//echo '<br>';
												?> 
												</a>
											</div>
										</div>
									</div>
								<?php
								}
							}else{ echo ''; }
						}
						?>					
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>		
<!-- ***for category***-->


<div class="w3agile-ftr-top">
</div>
<?php include("include/footer.php"); ?>
