<?php include("./include/header.php"); 
include("include/config.php");?>
<?php

if($_SESSION['hvc']== 1)
{
	
		$a = $_SESSION['sid'];
		//$rrr = mysqli_query($cn,"select * from  posting,signup where posting.p_s_id = signup.s_id AND posting.p_s_id like '$a'");
		$res = mysqli_query($cn, "select * from posting,category,signup where posting.p_c_id= category.c_id AND signup.s_id=posting.p_s_id AND posting.p_s_id like '%$a%'");
		
		if (isset($_GET['del']))
		{
			$xyz =$_GET['del'];
			$result = mysqli_query($cn, "SELECT * FROM posting where p_id= $xyz ");
			$row = mysqli_fetch_array($result);
			if (is_file($row['p_video'])) {
				$de = "delete from posting where p_id = '$xyz' ";
				$dee= "delete from review where r_p_id = '$xyz' ";
				$exe_del =  mysqli_query($cn, $de);  
				$exee_del =  mysqli_query($cn, $dee);  
			}
		
			 
		?>
				<script>
					window.onload = function() {
						alert("delete");
						window.location = "display_posting.php";
					}
				</script>
		<?php
		}
}
else 
{
	?>
			<script>
				window.onload=function()
				{
					//alert("You need to login or signup");
					window.location="admin/404.html";
				}
			</script>
	<?php
}
?>
<div class="login-page">
	<div class="container">
		<div class="table-responsive" >
			<form method="post" >
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
					<thead>
						<tr align="center" style="padding-left:20px !important;" >
							<th>No</th>
							<th>Category</th>
							<th>Title</th>
							<th>Date</th>
							<th>Description</th>
							<th>Video</th>
							<th>Delete</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$co = 1;

						while ($rec = mysqli_fetch_array($res)) {
					
							$cls = ($co % 2 != 0) ? '' : 'class="odd"';
						?>
							<tr align="center" '.$cls.'>
								<td><?php echo $co; ?></td>
								<td><?php echo $rec['c_name']; ?></td>
								<td style="max-width:100px !important;"><?php echo $rec['p_title']; ?></td>
								<td><?php echo $rec['p_time']; ?></td>
								<td style="max-width:200px !important;"><?php $c =$rec['p_dec']; echo mysqli_real_escape_string($cn,$c); ?></td>
								<td>
										<a href="detail.php?id=<?php echo $rec['p_id']; ?>&cid=<?php echo $rec['p_c_id'];?>">
											<video width="257" style="height:auto; min-height: 200px; max-height:200px; border: 1px solid gray;""   controls>
												<source src="<?php echo $rec['p_video']; ?>"  type="video/mp4" >
											</video>
										</a>
										
										<div style="  height:auto; width:auto; max-width: 300px !important; min-height:71px; max-height:71px;  font: 14px oblique !important; padding-left: 0px !important; margin:0px !important; background-color: white !important; text-align:center !important;">   
										<a style="color:gray !important;" href="detail.php?id=<?php echo $rec['p_id']; ?>&cid=<?php echo $rec['p_c_id'];?>"> 
										<?php
										//echo '<i class ="fa fa-clock-o"; style=" font-size:17px; color:red; " ></i> &nbsp; '; 
										echo '<i style="color:black !important;">'; 
										echo $rec['p_duration']; 
										echo '</i> &nbsp &nbsp';
										echo '<i class="fa fa-user" style="color:blue;"></i> &nbsp; ';
										echo '<i style=" color:black;">'; 
										echo $rec['s_name']; 
										echo '</i>';
										echo '<br>';
										echo $rec['p_title']; 
										echo '<br>'; 
										echo $rec['p_time']; 
										//echo '<br>';
										?> </a>
										</div>
								</td>
								<td><a href="display_posting.php?del=<?php echo $rec['p_id']; ?>"><i class="fa fa-close" style="color:red;font-size:20px;"></i></a></td>
							</tr>
						<?php
							$co++;
						}

						?>
					</tbody>
				</table>
				<a href="posting.php"><input align="left" type="button" name="post_video_page" value="post new video" ><a/>
			</form>
		</div>
	</div>
</div>


<?php include("include/footer.php"); ?>
