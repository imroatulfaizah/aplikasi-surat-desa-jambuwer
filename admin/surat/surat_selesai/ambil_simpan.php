<?php
    include ('../../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $id_surat = $_POST['fid_surat'];
        $jenis_surat = $_POST['fjenis_surat'];
        $nama = $_POST['fnama'];
        $alamat = $_POST['falamat'];
        $no_telp = $_POST['fnotelp'];
        //$ktp = "tes";
        $tanggal = date("Y/m/d");
        $replace = str_replace(" ","_",$jenis_surat);


        $target_file = "../../../gambar/";
        $foto=$_FILES['foto']['name'];
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file.$foto);
           
        $ambil_surat = "INSERT INTO surat_diambil VALUES(NULL, '$id_surat','$jenis_surat', '$nama', '$alamat', '$no_telp', '$foto', '$tanggal')";
      
        $simpan_ambil = mysqli_query($connect, $ambil_surat);
        
        if($jenis_surat=="Surat Keterangan"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_sk = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Berkelakuan Baik"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_skbb = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Domisili"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_skd = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Kepemilikan Kendaraan Bermotor"){
            $sudah_diambil ="UPDATE $replace SET ambil = 'Sudah' WHERE id_skkkb = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Perhiasan"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_skp = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Usaha"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_sku = $id_surat";

        } else if($jenis_surat=="Surat Pengantar SKCK"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_sps = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Tidak Mampu"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_sk = $id_surat";

        } else if($jenis_surat=="Surat Lapor Hajatan"){
            $sudah_diambil = "UPDATE $replace SET ambil = 'Sudah' WHERE id_slh = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Kehilangan"){
            $sudah_diambil = "UPDATE surat_keterangan SET ambil = 'Sudah' WHERE id_sk = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Beasiswa"){
            $sudah_diambil = "UPDATE surat_keterangan_beasiswa SET ambil = 'Sudah' WHERE id_sk = $id_surat";
        } else if($jenis_surat=="Surat Keterangan Status"){
            $sudah_diambil = "UPDATE surat_keterangan SET ambil = 'Sudah' WHERE id_sk = $id_surat";

        } else if($jenis_surat=="Surat Keterangan Penghasilan Orang Tua"){
            $sudah_diambil = "UPDATE surat_keterangan SET ambil = 'Sudah' WHERE id_sk = $id_surat";
        }

        $save = mysqli_query($connect, $sudah_diambil);
        if($simpan_ambil & $save){
            header("location:index.php");
        }
    }
?>