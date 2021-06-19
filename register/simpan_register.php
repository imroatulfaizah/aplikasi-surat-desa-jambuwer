<?php
	include ('../config/koneksi.php');

    // if (isset($_POST['submit'])){

        $nik = $_POST['nik'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = md5($password);
        // $nama = "tes";
        // echo "tes";
        // die();
        //$nik = "tes";


        $qCekPenduduk = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik='$nik'");
        $row          = mysqli_num_rows($qCekPenduduk);
        
        // var_dump($row);
        // die();
        // while($tes = mysqli_fetch_array($qCekPenduduk))
        //     $nama = $tes['nama'];
        //     var_dump($nama);
        
        // var_dump($nama);
        if($row > 0){
            $qCekNIK = mysqli_query($connect, "SELECT * FROM login WHERE nama='$nik'");
            $jumlah          = mysqli_num_rows($qCekNIK);
            if($jumlah > 0){
                header('location:index.php?pesan=user-exist');
            }else{
                $qTambahUser = "INSERT INTO login VALUES(NULL, '$nik', '$username', '$email', '$pass', 'penduduk')";
                // var_dump($qTambahUser);
                $tambahUser = mysqli_query($connect, $qTambahUser);
                // var_dump($tambahUser);
                // die();
                if($tambahUser){
                    // var_dump("hai");
                    // die();
                    header("location:../login/index.php?pesan=berhasil");
                }
            }
            
        }else{
            header('location:index.php?pesan=tidak-terdaftar');
        }
    // }
?>