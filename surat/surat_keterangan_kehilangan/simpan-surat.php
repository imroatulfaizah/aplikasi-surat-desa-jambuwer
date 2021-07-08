<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Kehilangan";
        $nik = $_POST['fnik'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";
        $tgl_hilang = $_POST['ftgl_hilang'];

        $qTambahSurat = "INSERT INTO surat_keterangan (jenis_surat, nik, keperluan, status_surat, id_profil_desa, ambil, tgl_hilang) VALUES('$jenis_surat', '$nik', '$keperluan', '$status_surat', '$id_profil_desa', '', '$tgl_hilang')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        
        header("location:../index.php?pesan=berhasil");
    }
?>