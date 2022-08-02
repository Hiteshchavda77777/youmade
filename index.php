<?php  include("include/header.php"); 
include("include/config.php");
?>
	<!-- //header -->

	<!-- banner -->
	<div class="banner" >
		<div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
			<div class="carousel-inner" role="listbox " style=" background-clip: padding-box !important;">
				<div class="item active">
					<img src="images/a.png" alt="" class="img-responsive" class="ads"/>
				</div>
				<div class="item">
					<img src="images/b.png" alt="" class="img-responsive" class="ads" />
				</div>
				<!--<div class="item">
					<img src="images/3.png" alt="" class="img-responsive" class="ads" />
				</div>
				<div class="item">
					<img src="images/4.png" alt="" class="img-responsive" class="ads" />
				</div>
				<div class="item">
					<img src="images/5.png" alt="" class="img-responsive" class="ads"/>
				</div>-->
			</div>
			<!-- Left-Button -->
			<a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<!-- Right-Button -->
			<a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
				<span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<script src="js/custom.js"></script>
	</div>
	<!-- //banner -->
	<!-- welcome -->
	<div class="welcome">
		<div class="container">
			<div class="welcome-info">

					<?php
					
					$pro = mysqli_query($cn, "select * from posting order by p_id desc LIMIT 0, 5");
					?>
					<h3 class="w3ls-title">Our Trending Videos</h3>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<div class="tabcontent-grids">
								<div id="owl-demo" class="owl-carousel">
								<?php
									while ($pre = mysqli_fetch_assoc($pro)) 
									{	
									
										$xxxxx = $pre['p_s_id'];
										$yyyyy = mysqli_query($cn, "select s_name from signup where s_id = $xxxxx ");
										while($zzzzz = mysqli_fetch_array($yyyyy)){
									?>		
										<div class="item">
											<div class="glry-w3agile-grids agileits">
												<a href="detail.php?id=<?php echo $pre['p_id']; ?>&cid=<?php echo $pre['p_c_id'];?>">
													<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
														<source src="<?php echo $pre['p_video']; ?>" type="video/mp4">
													</video>
												</a>
												
												<div style="font: 14px oblique;  height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
													<a style="color:gray !important;" href="detail.php?id=<?php echo $pre['p_id']; ?>&cid=<?php echo $pre['p_c_id'];?>">
															<?php
															//echo '<i class ="fa fa-clock-o"; style=" font-size:13px; color:red; text-align:left !important;" ></i> &nbsp; '; 
															echo '<i style="color:black !important;">'; 
															echo $pre['p_duration']; 
															echo '</i>  &nbsp';
															echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
															echo '<i style=" color:black;">'; 
															echo $zzzzz['s_name']; 
															echo '</i>';
															echo '<br>';															
															echo $pre['p_title']; 
															echo '<br>';
															echo $pre['p_time']; 
															//echo '<br>';
															?> 
													</a>
												</div>
											</div>
										</div>	
										
										
										<?php }} ?>
								</div>
							</div>
						</div>
					</div>
				<!--</div>-->
			</div>
		</div>
	</div>
	<!-- //welcome -->
				<div class="clerfix"> </div>
	<!--  category wise video display ( 1 START )-->
	<?php
	$res = mysqli_query($cn, "select c_name  from category");
	$mmmm = mysqli_query($cn, "select c_id  from category");
	while($pppp = mysqli_fetch_array($res))
	{
		$xxxx[]= $pppp['c_name'];
	}
	while($nnnn = mysqli_fetch_array($mmmm))
	{
		$qqqq[]= $nnnn['c_id'];
	}
	?>
	<div class="welcome">
		<div class="container">
		<div class="welcome-info">
			<h3 class="w3ls-title"><?php echo $xxxx[1]; ?></h3>
			<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			<div class="tabcontent-grids">			
					<?php
					$a = $qqqq[1];
					$b= 0;
					$c = 3;
					//$pr = mysqli_query($cn, "select * from posting where p_c_id = $a ");
					$pr = mysqli_query($cn, "select * from ( select * from posting  order by posting.p_id desc LIMIT 0,500) posting where p_c_id = '$a'");
					
						while($p = mysqli_fetch_array($pr))
						{		
										$aaaaa = $p['p_s_id'];
										$bbbbb = mysqli_query($cn, "select s_name from signup where s_id = $aaaaa ");
										while($ccccc = mysqli_fetch_array($bbbbb)){
							if($b <= $c){	
							?>
										<div id="owl-demo" style="color: #FFF;  -webkit-border-radius: 3px;  -moz-border-radius: 3px; border-radius: 3px;  text-align: center; 
										-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33); -moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  -o-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										-ms-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										width: 257px; margin-bottom: 25px;  height:auto; min-height: 251px; max-height:251px;  float : left ; margin-left:25px; ">
										
											<div class="item">
												<a href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<img type="image/*" src="<?php echo $p['p_thumb']; ?>"  style="min-width:257px !important; max-width:257px !important; min-height: 180px; max-height:180px; background-clip: borderbox;">
													</img>
													<!--<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
														<source src="<?php //echo $p['p_video']; ?>" type="video/mp4">
													</video>-->
													
												</a>
												<div style="font: 14px oblique;  height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
													<a style="color:gray !important;" href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<?php
													//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
													echo '<i style="color:black !important;">'; 
													echo $p['p_duration']; 
													echo '</i> &nbsp &nbsp';
													echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp;';
													echo '<i style=" color:black;" >'; 
													echo $ccccc['s_name']; 
													echo '</i>';
													echo '<br >';
													echo $p['p_title']; 
													echo '<br>'; 
													echo $p['p_time'];
													//echo '<br>';
													?> </a>
												</div>
											</div>
										</div>
										<?php 
										$b++;
									}}
						}
						?>					
				</div>
				</div>
				</div>
			</div>	
			</div>
		</div>
