<?php
	session_start();
 
	if(isset($_SESSION['admin'])){
		header('location:../admin/dashboard/');
	}else if(isset($_SESSION['kades'])){
		header('location:../admin/dashboard/');
	}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../assets/img/mini-logo.png">
	<title>Register Page</title>   
	<link rel="stylesheet" href="../assets/fontawesome-5.10.2/css/all.css">
	<link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/loginCSS/login.css">
</head>
<body>
<div class="container">
<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="user-exist"){
				echo "<div class='alert alert-danger'><center>NIK sudah terdaftar! Silahkan masuk ke menu Login</center></div>";
			}if($_GET['pesan']=="tidak-terdaftar"){
				echo "<div class='alert alert-danger'><center>NIK tidak terdaftar sebagai warga Jambuwer! Silahkan cek ulang NIK</center></div>";
			}
		}
	?>
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header text-center mt-4">
				<h3>Form Register</h3>
			</div>
			<div class="card-body">
				<form method="post" action="simpan_register.php">
                <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="nik" placeholder="nik" required>			
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="email" required>			
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" required>			
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password" required>
					</div><br>
					<div class="form-group">
						<input type="submit" value="Register" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					<span style="font-size:8pt">Copyright &copy; 2021 <a href="../" class="text-decoration-none text-white">E-Mailservice</a></span>
				</div>
				<div class="d-flex justify-content-center">
					<span class="text-white" style="font-size:8pt">All rights reserved.</span>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>