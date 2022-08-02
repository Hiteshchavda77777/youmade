<?php include("./include/header.php"); ?>	

<?php include("./include/config.php")?>
<script>
$(document).ready(function(){
   $('#mytext').popover();
$('#name').popover();
});
</script>
<style>

.popover{
    width:250px;
    height:0 auto;
    
}
</style>
<?php
if(isset($_POST['login']))
{
	$nm=$_POST['email'];
	$pwd=$_POST['password'];
	
	$a=mysqli_query($cn, "select * from signup where s_email='".mysqli_real_escape_string($cn,$nm)."' && s_pwd='".mysqli_real_escape_string($cn,$pwd)."'");
	$as=mysqli_fetch_array($a);
	if(mysqli_num_rows($a)==true)
	{
		$_SESSION['snm']=$nm;
		$_SESSION['sid']=$as['s_id'];
		$_SESSION['fname'] = $as['s_name'];
		$_SESSION['hvc']= 1;
		?>
		<script>
		window.onload=function()
		{
		
			alert("Login Successfully!");
			window.location="index.php";
		}
		
		</script>
		<?php
		
	}
	else
	{
		
		?>
		<script>
		window.onload=function()
		{
			alert("wrong");
			window.location="login.php";
		}
		</script>
		<?php
	}
	
	
}

?>

	<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Login to your account</h3>  
			<div class="login-body">
				<form method="post">
					<input type="text" id="mytext" class="user" name="email" placeholder="Enter your email" required="" data-toggle="popover" data-trigger="hover"  data-content="Enter valid Email Id" >
					<input type="password" id="name" name="password" class="lock" placeholder="Password" required="" data-toggle="popover" data-trigger="hover"  data-content="Enter Maximum 8 Digite">
					<input type="submit" value="Login" name="login">
				</form>
			</div>  
			<h6> Not a Member? <a href="signup.php">Sign Up Now »</a> </h6> 
			<div class="login-page-bottom social-icons">
				
			</div>
		</div>
	</div>
	<!-- //login-page --> 
	<!-- footer-top -->
	<div class="w3agile-ftr-top">
		<div class="container">
			
		</div>
	</div>
	<!-- //footer-top --> 
	 
<?php include("include/footer.php"); ?>	
