<?php
	include ('../../config/koneksi.php');

	$id		= $_GET['id'];
	$qHapus		= mysqli_query($connect, "DELETE FROM pejabat_desa WHERE id_pejabat_desa = '$id'");

	if($qHapus){
		header('location:index.php?pesan=berhasil-hapus');
	} else {
		header('location:index.php?pesan=gagal-menghapus');
	}
?>