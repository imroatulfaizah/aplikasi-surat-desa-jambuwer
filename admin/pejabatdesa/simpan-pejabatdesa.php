<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $nik = $_POST['fnik'];
        $nama = $_POST['fnama'];
        $jabatan = $_POST['fjabatan'];
        $status = $_POST['fstatus'];
        
        $qCekPejabat = mysqli_query($connect, "SELECT * FROM pejabat_desa WHERE nik='$nik'");
        $row          = mysqli_num_rows($qCekPejabat);
        if($row > 0){
            header('location:index.php?pesan=gagal-menambah');
        }else{

            $qTambahPejabat = "INSERT INTO pejabat_desa VALUES(NULL, '$nik', '$nama', '$jabatan', '$status')";
            $tambahPejabat = mysqli_query($connect, $qTambahPejabat);
            if($tambahPejabat){
                header("location:index.php?pesan=berhasil-tambah");
            }
        }
    }
?>