<?php include("./include/header.php"); ?>
<?php include("./include/config.php"); ?>
<?php

if (isset($_POST['btn'])) 
{
	$nm1 = $_POST['name'];
	$nm11 = strlen($nm1);
	if($nm11 <= 15 && $nm11 >= 2 && ! is_numeric($nm1))
	{
		$email_1 = $_POST['email'];
		$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
		if(preg_match($pattern,$email_1))
		{
			$pwd1 = $_POST['password'];
			$pwd11 = strlen($pwd1);
			if($pwd11 <= 10 && $pwd11 >= 8)
			{
				$mno_1 = $_POST['mobileno'];
				$mno_11 = strlen($mno_1);
				if($mno_11 <= 10 && $mno_11 >= 10 && is_numeric($mno_1))
				{
					$gendar1 = $_POST['gendar'];
					if(!empty($gendar1))
					{
											/*  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!START!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
														$nm = $_POST['name'];
														$email = $_POST['email'];
														$pwd = $_POST['password'];
														$cwd = $_POST['confirm_password'];
														$mno = $_POST['mobileno'];
														$gendar = $_POST['gendar'];
														
														
														$a="select * from signup where s_email like '%$email%'";
														$b=mysqli_query($cn,$a);
														$c=mysqli_fetch_array($b);
														//echo $c['s_email'];
														
														$x="select * from signup where s_mno like '%$mno%'";
														$y=mysqli_query($cn,$x);
														$z=mysqli_fetch_array($y);
														
														if(empty($c))
														{
															if(empty($z))
															{
																if ($pwd == $cwd) 
																{
																	$res=mysqli_query($cn, "insert signup set s_name='$nm',s_email='$email',s_pwd='$pwd',s_gender='$gendar',s_mno='$mno'");
																	//echo "insert signup set s_name='$nm',s_email='$email',s_pwd='$pwd',s_gender='$gendar',s_mno='$mno'";
																		if($res)
																		{
																		?>
																			<script>
																			window.onload = function() {
																			alert("Account is created successfully ");
																			window.location = "login.php";
																			}
																			</script>
																		<?php
																		}
																}
																else 
																{
																?>
																	<script>
																	window.onload = function() {
																	alert("Password AND Confirm Password is Not match , Please match Password and Confirm Password  ");
																	window.location = "signup.php";
																	}
																	</script>
																<?php
																}
															}
															else
															{
																?>
																	<script>
																	window.onload = function() {
																	alert("this mobile Number is already exist ");
																	window.location = "login.php";
																	}
																	</script>
																
																<?php 
															}		
														}
														else
														{
															?>
																	<script>
																	window.onload = function() {
																	alert("this email is already exist");
																	window.location = "login.php";
																	}
																	</script>
															<?php 
														}
											/*  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!END!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
																																							
											/* for Mobile_number START */																						
										}else{ ?>
												<script>
												window.onload=function()
												{
													alert("please select gender field");
													window.location="signup.php";
												}
											</script>
											<?php }
											/* for Mobile_number END */																
																										
									/* for Mobile_number START */																						
								}else{ ?>
										<script>
										window.onload=function()
										{
											alert("Phone Number required  10 Digit");
											window.location="signup.php";
										}
									</script>
									<?php }
									/* for Mobile_number END */													
																										
							/* for Password START */																						
						}else{ ?>
								<script>
								window.onload=function()
								{
									alert("Password required minimum 8 to maximum 10 characters");
									window.location="signup.php";
								}
							</script>
							<?php }
							/* for Password END */																		
																										
					/* for Email START */																						
				}else{ ?>
						<script>
						window.onload=function()
						{
							alert("Email is not valid");
							window.location="signup.php";
						}
					</script>
					<?php }
					/* for Email END */
				
			/* for name START */
		}else{ ?>
				<script>
					window.onload=function()
					{
						alert("Name required minimum 2 to maximum 15 characters");
						window.location="signup.php";
					}
				</script>
			<?php }
		/* for name END */
}
?>
<!-- sign up-page -->
<div class="login-page">
	<div class="container">
		<h3 class="w3ls-title w3ls-title1">Create your account</h3>
		<div class="login-body">
			<form method="post">
				<input type="text" class="user" name="name" placeholder="Enter your Name" required="">
				<input type="text" class="user" name="email" placeholder="Enter your email" required="">
				<input type="password" name="password" class="lock" minlength="8" placeholder="Password" required="">
				<input type="password" name="confirm_password" minlength="8" class="lock" placeholder="Confirm Password" required="">
				<input type="radio" class="user" name="gendar" value="male" style="margin:20px;">Male
				<input type="radio" class="user" name="gendar" value="female" style="margin:20px;">Female
				<input type="radio" class="user" name="gendar" value="Other" style="margin:20px;">Other
				<input type="text" class="user" name="mobileno" placeholder="Enter Mobile No" required="">
				<input type="submit" value="Sign Up" name="btn">
			</form>
		</div>
		<h6>Already have an account? <a href="login.php">Login Now »</a> </h6>
	</div>
</div>
<!-- //sign up-page -->
<!-- footer-top -->
<div class="w3agile-ftr-top">
	<div class="container">
		<div class="ftr-toprow">
			<div class="col-md-4 ftr-top-grids">
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-4 ftr-top-grids">
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //footer-top -->

<?php include("include/footer.php"); ?>