<!-- ****category wise video display ( 1_END ) **** -->
	
<!--  category wise video display (2 START ) -->
	<?php
	$res = mysqli_query($cn, "select c_name  from category");
	$mmmm = mysqli_query($cn, "select c_id  from category");
	while($pppp = mysqli_fetch_array($res))
	{
		$xxxx[]= $pppp['c_name'];
	}
	while($nnnn = mysqli_fetch_array($mmmm))
	{
		$qqqq[]= $nnnn['c_id'];
	}
	?>
	<div class="welcome">
		<div class="container">
		<div class="welcome-info">
			<h3 class="w3ls-title"><?php echo $xxxx[2]; ?></h3>
			<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			<div class="tabcontent-grids">			
					<?php
					$a = $qqqq[2];
					$b= 0;
					$c = 3;
					//$pr = mysqli_query($cn, "select * from posting where p_c_id = $a ");
					$pr = mysqli_query($cn, "select * from ( select * from posting  order by posting.p_id desc LIMIT 0,500) posting where p_c_id = '$a'");
					
						while($p = mysqli_fetch_array($pr))
						{
										$ddddd = $p['p_s_id'];
										$eeeee = mysqli_query($cn, "select s_name from signup where s_id = $ddddd ");
										while($fffff = mysqli_fetch_array($eeeee)){
							if($b <= $c){		?>
										<div id="owl-demo" style="margin: 0px; color: #FFF;  -webkit-border-radius: 3px;  -moz-border-radius: 3px; border-radius: 3px;  text-align: center; 
										-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33); -moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  -o-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										-ms-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										width: 257px; margin-bottom: 25px;  height:auto; min-height: 251px; max-height:251px;  float : left ; margin-left:25px; ">
										
											<div class="item">
												<a href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<img type="image/*" src="<?php echo $p['p_thumb']; ?>"  style="min-width:257px; max-width: 257px; min-height: 180px; max-height:180px; background-clip: borderbox;">
													</img>
													<!--<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
														<source src="<?php //echo $p['p_video']; ?>" type="video/mp4">
													</video>-->
												</a>
												<div style="font: 14px oblique;  height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
													<a style="color:gray !important;" href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<?php 
													//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
													echo '<i style="color:black !important;">'; 
													echo $p['p_duration']; 
													echo '</i> &nbsp &nbsp';
													echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
													echo '<i style=" color:black;">'; 
													echo $fffff['s_name']; 
													echo '</b>';
													echo '<br>';
													echo $p['p_title']; 
													echo '<br>'; 
													echo $p['p_time'];
													//echo '<br>';
													?> </a>
												</div>
											</div>
										</div>
										<?php 
										$b++;
										}}
						}
						?>					
				</div>
				</div>
				</div>
			</div>	
			</div>
		</div>
