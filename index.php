<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Studay</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/small.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<div class="d-flex justify-content-center">
						<img  src="Logo Studay.png" width="190" height="60">
					</div>
					<span class="login100-form-title py-4">
						StuDay Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: anjaymabar@gmail.com">
						<input class="input100" type="text" name="email_murid" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pw_murid" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="Login">
							Login
						</button>
					</div>
					<?php
					include_once("init.php");
					if (isset($_POST["Login"])){

						$murid=$_POST["email_murid"];
						$pwmurid=$_POST["pw_murid"];

						$ambil = $koneksi->query("SELECT * FROM akun_murid WHERE email_murid='$murid' AND pw_murid='$pwmurid'");
						$yangcocok = $ambil->num_rows;
						if($yangcocok==1){
							$_SESSION['murid']=$ambil->fetch_assoc();
							echo '<br><div class="alert alert-success" role="alert">
							Login Berhasil</div>';
							header('Location:../admin');
						}else{
							echo '<br><div class="alert alert-danger" role="alert">
							Login Gagal</div>';
						}
					}
                	?>
					<div class="text-center p-t-136">
						<a class="txt2" href="regist.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>