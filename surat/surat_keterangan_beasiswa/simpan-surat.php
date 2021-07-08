<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Beasiswa";
        $nik = $_POST['fnik'];
        $nama_anak = addslashes($_POST['fnamaanak']);
        $tempatlahir = $_POST['ftempatlahir'];
        $tanggal = $_POST['ftanggal'];
        $jk = $_POST['fjk'];
        $sekolah = $_POST['fsekolah'];
        $kelas = $_POST['fkelas'];
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_beasiswa (jenis_surat, nik, nama_anak,
        tempat_lahir, tanggal_lahir, jenis_kelamin, nama_sekolah, kelas, status_surat, id_profil_desa, ambil) 
        VALUES('$jenis_surat', '$nik', '$nama_anak', '$tempatlahir', '$tanggal', '$jk', '$sekolah',
        '$kelas', '$status_surat', '$id_profil_desa', '')";

        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>