<!-- ****category wise video display ( 2_END **** -->

<!--  category wise video display (3 START ) -->
	<?php
	$res = mysqli_query($cn, "select c_name  from category");
	$mmmm = mysqli_query($cn, "select c_id  from category");
	while($pppp = mysqli_fetch_array($res))
	{
		$xxxx[]= $pppp['c_name'];
	}
	while($nnnn = mysqli_fetch_array($mmmm))
	{
		$qqqq[]= $nnnn['c_id'];
	}
	?>
	<div class="welcome">
		<div class="container">
		<div class="welcome-info">
			<h3 class="w3ls-title"><?php echo $xxxx[4]; ?></h3>
			<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			<div class="tabcontent-grids">			
					<?php
					$a = $qqqq[4];
					$b= 0;
					$c = 3;
					//$pr = mysqli_query($cn, "select * from posting where p_c_id = $a ");
					$pr = mysqli_query($cn, "select * from ( select * from posting  order by posting.p_id desc LIMIT 0,500) posting where p_c_id = '$a'");
					
						while($p = mysqli_fetch_array($pr))
						{
										$ddddd = $p['p_s_id'];
										$eeeee = mysqli_query($cn, "select s_name from signup where s_id = $ddddd ");
										while($fffff = mysqli_fetch_array($eeeee)){
							if($b <= $c){		?>
										<div id="owl-demo" style="margin: 0px; color: #FFF;  -webkit-border-radius: 3px;  -moz-border-radius: 3px; border-radius: 3px;  text-align: center; 
										-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33); -moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  -o-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										-ms-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										width: 257px; margin-bottom: 25px;  height:auto; min-height: 251px; max-height:251px;  float : left ; margin-left:25px; ">
										
											<div class="item">
												<a href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<img type="image/*" src="<?php echo $p['p_thumb']; ?>"  style="min-width:257px; max-width: 257px; min-height: 180px; max-height:180px; background-clip: borderbox;">
													</img>
													<!--<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
														<source src="<?php //echo $p['p_video']; ?>" type="video/mp4">
													</video>-->
												</a>
												<div style="font: 14px oblique;  height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
													<a style="color:gray !important;" href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<?php 
													//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
													echo '<i style="color:black !important;">'; 
													echo $p['p_duration']; 
													echo '</i> &nbsp &nbsp';
													echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
													echo '<i style=" color:black;">'; 
													echo $fffff['s_name']; 
													echo '</i>';
													echo '<br>';
													echo $p['p_title']; 
													echo '<br>'; 
													echo $p['p_time'];
													//echo '<br>';
													?> </a>
												</div>
											</div>
										</div>
										<?php 
										$b++;
										}}
						}
						?>					
				</div>
				</div>
				</div>
			</div>	
			</div>
		</div>
<!-- ****category wise video display ( 3_END )**** -->


