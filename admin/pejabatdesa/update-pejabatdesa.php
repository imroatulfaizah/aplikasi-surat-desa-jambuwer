<?php
	include ('../../config/koneksi.php');
    $id = $_POST['id'];
    $nik = $_POST['fnik'];
    $nama = $_POST['fnama'];
    $jabatan = $_POST['fjabatan'];
    $status = $_POST['fstatus'];

	$qUpdate = "UPDATE pejabat_desa SET nik = '$nik', nama_pejabat_desa = '$nama', 
    jabatan = '$jabatan', status = '$status' WHERE id_pejabat_desa='$id'";

	$update = mysqli_query($connect, $qUpdate);

	if($update){
		header('location:../pejabatdesa/');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data Pejabat Desa'); window.location.href='../pejabatdesa/'</script>");
	}
?>