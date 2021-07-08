<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Tidak Mampu";
        $nik = $_POST['fnik'];
        // $keperluan = addslashes($_POST['fkeperluan']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan (jenis_surat, nik, status_surat, id_profil_desa, ambil) VALUES('$jenis_surat', '$nik', '$status_surat', '$id_profil_desa', '')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>