<!--  category wise video display (4 START ) -->
	<?php
	$res = mysqli_query($cn, "select c_name  from category");
	$mmmm = mysqli_query($cn, "select c_id  from category");
	while($pppp = mysqli_fetch_array($res))
	{
		$xxxx[]= $pppp['c_name'];
	}
	while($nnnn = mysqli_fetch_array($mmmm))
	{
		$qqqq[]= $nnnn['c_id'];
	}
	?>
	<div class="welcome">
		<div class="container">
		<div class="welcome-info">
			<h3 class="w3ls-title"><?php echo $xxxx[0]; ?></h3>
			<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			<div class="tabcontent-grids">			
					<?php
					$a = $qqqq[0];
					$b= 0;
					$c = 3;
					//$pr = mysqli_query($cn, "select * from posting where p_c_id = $a ");
					$pr = mysqli_query($cn, "select * from ( select * from posting  order by posting.p_id desc LIMIT 0,500) posting where p_c_id = '$a'");
					
						while($p = mysqli_fetch_array($pr))
						{
										$ddddd = $p['p_s_id'];
										$eeeee = mysqli_query($cn, "select s_name from signup where s_id = $ddddd ");
										while($fffff = mysqli_fetch_array($eeeee)){
							if($b <= $c){		?>
										<div id="owl-demo" style="margin: 0px; color: #FFF;  -webkit-border-radius: 3px;  -moz-border-radius: 3px; border-radius: 3px;  text-align: center; 
										-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33); -moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  -o-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										-ms-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										width: 257px; margin-bottom: 25px;  height:auto; min-height: 251px; max-height:251px;  float : left ; margin-left:25px; ">
										
											<div class="item">
												<a href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<img type="image/*" src="<?php echo $p['p_thumb']; ?>"  style="min-width:257px; max-width: 257px; min-height: 180px; max-height:180px; background-clip: borderbox;">
													</img>
													<!--<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
														<source src="<?php //echo $p['p_video']; ?>" type="video/mp4">
													</video>-->
												</a>
												<div style=" font: 14px oblique; height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
													<a style="color:gray !important;" href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<?php 
													//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
													echo '<i style="color:black !important;">'; 
													echo $p['p_duration']; 
													echo '</i> &nbsp &nbsp';
													echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
													echo '<i style=" color:black;">'; 
													echo $fffff['s_name']; 
													echo '</i>';
													echo '<br>';
													echo $p['p_title']; 
													echo '<br>'; 
													echo $p['p_time'];
													//echo '<br>';
													?> </a>
												</div>
											</div>
										</div>
										<?php 
										$b++;
										}}
						}
						?>					
				</div>
				</div>
				</div>
			</div>	
			</div>
		</div>
<!-- ****category wise video display ( 4_END )**** -->
	
	<!--  category wise video display ( 5 START ) -->
	<?php
	$res = mysqli_query($cn, "select c_name  from category");
	$mmmm = mysqli_query($cn, "select c_id  from category");
	while($pppp = mysqli_fetch_array($res))
	{
		$xxxx[]= $pppp['c_name'];
	}
	while($nnnn = mysqli_fetch_array($mmmm))
	{
		$qqqq[]= $nnnn['c_id'];
	}
	?>
	<div class="welcome">
		<div class="container">
		<div class="welcome-info">
			<h3 class="w3ls-title"><?php echo $xxxx[3]; ?></h3>
			<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			<div class="tabcontent-grids">			
					<?php
					$a = $qqqq[3];
					$b= 0;
					$c = 3;
					//$pr = mysqli_query($cn, "select * from posting where p_c_id = $a ");
					$pr = mysqli_query($cn, "select * from ( select * from posting  order by posting.p_id desc LIMIT 0,500) posting where p_c_id = '$a'");
					
						while($p = mysqli_fetch_array($pr))
						{
										$ddddd = $p['p_s_id'];
										$eeeee = mysqli_query($cn, "select s_name from signup where s_id = $ddddd ");
										while($fffff = mysqli_fetch_array($eeeee)){
							if($b <= $c){		?>
										<div id="owl-demo" style="margin: 0px; color: #FFF;  -webkit-border-radius: 3px;  -moz-border-radius: 3px; border-radius: 3px;  text-align: center; 
										-webkit-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33); -moz-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  -o-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										-ms-box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);  box-shadow: 0px 0px 14px rgba(0, 0, 0, 0.33);
										width: 257px; margin-bottom: 25px;  height:auto; min-height: 251px; max-height:251px;  float : left ; margin-left:25px; ">
										
											<div class="item">
												<a href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<img type="image/*" src="<?php echo $p['p_thumb']; ?>"  style="min-width:257px; max-width: 257px; min-height: 180px; max-height:180px; background-clip: borderbox;">
													</img>
													<!--<video width="257"  style="height:auto; min-height: 180px; max-height:180px;" controls style=" background-clip: borderbox;  ">
														<source src="<?php //echo $p['p_video']; ?>" type="video/mp4">
													</video>-->
												</a>
												<div style="font: 14px oblique;  height:auto; width:auto; min-height:71px; max-height:71px; max-width: 300px !important; padding-left: 0px !important; margin:0px !important; background-color: white !important;"  >
													<a style="color:gray !important;" href="detail.php?id=<?php echo $p['p_id']; ?>&cid=<?php echo $p['p_c_id'];?>">
													<?php 
													//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
													echo '<i style="color:black !important;">'; 
													echo $p['p_duration']; 
													echo '</i> &nbsp &nbsp';
													echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
													echo '<i style=" color:black;">'; 
													echo $fffff['s_name']; 
													echo '</i>';
													echo '<br>';
													echo $p['p_title']; 
													echo '<br>'; 
													echo $p['p_time'];
													//echo '<br>';
													?> </a>
												</div>
											</div>
										</div>
										<?php 
										$b++;
										}}
						}
						?>					
				</div>
				</div>
				</div>
			</div>	
			</div>
		</div>
