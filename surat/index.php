<html>
<?php
 session_start();
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
<!-- <div class="container-fluid">
	<div style="max-height:cover; padding-top:30px; padding-bottom:60px; position:relative; min-height: 100%;">
		<div>
			<php 
			$tanggal = date("Y/m/d");
			$NewDate=Date('d/m/Y', strtotime('+2 days'));
   	        	if(isset($_GET['pesan'])){
                   	if($_GET['pesan']=="berhasil"){
                  		echo "<div class='alert alert-success'><center>Berhasil membuat surat. Silahkan ambil surat di Kantor Desa tanggal "; echo $NewDate . "</center></div>";
              		}
              	}
           	?>
		</div>
		<div class="row">
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN</h5><br><br>
		        		<a href="surat_keterangan/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN BERKELAKUAN BAIK</h5><br>
		        		<a href="surat_keterangan_berkelakuan_baik/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN DOMISILI</h5><br>
		        		<a href="surat_keterangan_domisili/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN KEPEMILIKAN KENDARAAN BERMOTOR</h5>
		        		<a href="surat_keterangan_kepemilikan_kendaraan_bermotor/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN PERHIASAN</h5><br>
		        		<a href="surat_keterangan_perhiasan/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN USAHA</h5><br>
		        		<a href="surat_keterangan_usaha/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT LAPOR HAJATAN</h5><br><br>
		        		<a href="surat_lapor_hajatan/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT PENGANTAR SKCK</h5><br><br>
		        		<a href="surat_pengantar_skck/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN TIDAK MAMPU</h5><br><br>
		        		<a href="surat_keterangan_tidakmampu/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			  <div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN BEASISWA</h5><br><br>
		        		<a href="surat_keterangan_beasiswa/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			  <div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/logo.png" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT PERNYATAAN KEHILANGAN E-KTP</h5><br><br>
		        		<a href="surat_keterangan_tidakmampu/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			
		</div>
	</div>
</div> -->
<div class="container" style="max-height:cover; padding-top:50px; padding-bottom:120px" align="center">
		<div>
			<?php 
			$tanggal = date("Y-m-d");
			$getDay = date("l");

			if($getDay == "Friday"){

				// $NewDate=Date('d/m/Y', strtotime('+3 days'));
				// $getDate = strtotime($NewDate);
				// $hari = date('l', $getDate);
				$hari = $d=strtotime("next Monday");
			}else{
				// $tes = $tanggal + 1;
				// var_dump($tanggal);
				// var_dump($getDay);
				// die();
				// $NewDate=Date('d/m/Y', strtotime('+1 days'));
				// $getDate = strtotime($NewDate);
				// $hari = date('l', $getDate);	
				$hari = strtotime("tomorrow");	
			}
			
   	        	if(isset($_GET['pesan'])){
                   	if($_GET['pesan']=="berhasil"){
                  		echo "<div class='alert alert-success'><center>Berhasil membuat surat. Silahkan ambil surat di Kantor Desa tanggal "; echo date("l Y-m-d", $hari) . "</center></div>";
              		}
              	}
           	?>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Pilih Jenis Surat</label>
			<div class="col-sm-8">
			<select id="jenis_surat" class="form-control" required>
				<option id="" value="">-- Jenis Surat --</option>
				<option value="surat_keterangan_berkelakuan_baik">SURAT KETERANGAN BERKELAKUAN BAIK</option>
				<option value="surat_keterangan_domisili/">SURAT KETERANGAN DOMISILI</option>
				<option value="surat_keterangan_kepemilikan_kendaraan_bermotor/">SURAT KETERANGAN KEPEMILIKAN KENDARAAN BERMOTOR</option>
				<option value="surat_keterangan_perhiasan/">SURAT KETERANGAN PERHIASAN</option>
				<option value="surat_keterangan_usaha/">SURAT KETERANGAN USAHA</option>
				<option value="surat_lapor_hajatan/">SURAT LAPOR HAJATAN</option>
				<option value="surat_pengantar_skck/">SURAT PENGANTAR SKCK</option>
				<option value="surat_keterangan_tidak_mampu/">SURAT KETERANGAN TIDAK MAMPU</option>
				<option value="surat_keterangan_beasiswa/">SURAT KETERANGAN BEASISWA</option>
				<option value="surat_keterangan_status/">SURAT KETERANGAN STATUS</option>
				<option value="surat_keterangan_kehilangan/">SURAT KETERANGAN KEHILANGAN</option>
				<option value="surat_keterangan_penghasilan_orang_tua/">SURAT KETERANGAN PENGHASILAN ORANG TUA</option>
			</select>
			</div>
		</div>
		<div class="col-sm-7 mt-12">
			<div class="card">
				<!-- <img src="../assets/img/logo.png" class="card-img-top" alt="..."> -->
				<div class="card-body text-center">
					<h5 class="card-title">PERMINTAAN SURAT</h5><br><br>
					<a id="link" href="" class="btn btn-info">BUAT SURAT</a>
				</div>
			</div>
		</div>
</div>
<div>
<br><br><br><br><br><br><br><br><br><br><br>
</div>
<div class="footer bg-dark text-center">
    <span class="text-light"><strong>Copyright &copy; 2021 <a href="../" class="text-decoration-none text-white">E-MailService</a>.</strong> All rights reserved.</span>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
		$("#jenis_surat").click(function () {
            var selectedid  = $("#jenis_surat option:selected").val();
			console.log(selectedid);
            $("#link").attr("href",""+selectedid);	
		});
</script>
</body>
</html>