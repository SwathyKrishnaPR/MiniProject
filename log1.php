<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SignIn</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util1.css">
	<link rel="stylesheet" type="text/css" href="css/main1.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="POST">
					<span class="login100-form-title">
						SignIn
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="uname" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
                    
					
					<div class="text-right p-t-13 p-b-23">
						

						<a href="#" class="txt2">
							Forgot Password ?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<input type ="submit" class="login100-form-btn" name="submit" value="Login"/>
							
						
						
					</div>
                     
					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							DON’T HAVE AN ACCOUNT?
							<a href="register1.php" class="txt3">
								REGISTER NOW
							</a>
						</span>

						
						<a href="index.html" class="txt3">BACK TO HOME</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/logjs.js"></script>

</body>
</html>
<?php
if(isset($_POST["submit"]))
{
	
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];
    
    $sql2="select * from log_tbl where uname='".$uname."' AND pass='".$pass."'";
	
	
    $result=mysqli_query($con,$sql2);

    if($result){
        if($row=mysqli_fetch_array($result)){
			if($row[3]=="admin"){
				?>
				<script type="text/Javascript">
				window.location.href="adminpanel.html"</script>
				<?php     
			}else if($row[3]=="user"){
			   ?> 
				<script type="text/Javascript">
				window.location.href="userpanel.html"</script>
				<?php     
			} else if($row[3]=="mechanic"){
				?> 
				<script type="text/Javascript">
				window.location.href="mechanicpanel.html"</script>
				<?php 
			}
		else
		{   
			echo"Invalid Username and Password";
			
		}
	}
        
}
}
?>

