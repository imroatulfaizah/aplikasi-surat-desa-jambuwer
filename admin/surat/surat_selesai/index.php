<?php
include ('../../../config/koneksi.php');
  include ('../part/akses.php');
  include ('../part/header.php');
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
  		<li class="header">MAIN NAVIGATION</li>
 			<li class="active">
 				<a href="#">
   				<i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
 				</a>
 			</li>
      
       <li class="treeview">
   			<a href="#">
     			<i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Mastering</span>
     			<span class="pull-right-container">
     				<i class="fa fa-angle-left pull-right"></i>
     			</span>
   			</a>
   			<ul class="treeview-menu">
         <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
    			<li>
     				<a href="../../penduduk/"><i class="fa fa-circle-notch"></i> Data Penduduk</a>
     			</li>
           <li>
     				<a href="../../pejabatdesa"><i class="fa fa-circle-notch"></i> Pejabat Desa</a>
     			</li>
          <li>
            <a href="../../nomorsurat"><i class="fa fa-circle-notch"></i> Nomor Surat</a>
          </li>
           <?php 
        }else{
          ?>
          <li>
     				<a href="../../penduduk"><i class="fa fa-circle-notch"></i> Data Penduduk</a>
     			</li>
           <?php
        }
      ?>
     			
   			</ul>
   		</li>
       
   		<!-- <li>
   			<a href="../penduduk/">
     			<i class="fa fa-users"></i> <span>Data Penduduk</span>
   			</a>
   		</li> -->
      <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator') || ($_SESSION['lvl'] = "Kepala Desa")){
      ?>
   		<li class="treeview">
   			<a href="#">
     			<i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
     			<span class="pull-right-container">
     				<i class="fa fa-angle-left pull-right"></i>
     			</span>
   			</a>
   			<ul class="treeview-menu">
    			<li>
     				<a href="../permintaan_surat/"><i class="fa fa-circle-notch"></i> Permintaan Surat</a>
     			</li>
     			<li>
     				<a href="../surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai</a>
     			</li>
   			</ul>
   		</li>
      <?php 
        }else{
          
        }
      ?>
   		<li>
   			<a href="../../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span></a>
   		</li>
  	</ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
  <?php
      if(isset($_GET['filter']) && ! empty($_GET['filter'])){
        $filter = $_GET['filter'];
        if($filter == '1'){
          echo '<h1>Laporan Surat Administrasi Desa - Surat Keluar</h1>';
        }else if($filter == '2'){
          $tgl_lhr = date($_GET['tanggal']);
          $tgl = date('d ', strtotime($tgl_lhr));
          $bln = date('F', strtotime($tgl_lhr));
          $thn = date(' Y', strtotime($tgl_lhr));
          $blnIndo = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
          );
          echo '<h1>Laporan Surat Administrasi Desa - Surat Keluar (Tanggal '.$tgl . $blnIndo[$bln] . $thn.')</b>';
        }else if($filter == '3'){
          $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
          echo '<h1>Laporan Surat Administrasi Desa - Surat Keluar (Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].')</b>';
        }else if($filter == '4'){
          echo '<h1>Laporan Surat Administrasi Desa - Surat Keluar (Tahun '.$_GET['tahun'].')</b>';
        }
      }else{
        echo '<h1>Laporan Surat Administrasi Desa - Surat Keluar</h1>';
      } 
    ?>
    <h1>Surat Selesai</h1>
    <ol class="breadcrumb">
      <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Surat Selesai</li>
    </ol>
  </section>
  <section class="content">      
    <div class="data">
      <div class="col-md-12">
        <br>
      <div class="col-md-9">
          
        </div>
        <div class="col-md-3" align="right">
          <a name="filter" target="output" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i> Filter</a>
          <a href="../laporan/" name="filter" class="btn btn-danger btn-md"><i class="fas fa-eraser"></i> Reset Filter</a>
        </div><br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="get" action="">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Filter Berdasarkan Waktu</label>
                    <select class="form-control" name="filter" id="filter">
                      <option value="1">Semua Waktu</option>
                      <option value="2">Per Tanggal</option>
                      <option value="3">Per Bulan</option>
                      <option value="4">Per Tahun</option>
                      <option value="5">Jenis Surat</option>
                    </select>
                  </div>
                  <div class="form-group" id="form-jenis">
                    <label>Jenis Surat</label>
                    <select class="form-control" name="filterjenis" id="filterjenis">
                    <option value="Surat Keterangan Berkelakuan Baik">SURAT KETERANGAN BERKELAKUAN BAIK</option>
                    <option value="Surat Keterangan Domisili">SURAT KETERANGAN DOMISILI</option>
                    <option value="Surat Keterangan Kepemilikan Kendaraan Bermotor">SURAT KETERANGAN KEPEMILIKAN KENDARAAN BERMOTOR</option>
                    <option value="Surat Keterangan Perhiasan">SURAT KETERANGAN PERHIASAN</option>
                    <option value="Surat Keterangan Usaha">SURAT KETERANGAN USAHA</option>
                    <option value="Surat Lapor Hajatan">SURAT LAPOR HAJATAN</option>
                    <option value="Surat Pengantar Skck">SURAT PENGANTAR SKCK</option>
                    <option value="Surat Keterangan Tidak Mampu">SURAT KETERANGAN TIDAK MAMPU</option>
                    <option value="Surat Keterangan Beasiswa">SURAT KETERANGAN BEASISWA</option>
                    <option value="Surat Keterangan Status">SURAT KETERANGAN STATUS</option>
                    <option value="Surat Keterangan Kehilangan">SURAT KETERANGAN KEHILANGAN</option>
                    <option value="Surat Keterangan Penghasilan Orang Tua">SURAT KETERANGAN PENGHASILAN ORANG TUA</option>
                    </select>
                  </div>
                  <div class="form-group" id="form-tanggal">
                    <label>Tanggal</label><br>
                    <input class="form-control" type="date" name="tanggal">
                  </div>
                  <div class="form-group" id="form-bulan">
                    <label>Bulan</label><br>
                    <select class="form-control" name="bulan">
                      <option value="">Pilih</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                  <div class="form-group" id="form-tahun">
                    <label>Tahun</label><br>
                    <select class="form-control" name="tahun">
                      <option value="">Pilih</option>
                      <?php
                        $query = "SELECT YEAR(tanggal_surat) AS tahun FROM surat_keterangan GROUP BY YEAR(tanggal_surat)";
                        $sql = mysqli_query($connect, $query);
                        while($data = mysqli_fetch_array($sql)){
                          echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
              </form>
            </div>
          </div>
        </div><br><br>
        <?php
          if(isset($_GET['filter']) && ! empty($_GET['filter'])){
            $filter = $_GET['filter'];

            if($filter == '1'){
              $query = "SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' 
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' 
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai'
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai'
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai'
              UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' ORDER BY tanggal_surat";
            }else if($filter == '2'){
              $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan.id_sk as id_sk, surat_keterangan.no_surat, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND DATE(surat_keterangan.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_berkelakuan_baik.id_skbb as id_sk, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.ambil, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND DATE(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_domisili.id_skd as id_sk, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.ambil, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND DATE(surat_keterangan_domisili.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb as id_sk, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.ambil, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND DATE(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_perhiasan.id_skp as id_sk, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.ambil, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND DATE(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_usaha.id_sku as id_sk, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.ambil, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND DATE(surat_keterangan_usaha.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND DATE(surat_lapor_hajatan.tanggal_surat)='{$_GET['tanggal']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_pengantar_skck.id_sps as id_sk, surat_pengantar_skck.no_surat, surat_pengantar_skck.status_surat, surat_pengantar_skck.ambil, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND DATE(surat_pengantar_skck.tanggal_surat)='{$_GET['tanggal']}' ORDER BY tanggal_surat";
            
            }else if($filter == '3'){
              $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan.id_sk as id_sk, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND MONTH(surat_keterangan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_berkelakuan_baik.id_skbb as id_sk, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.ambil, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND MONTH(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_domisili.id_skd as id_sk, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.ambil, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND MONTH(surat_keterangan_domisili.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_domisili.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb as id_sk, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.ambil, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND MONTH(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_perhiasan.id_skp as id_sk, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.ambil, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND MONTH(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_usaha.id_sku as id_sk, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.ambil, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND MONTH(surat_keterangan_usaha.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_usaha.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND MONTH(surat_lapor_hajatan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_lapor_hajatan.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_pengantar_skck.id_sps as id_sk, surat_pengantar_skck.status_surat, surat_pengantar_skck.ambil, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND MONTH(surat_pengantar_skck.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_pengantar_skck.tanggal_surat)='{$_GET['tahun']}' ORDER BY tanggal_surat";
            }else if($filter == '4'){
              $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan.id_sk, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND YEAR(surat_keterangan.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_berkelakuan_baik.id_skbb as id_sk, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.ambil, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND YEAR(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_domisili.id_skd as id_sk, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.ambil, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND YEAR(surat_keterangan_domisili.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb as id_sk, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.ambil, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND YEAR(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_perhiasan.id_skp as id_sk, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.ambil, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND YEAR(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_usaha.id_sku as id_sk, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.ambil, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND YEAR(surat_keterangan_usaha.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND YEAR(surat_lapor_hajatan.tanggal_surat)='{$_GET['tahun']}'
              UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_pengantar_skck.id_sps as id_sk, surat_pengantar_skck.status_surat, surat_pengantar_skck.ambil, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND YEAR(surat_pengantar_skck.tanggal_surat)='{$_GET['tahun']}' ORDER BY tanggal_surat";
            }else if($filter == '5'){
              $filterjenis = $_GET['filterjenis'];
              if($filterjenis == 'Surat Keterangan Status'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan.id_sk as id_sk, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND surat_keterangan.jenis_surat = '{$_GET['filterjenis']}'";
              } else if($filterjenis == 'Surat Keterangan Berkelakuan Baik'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_berkelakuan_baik.id_skbb as id_sk, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.ambil, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND surat_keterangan_berkelakuan_baik.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Domisili'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_domisili.id_skd as id_sk, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.ambil, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND surat_keterangan_domisili.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Kepemilikan Kendaraan Bermotor'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb as id_sk, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.ambil, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Perhiasan'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_perhiasan.id_skp as id_sk, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.ambil, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND surat_keterangan_perhiasan.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Usaha'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_usaha.id_sku as id_sk, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.ambil, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND surat_keterangan_usaha.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Lapor Hajatan'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND surat_lapor_hajatan.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Pengantar Skck'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_pengantar_skck.id_sps as id_sk, surat_pengantar_skck.status_surat, surat_pengantar_skck.ambil, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND surat_pengantar_skck.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Tidak Mampu'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_tidak_mampu.id_sk as id_sk, surat_keterangan_tidak_mampu.status_surat, surat_keterangan_tidak_mampu.ambil, surat_keterangan_tidak_mampu.id_sk, surat_keterangan_tidak_mampu.ambil, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat, surat_keterangan_tidak_mampu.status_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND surat_keterangan_tidak_mampu.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Beasiswa'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan_beasiswa.id_sk, surat_keterangan_beasiswa.status_surat, surat_keterangan_beasiswa.ambil, surat_keterangan_beasiswa.no_surat, surat_keterangan_beasiswa.tanggal_surat, surat_keterangan_beasiswa.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_beasiswa ON surat_keterangan_beasiswa.nik = penduduk.nik WHERE surat_keterangan_beasiswa.status_surat='selesai' AND surat_keterangan_beasiswa.jenis_surat='{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Kehilangan'){
                $query = "SELECT a.* FROM penduduk a LEFT JOIN surat_keterangan b ON a.nik = a.nik WHERE b.status_surat='selesai' AND b.jenis_surat = '{$_GET['filterjenis']}'";
              }else if($filterjenis == 'Surat Keterangan Penghasilan Orang Tua'){
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.rt, surat_keterangan.id_sk, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND surat_keterangan.jenis_surat = '{$_GET['filterjenis']}'";
              }else{
                $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan.id_sk as id_sk, surat_keterangan.no_surat, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_berkelakuan_baik.id_skbb as id_sk, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.ambil, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' 
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_domisili.id_skd as id_sk, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.ambil, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' 
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb as id_sk, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.ambil, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_perhiasan.id_skp as id_sk, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.ambil, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_usaha.id_sku as id_sk, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.ambil, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_pengantar_skck.id_sps as id_sk, surat_pengantar_skck.no_surat, surat_pengantar_skck.status_surat, surat_pengantar_skck.ambil, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' ORDER BY tanggal_surat";
              }  
            } 
          }else{
            $query = "SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan.id_sk, surat_keterangan.no_surat, surat_keterangan.status_surat, surat_keterangan.ambil, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_berkelakuan_baik.id_skbb as id_sk, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.ambil, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' 
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_domisili.id_skd as id_sk, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.ambil, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' 
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb as id_sk, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.ambil, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_perhiasan.id_skp as id_sk, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.ambil, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_keterangan_usaha.id_sku as id_sk, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.ambil, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_lapor_hajatan.id_slh as id_sk, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.ambil, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai'
            UNION SELECT penduduk.nik, penduduk.nama, penduduk.dusun, penduduk.rt, penduduk.rw, surat_pengantar_skck.id_sps as id_sk, surat_pengantar_skck.no_surat, surat_pengantar_skck.status_surat, surat_pengantar_skck.ambil, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' ORDER BY tanggal_surat";
          } 
        ?>
        
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>Tanggal</strong></th>
              <th><strong>No. Surat</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Jenis Surat</strong></th>
              <th><strong>Status</strong></th>
              <th><strong>Aksi</strong></th>
              <th><strong>Keterangan</strong></th>
            </tr>
          </thead>
          <tbody>
          <?php
              $sql = mysqli_query($connect, $query);
              $row = mysqli_num_rows($sql);
              if($row > 0){
                while($data = mysqli_fetch_array($sql)){
            ?><tr>
                    <?php
                      $tgl_lhr = date($data['tanggal_surat']);
                      $tgl = date('d ', strtotime($tgl_lhr));
                      $bln = date('F', strtotime($tgl_lhr));
                      $thn = date(' Y', strtotime($tgl_lhr));
                      $blnIndo = array(
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember'
                      );
                    ?>
              <td><?php echo $tgl . $blnIndo[$bln] . $thn; ?></td>
              <td><?php echo $data['no_surat']; ?></td>
              <td><?php echo $data['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $data['nama']; ?></td>
              <td><?php echo $data['jenis_surat']; ?></td>
              <td><a class="btn btn-success btn-sm" href='#'><i class="fa fa-check"></i><b> <?php echo $data['status_surat']; ?></b></a></td>
              <td>
                <?php  
                  if($data['jenis_surat']=="Surat Keterangan"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Berkelakuan Baik"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_berkelakuan_baik/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Domisili"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_domisili/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Kepemilikan Kendaraan Bermotor"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_kepemilikan_kendaraan_bermotor/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Perhiasan"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_perhiasan/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Usaha"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_usaha/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Lapor Hajatan"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_lapor_hajatan/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Pengantar SKCK"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_pengantar_skck/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Tidak Mampu"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_tidak_mampu/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Status"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_status/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Kehilangan"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_kehilangan/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Penghasilan Orang Tua"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_penghasilan_orang_tua/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } else if($data['jenis_surat']=="Surat Keterangan Beasiswa"){
                ?>
                <a name="cetak" target="output" class="btn btn-primary btn-sm" href='../cetak/surat_keterangan_beasiswa/index.php?id=<?php echo $data['id_sk']; ?>'><i class="fa fa-print"></i><b> CETAK</b></a>
                <?php
                  } 

                ?>
              </td>
              <td>
              <!-- <a class="btn btn-success btn-md" href='tambah-penduduk.php'><i class="fa fa-user-plus"> -->
              
              <?php 
                  if($data['ambil']=="Sudah"){ ?>
                    <a class="btn btn-info btn-sm" href='detail_ambil.php?jenis=<?php echo $data['jenis_surat'] ?>&id=<?php echo $data['id_sk']; ?>'><i class="fa fa-suitcase"></i><b> SUDAH DIAMBIL</b></a>
                  <?php }else{ ?>
                    <a class="btn btn-danger btn-sm" href='ambil_surat.php?jenis=<?php echo $data['jenis_surat'] ?>&id=<?php echo $data['id_sk']; ?>'><i class="fa fa-suitcase"></i><b> AMBIL SURAT</b></a>
                  <?php } ?>
              </td>
            </tr>
            <?php
                }
              }else{
                echo "<tr><td colspan='5' align='center'>Data tidak ditemukan.</td></tr>";
              }
            ?>
          </tbody>
        </table>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#form-tanggal, #form-bulan, #form-tahun, #form-jenis').hide();
            $('#filter').change(function(){
              if($(this).val() == '1'){
                $('#form-tanggal, #form-bulan, #form-tahun, #form-jenis').hide();
              }else if($(this).val() == '2'){
                $('#form-bulan, #form-tahun, #form-jenis').hide();
                $('#form-tanggal').show();
              }else if($(this).val() == '3'){
                $('#form-tanggal, #form-jenis').hide();
                $('#form-bulan, #form-tahun').show();
              }else if($(this).val() == '4'){
                $('#form-tanggal, #form-bulan, #form-jenis').hide();
                $('#form-tahun').show();
              }else{
                $('#form-tanggal, #form-bulan, #form-tahun').hide();
                $('#form-jenis').show();
              }
              $('#form-tanggal input, #form-bulan select, #form-tahun, #form-jenis select').val('');
            })
          })
        </script>
      </div>
    </div>
  </section>
</div>


<?php 
  include ('../part/footer.php');
?>