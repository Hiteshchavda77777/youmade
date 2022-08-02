<?php include("./include/header.php"); ?>
<?php

include("./include/config.php");
$res = mysqli_query($cn, "select * from category order by c_name");

if($_SESSION['hvc']== 1 )
{
	$res = mysqli_query($cn, "select * from category order by c_name");
	if (isset($_POST['btn'])) 
	{
			$tit_con1 =$_POST['title'];
			$tit_con2 = strlen($tit_con1);
			if($tit_con2 <= 100 && $tit_con2 >= 3)
			{
				$desc_con1 =$_POST['dec'];
				$desc_con2 = strlen($desc_con1);
				if($desc_con2 < 200 && $desc_con2 > 3)
				{
							//$imagefiletype = strtoupper(substr($_FILES['video']['name'], -3 ));
							$img11= strtolower($_FILES['video']['name']);
							$imagefiletype = pathinfo($img11,PATHINFO_EXTENSION);
							if($imagefiletype=="mkv" || $imagefiletype=="flv" || $imagefiletype=="viv" || $imagefiletype=="amv" || $imagefiletype=="mp4" || $imagefiletype=="3gp" || $imagefiletype=="mp3" || $imagefiletype=="mpg" || $imagefiletype=="avi")
							{
								$image = strtolower($_FILES['image']['name']);
								$imagefile = pathinfo($image,PATHINFO_EXTENSION);
								if($imagefile=="jpeg" || $imagefile=="jpg" || $imagefile=="png")
								{
											$category = $_POST['category'];
										$a = $_SESSION['sid'];
										
										$title =$_POST['title'];
										//$tit = ereg_replace("_","",$title);
										$tit = $title;
										$dec = $_POST['dec'];
										//$de = ereg_replace("_","",$dec);
										$de = $dec;
										
										$imagestore = "thumb/".time().$_FILES['image']['name'];
										move_uploaded_file($_FILES['image']['tmp_name'], $imagestore);
										
										
										$video = "videos/" .time(). basename($_FILES["video"]["name"]);
										move_uploaded_file($_FILES['video']['tmp_name'], $video);
										
										
										function getDuration($video)
										{
											include_once("include/getID3/getid3/getid3.php");
											$getID3 = new getID3;
											$file = $getID3 -> analyze($video);
											$duration_string = $file['playtime_string'];
											return format_duration($duration_string);
										}
										function format_duration($duration)
										{
											if(strlen($duration) == 4){ return "00:0".$duration;}
											else if(strlen($duration) == 5){ return "00:".$duration;}
											else if(strlen($duration) == 7){ return "0".$duration; }
										} 
										$ttt = getDuration($video);
										$ggg = $ttt;
										$ins = "insert into posting (p_c_id,p_s_id,p_title,p_dec,p_video,p_thumb,p_duration) values('$category','$a','".mysqli_real_escape_string($cn,$tit)."','".mysqli_real_escape_string($cn,$tit)."','$video','$imagestore','$ggg')";
										$exe = mysqli_query($cn, $ins);
										if ($exe) {
												?>
												<script>
													window.onload = function() {
													alert("Posting successfully");
													window.location = "display_posting.php";
													}
											</script>
											<?php }
								}else
								{?><script>		
									window.onload = function() {
									alert("your image file type is not supported use file type Like .jpeg, .jpg, .png");
									window.location = "posting.php";
									}</script>
								<?php	
								}
								
												
							}else
							{ ?><script>		window.onload = function() {
																alert("your video file type is not supported use file type Like .mkv, .flv, .viv, .amv, .mp4, .3gp, .mp3, .mpg, .avi ");
																window.location = "posting.php";
																}</script>
								<?php 
							}
			
			
			
				}else
					{?><script>		window.onload = function() {
						alert("Description required minimum 3 to maximum 200 characters ");
						window.location = "posting.php";
					}</script>
					<?php 
				}
				
			
			}else 
			{ ?> <!--check for title condition  -->   
				<script>
				window.onload = function() {
				alert("Title required minimum 3 to maximum 100 characters ");
				window.location = "posting.php";
				}
				</script>
				<?php 
			}
	}
}else
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
<!-- sign up-page -->
<div class="login-page">
	<div class="container">
		<h3 class="w3ls-title w3ls-title1">Post the Video</h3>
		<div class="login-body">
			<form method="post" class="form" enctype="multipart/form-data">

				<div class="form-group">
					<label>Category*</label>

					<select class="form-control" name="category" required>
						<?php
						while ($rec = mysqli_fetch_array($res)) {
						?>
							<option value="<?php echo $rec['c_id']; ?>"><?php echo $rec['c_name']; ?></option>
						<?php }
						?>
					</select>

				</div>
				<div class="form-group">
					<label>Video Title</label>
					<input type="text" class="form-control user" name="title" placeholder="Enter Title" required>
				</div>

				<div class="form-group">
					<label>Video Description</label>
					<textarea class="form-control user" rows="3" name="dec" required></textarea>
				</div>

				<div class="form-group">
					<label>Choose Video</label>
					<input type="file" id="exampleInputFile" name="video" accept="video/*" required>
				</div>
				
				<div class="form-group">
					<label>Choose thumbnail</label>
					<input type="file" id="exampleInputimage" name="image" accept="image/*" required>
				</div>
				<input type="submit" value="Posting" name="btn">

			</form>
		</div>
	</div>
</div>
<!-- //sign up-page -->

<?php include("include/footer.php"); ?>
