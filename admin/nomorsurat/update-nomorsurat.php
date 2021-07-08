<?php
	include ('../../config/koneksi.php');
    $id = $_POST['id'];
    $kode_surat = $_POST['fnomorsurat'];

	$qUpdate = "UPDATE nomor_surat SET no_surat = '$kode_surat' WHERE id='$id'";

	$update = mysqli_query($connect, $qUpdate);

	if($update){
		header('location:../nomorsurat?pesan=berhasil-update');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengubah data Kode Nomor Surat'); window.location.href='../nomorsurat/'</script>");
	}
?>