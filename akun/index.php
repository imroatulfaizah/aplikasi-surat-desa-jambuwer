<html>
<?php
//  session_start();

  include ('../admin/part/akses.php');
  include ('../config/koneksi.php');
//   include ('../part/header.php');

  $id = $_SESSION['username'];
  $qCek = mysqli_query($connect,"SELECT * FROM login WHERE username='$id'");
  while($row = mysqli_fetch_array($qCek)){

?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../assets/img/mini-logo.png">
	<title>E-MailService</title>
  	<link rel="stylesheet" href="../assets/fontawesome-5.10.2/css/all.css">
	<link rel="stylesheet" href="../assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
	<navbar class="navbar navbar-expand-lg navbar-dark bg-info">
	<h1 style="color: white;">E-MailService</h1><a class="navbar-brand ml-4 mt-1" href="../"><img src="../assets/img/email.png" style="height:50px;"></a>
	  	<button class="navbar-toggler mr-4 mt-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
	    	<ul class="navbar-nav ml-auto mt-lg-3 mr-5 position-relative text-right">
	      		<li class="nav-item">
	        		<a class="nav-link" href="../">HOME</a>
	      		</li>
	      		<li class="nav-item active">
	        		<a class="nav-link" href="#"><i class="fas fa-envelope"></i>&nbsp;BUAT SURAT</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="../tentang/">TENTANG <b>E-MailService</b></a>
	      		</li>
	      		<li class="nav-item active ml-5">
	      			<?php
						

						if(empty($_SESSION['username'])){
						    echo '<a class="btn btn-light text-info" href="../login/"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>';
						}else if(isset($_SESSION['lvl'])){
							if($_SESSION['lvl'] == "Penduduk"){
								echo '<a class="btn btn-transparent text-light" href="akun/"><i class="fa fa-user-cog"></i> '; echo $_SESSION['lvl']; echo '</a>';
							}else{
								echo '<a class="btn btn-transparent text-light" href="admin/"><i class="fa fa-user-cog"></i> '; echo $_SESSION['lvl']; echo '</a>';
							}
							// echo '<a class="btn btn-transparent text-light" href="../admin/"><i class="fa fa-user-cog"></i> '; echo $_SESSION['lvl']; echo '</a>';
							echo '<a class="btn btn-transparent text-light" href="../login/logout.php"><i class="fas fa-power-off"></i></a>';
						}
					?>
	      		</li>
	    	</ul>
	  	</div>
	</navbar>
    <div class="content-wrapper">
  <section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
    <?php 
   	        	if(isset($_GET['pesan'])){
                   	if($_GET['pesan']=="berhasil"){
                  		echo "<div class='alert alert-success'><center>Selamat! Password Anda Telah Berhasil Diubah</center></div>";
              		}
              	}
           	?>
      <!-- <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li> -->
      <!-- <li class="active">Data Penduduk</li> -->
    </ol>
  </section>
  <section class="content">  
  <form class="form-horizontal" method="post" action="update-password.php">    
    <div class="col-sm-10">
        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
        <div class="form-group">
            <label class="col-sm-4 control-label">Password Lama</label>
            <div class="col-sm-10">
                <input type="text" name="fpasswordlama" class="form-control" style="text-transform: capitalize;" placeholder="Password Lama" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label">Password Baru</label>
            <div class="col-sm-10">
                <input type="text" name="fpasswordbaru" class="form-control" style="text-transform: capitalize;" placeholder="Password Baru" required>
            </div>
        </div>
        <div class="box-footer pull-right">
            <input type="reset" class="btn btn-default" value="Batal">
            <input type="submit" name="submit" class="btn btn-info" value="Submit">
        </div>
    </form>
        <div class="content-header">
        <ol class="breadcrumb">
        </ol>
        </div>
    </div>
  </section>
</div>
<div class="footer bg-dark text-center">
    <span class="text-light"><strong>Copyright &copy; 2021 <a href="../" class="text-decoration-none text-white">E-MailService</a>.</strong> All rights reserved.</span>
</div>
</body>
</html>

<?php
  }
?>