<?php include("./include/header.php") ?>
<?php include("./include/config.php") ?>

<?php
		if (isset($_POST['btn'])) {
		$search = $_POST['search'];
		$sq="select * from posting where p_dec  Like '%$search%'";
		$res = mysqli_query($cn,$sq);
		//$res1= mysqli_query($cn,$sq);
		}
?>
<?php

?>
<!-- products -->
<div class="products">
	<div class="container">
		<div class="col-md-12 product-w3ls-right">
			<!-- breadcrumbs -->
			<ol class="breadcrumb breadcrumb1">
					<li><a href="index.php">Home</a></li>
				<li class="active">videos</li>
			</ol>
			<div class="clearfix"> </div>
			<!-- //breadcrumbs -->
			<div class="product-top">
				<h4>Your search Result :  <?php echo $search; ?></h4>
				<div class="clearfix"> </div>
			</div>
			<div class="products-row">
				<?php
				while ($rec = mysqli_fetch_array($res)) {
					
					$xxxxx = $rec['p_s_id'];
					$yyyyy = mysqli_query($cn, "select s_name from signup where s_id = $xxxxx ");
					while($zzzzz = mysqli_fetch_array($yyyyy)){
				?>
					<div class="col-md-3 product-grids">
						<div class="agile-products">
							<a href="detail.php?id=<?php echo $rec['p_id']; ?>&cid=<?php echo $rec['p_c_id'];?>">
								<video controls width="257" style="height:auto; min-height: 200px; max-height:200px; border: 1px solid gray;" >
								<source src="<?php echo $rec['p_video']; ?>" type="video/mp4">
								</video>
								
								<div style=" width:auto; max-width: 300px !important; min-height:71px; max-height:71px; height:auto; font: 14px oblique !important; padding-left: 0px !important; margin:0px !important; background-color: white !important; text-align:center !important;">   
									<a style="color:gray !important;" href="detail.php?id=<?php echo $rec['p_id']; ?>&cid=<?php echo $rec['p_c_id'];?>"> 
									<?php
									//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
									echo '<i style="color:black !important;">'; 
									echo $rec['p_duration']; 
									echo '</i> &nbsp &nbsp';
									echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
									echo '<i style=" color:black;">'; 
									echo $zzzzz['s_name']; 
									echo '</i>';
									echo '<br>'; 
									echo $rec['p_title']; 
									echo '<br>'; 
									echo $rec['p_time'];
									//echo '<br>';
									?> </a>
								</div>
							</a>
						</div>
					</div>
				<?php
				}
				}
				?>
				<div class="clearfix"> </div>
			</div>
			<!-- add-products -->

			<!-- //add-products -->
		</div>
		<div class="clearfix"> </div>
		<!-- recommendations -->

	</div>
</div>
<!--//products-->
<!-- footer-top -->
<div class="w3agile-ftr-top">

</div>
<!-- //footer-top -->
<?php include("include/footer.php") ?>
