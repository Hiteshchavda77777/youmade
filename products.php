<?php include("./include/header.php") ?>
<?php include("./include/config.php") ?>

<?php
	$id = $_GET['id'];
	if(!empty($id)){
				$res = mysqli_query($cn, "select * from posting where p_c_id=$id");

			$res12 = mysqli_query($cn, "select c_name from category where c_id=$id");
			$aass = mysqli_fetch_array($res12);
			$cnm = $aass['c_name'];
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
		height: 130px;
	}
</style>
<!-- products -->
<div class="products">
	<div class="container">
		<div class="col-md-12 product-w3ls-right">
			<!-- breadcrumbs -->
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php">Home</a></li>
				<li class="active">Videos</li>
			</ol>
			<div class="clearfix"> </div>
			<!-- //breadcrumbs -->
			<div class="product-top">
				<h4>Category : <?php echo $cnm; ?></h4>
				<div class="clearfix"> </div>
			</div>
			<div>
				<?php
				while ($rec = mysqli_fetch_array($res)) {
						$xxxxx = $rec['p_s_id'];
						$yyyyy = mysqli_query($cn, "select s_name from signup where s_id = $xxxxx ");
						while($zzzzz = mysqli_fetch_array($yyyyy)){
				?>
					<div class="col-md-3 product-grids">
						<div class="agile-products">
							<a href="detail.php?id=<?php echo $rec['p_id']; ?>&cid=<?php echo $rec['p_c_id'];?>">
								<video width="257" style="height:auto; min-height: 200px; max-height:200px;" controls >
									<source src="<?php echo $rec['p_video']; ?>" type="video/mp4">
								</video>
							</a>
							<div style=" min-height:71px; max-height:71px; max-width: 300px !important; width:auto; height:auto; font: 14px oblique !important; padding-left: 0px !important; margin:0px !important; background-color: white !important; text-align:center !important;">   
								<a style="color:gray !important;" href="detail.php?id=<?php echo $rec['p_id']; ?>&cid=<?php echo $rec['p_c_id'];?>">
								<?php 
								echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
								echo '<b style="color:black !important; background-color:lightblue;" class="badge badge-primary" >'; 
								echo $rec['p_duration']; 
								echo '</b>';
								echo '<br>';
								echo $rec['p_title']; 
								echo '<br>'; 
								echo $rec['p_time'];
								echo '<br>';
								echo '<b class="fa fa-user" style="color:blue;"></b> &nbsp; ';
								echo '<b style=" color:white; height:15px !important; " class="badge badge-dark">'; 
								echo $zzzzz['s_name']; 
								echo '</b>';
								?> </a>
							</div>
						</div>
					</div>
				<?php
				}
				}
				?>
				<div class="clearfix"> </div>
			</div>
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
<!-- subscribe -->
<!-- //subscribe -->
<?php include("include/footer.php") ?>
