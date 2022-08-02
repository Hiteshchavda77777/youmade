<?php include("./include/header.php"); ?>
<?php include("./include/config.php"); ?>

<?php

if (isset($_POST['btn'])) 
{
	$nm1 = $_POST['nm'];
	$nm11 = strlen($nm1);
	if($nm11 <= 15 && $nm11 >= 2 && !is_numeric($nm1))
	{
		$email_1 = $_POST['email'];
		$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
		if(preg_match($pattern,$email_1))
		{
			$msg_1 = $_POST['msg'];
			$msg_11 = strlen($msg_1);
			if($nm11 <= 4000 && $nm11 >= 1)
			{
									$nm = $_POST['nm'];
									$email = $_POST['email'];
									$msg = $_POST['msg'];
									
									$a="select * from signup where s_email like '%$email%'";
									$b=mysqli_query($cn,$a);
									$c=mysqli_fetch_array($b);
									
									if(empty($c))
									{
										$a = mysqli_query($cn, "insert contact_us set c_nm='$nm',c_email='$email',c_msg='$msg'");
										if ($a) {
									?>
											<script>
												window.onload = function() {
													alert("DONE");
													window.location = "index.php";
												}
											</script>
									<?php
										}
									}else
									{ ?>
										<script>
										window.onload = function() {
										alert("this email is already exist");
										window.location = "contact.php";
										}
										</script>
										<?php }	
										
					/* for Massage start */
					}else{ ?> 
							<script>
							window.onload = function() {
							alert("Massage required minimum 1 to maximum 4000 characters ");
							window.location = "contact.php";
							}
							</script>					
						<?php }
					/* for Massage END */	
									
			/* for Email start */
			}else{ ?> 
					<script>
					window.onload = function() {
					alert("Email is not valid ");
					window.location = "contact.php";
					}
					</script>					
				<?php }
			/* for Email END */				
					
	/* for name start */
	}else{ ?> 
			<script>
			window.onload = function() {
			alert("Name required minimum 2 to maximum 15 CHARACTER ");
			window.location = "contact.php";
			}
			</script>					
		<?php }
	/* for name END */
}
?>

<!-- contact-page -->

<div class="contact">
	<div class="container">
		<h3 class="w3ls-title w3ls-title1">Contact Us</h3>
		<div class="contact-form-row">
			<div class="col-md-12">
				<form method="post">
					<input type="text" name="nm" placeholder="Name" required="">
					<input class="email" type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="">
					<textarea placeholder="Message" name="msg" required=""></textarea>
					<input type="submit" value="SUBMIT" name="btn">
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //contact-page -->

<?php include("include/footer.php"); ?>
