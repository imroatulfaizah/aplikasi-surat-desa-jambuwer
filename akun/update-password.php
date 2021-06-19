<?php
	include ('../config/koneksi.php');

	$id = $_POST['id'];
	// $id = $_SESSION['username'];
    // $passlama = $_POST['fpasswordlama'];
	$passbaru = $_POST['fpasswordbaru'];
    $passnew = md5($passbaru);
    // var_dump($id);
    // die();
	$qUpdate = "UPDATE login SET password = '$passnew' WHERE username='$id'";
	$update = mysqli_query($connect, $qUpdate);

	if($update){
		header("location:../akun/index.php?pesan=berhasil");
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah password'); window.location.href='../akun/'</script>");
	}
?>