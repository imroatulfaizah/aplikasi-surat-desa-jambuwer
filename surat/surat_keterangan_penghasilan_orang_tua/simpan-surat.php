<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Penghasilan Orang Tua";
        $nik = $_POST['fnik'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";
        $penghasilan = $_POST['fpenghasilan'];

        $qTambahSurat = "INSERT INTO surat_keterangan (jenis_surat, nik, keperluan, status_surat, id_profil_desa, ambil, penghasilan) VALUES('$jenis_surat', '$nik', '$keperluan', '$status_surat', '$id_profil_desa', '', '$penghasilan')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        
        header("location:../index.php?pesan=berhasil");
    }
?>