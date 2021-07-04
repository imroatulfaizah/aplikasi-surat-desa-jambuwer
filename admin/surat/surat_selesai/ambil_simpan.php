<?php
    include ('../../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $id_surat = $_POST['fid_surat'];
        $nama = $_POST['fnama'];
        $alamat = $_POST['falamat'];
        $no_telp = $_POST['fnotelp'];
        $ktp = "tes";
        $tanggal = date("Y/m/d");
    
        $ambil_surat = "INSERT INTO surat_diambil VALUES(NULL, '$id_surat', '$nama', '$alamat', '$no_telp', '$ktp', '$tanggal')";
        var_dump($ambil_surat);
        $simpan_ambil = mysqli_query($connect, $ambil_surat);
        var_dump($simpan_ambil);
        if($simpan_ambil){
            header("location:index.php");
        }
    }
?>