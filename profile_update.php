<?php include("./include/header.php"); ?>
<?php include("./include/config.php"); ?>
<?php

if($_SESSION['hvc']== 1 )
{
	if(isset($_POST['btn']))
	{
		$name1=$_POST['name'];
		$name11 = strlen($name1);
		if($name11 <= 15 && $name11 >= 2 && ! is_numeric($name1))
		{
			error_reporting(0);
			$pno1=$_POST['pno'];
			$pno11 = strlen($pno1);
			if($pno11 <= 10 && $pno11 >= 10 && is_numeric($pno1))
			{
				$gendar1=$_POST['gendar'];
				if(!empty($gendar1))
				{
					$pwd1=$_POST['pwd'];
					$pwd11 = strlen($pwd1);
					if($pwd11 <= 10 && $pwd11 >= 8)
					{
				
						$b=$_SESSION['snm']	;	
						$name=$_POST['name'];
						$pno=$_POST['pno'];
						$gendar=$_POST['gendar'];
						$pwd=$_POST['pwd'];
						
						$ins="update signup set s_name='$name',s_mno='$pno',s_gender='$gendar',s_pwd='$pwd' where s_email like '$b'";
						$exe=mysqli_query($cn, $ins);
						if($exe)
						{
							?>
							<script>
								window.onload=function()
								{
									alert("update Succesfully");
									window.location="index.php";
								}
							</script>
							<?php
							
						}
						
				}else{   ?> 
						<script>
						window.onload=function()
						{
							alert("Password required minimum 8 to maximum 10 characters");
							window.location="profile_update.php";
						}
						</script>
				<?php  }/* for password */
										
										
			}else{ ?> <script>
					window.onload=function()
					{
						alert("please select gender field ");
						window.location="profile_update.php";
					}
				</script>
			<?php }/* for gender */					
		
		}else{?> <script>
					window.onload=function()
					{
						alert("Phone Number required  10 Digit");
						window.location="profile_update.php";
					}
				</script>
		<?php }/* for Phone number*/
		
		
	}else{ ?> <script>
					window.onload=function()
					{
						alert("Name required minimum 2 to maximum 15 characters");
						window.location="profile_update.php";
					}
				</script>
	<?php }/* for name */
	
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
	<!--container Start-->
<div class="products">	
	<div class="container"> 
		<div class="row"> 
			<!--tab start--> 
			<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Personal</a></li>
			<li><a data-toggle="tab" href="#menu1"> </a></li>
		  </ul>

		  <div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
				<div class="login-page">
					<div class="container"> 
						<h3 class="w3ls-title w3ls-title1">Update Your Detail</h3>  
						<div class="login-body">
							<form method="post" class="form"  enctype="multipart/form-data">
								<div class="form-group">
									<label >Update Your Name</label>
									<input type="text" class="form-control user" name="name"   placeholder="Name" required>
								</div>
								  
								 <div class="form-group">
									<label >Update Phone number</label>
									<input type="tel" class="form-control user" name="pno" {mintext:10, maxtext:10}" maxlength="10"  placeholder="phone Number" required>
								 </div>
								  
								 <div class="form-group">
									<label class="radio-inline"><input type="radio" class="form-control-user" name="gendar" value="male" <?php if($rec['s_gender']=='male'){ echo 'checked';}?> />Male</label>
									<label class="radio-inline"><input type="radio" class="form-control-user" name="gendar" value="female" <?php if($rec['s_gender']=='female'){ echo 'checked';}?> />Female</label>
									<label class="radio-inline"><input type="radio" class="form-control-user" name="gendar" value="Other" <?php if($rec['s_gender']=='Other'){ echo 'checked';}?> />Other</label>
								 </div>
								  
								<div class="form-group">
									<label >Update Password</label>
									<input type="password" class="form-control user" name="pwd"  minlength="8"  placeholder="password" required>
								 </div>
								 <input type="submit" value="Update" name="btn">
							</form>
						</div>  
					</div>
				</div>
			  </div>
		  </div>
		</div>
	</div>
</div>
	<!--container end-->
<?php include("include/footer.php"); ?>	