<!-- ****category wise video display ( 5_END )**** -->
	
	
	
	
	
	
	<!--<div class="deals">
		<div class="container">
			<h3 class="w3ls-title">Our Category </h3>
			<div class="deals-row">
				<?php
				while ($rec = mysqli_fetch_array($res)) {
				?>
					<div class="col-md-2 focus-grid w3focus-grid-mdl">
						<a href="products.php?id=<?php echo $rec['c_id']; ?>" class="wthree-btn wthree ">
							<h4 class="clrchg"><?php echo $rec['c_name']; ?></h4>
						</a>
					</div>
				<?php
				}
				?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>-->
	
	<!-- //deals -->
	<!-- footer-top -->
	<div class="w3agile-ftr-top">
	</div>
	<!-- //footer-top -->
	<!-- subscribe -->
	<!-- //subscribe -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-3 address-left agileinfo">
					<div class="footer-logo header-logo">
						<?php 
						echo '<a href="index.php"><img src="images/logo.png" style="width:200px; height:100px; "></a>';
						?>
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i>rajkot, gujrat-360005</li>
						<li><i class="fa fa-mobile"></i> 123-456-7890 </li>
						<li><i class="fa fa-phone"></i> 123-456-7890 </li>
						<li><i class="fa fa-envelope-o"></i> <a href="#">youmade@gmail.com</a></li>
					</ul>
				</div>
				<div class="col-md-8 address-right">
					<div class="col-md-4 footer-grids">

					</div>
					<div class="col-md-4 footer-grids" style="margin-top:100px;">
						<h3><?php echo 'you made';  ?></h3>
						<ul>

							<?php
							if (!isset($_SESSION['snm'])) {
							?>
								<li><a href="signup.php">Signup</a></li>
								<li><a href="login.php">Login</a></li>
							<?php
							}
							?>
							<li><a href="contact.php">Contact</a></li>
						</ul>

					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //footer -->
	<div class="copy-right">
		<div class="container">
			<p><?php echo date('Y'); ?> <?php echo 'You Made . All rights reserved | Design by ::';?> <a href="index.php"><?php echo 'you made'; ?></a></p>
		</div>
	</div>
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
		w3ls.render();

		w3ls.cart.on('w3sb_checkout', function(evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {
					items[i].set('shipping', 0);
					items[i].set('shipping2', 0);
				}
			}
		});
	</script>
	<!-- //cart-js -->
	<!-- countdown.js -->
	<script src="js/jquery.knob.js"></script>
	<script src="js/jquery.throttle.js"></script>
	<script src="js/jquery.classycountdown.js"></script>

	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="js/jquery.menu-aim.js"> </script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

</body>

</html>
