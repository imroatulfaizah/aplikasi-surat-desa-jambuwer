<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
            <a href="../penduduk/"><i class="fa fa-circle-notch"></i> Data Penduduk</a>
          </li>
           <li>
            <a href="../pejabatdesa"><i class="fa fa-circle-notch"></i> Pejabat Desa</a>
          </li>
           <li>
            <a href="../nomorsurat"><i class="fa fa-circle-notch"></i> Nomor Surat</a>
          </li>
           <?php 
        }else{
          ?>
          <li>
            <a href="../pejabatdesa"><i class="fa fa-circle-notch"></i> Data Penduduk</a>
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
            <a href="../surat/permintaan_surat/"><i class="fa fa-circle-notch"></i> Permintaan Surat</a>
          </li>
          <li>
            <a href="../surat/surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai</a>
          </li>
        </ul>
      </li>
      <?php 
        }else{
          
        }
      ?>
      <li>
        <a href="../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span></a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Kode No. Surat</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Kode No. Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div>
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal-menambah"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menambah data. NIK tersebut sudah digunakan.</center></div>";
              }
              if($_GET['pesan']=="gagal-menghapus"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menghapus data tersebut.</center></div>";
              }if($_GET['pesan']=="berhasil-update"){
                echo "<div class='alert alert-success'><center>Data berhasil diubah</center></div>";
              }if($_GET['pesan']=="berhasil-tambah"){
                echo "<div class='alert alert-success'><center>Data berhasil ditambahkan</center></div>";
              }if($_GET['pesan']=="berhasil-hapus"){
                echo "<div class='alert alert-success'><center>Data berhasil dihapus</center></div>";
              }
            }
          ?>
        </div>
        <?php 
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
        ?>
        <!-- <a class="btn btn-success btn-md" href='tambah-nomorsurat.php'><i class="fa fa-user-plus"></i> Tambah Data Kode No. Surat</a> -->
        <!-- <a target="_blank" class="btn btn-info btn-md" href='export-penduduk.php'><i class="fas fa-file-export"></i> Export .XLS</a> -->
        <?php 
          } else {

          }
        ?>
        <br><br>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>No</strong></th>
              <th><strong>JENIS SURAT</strong></th>
              <th><strong>NO SURAT</strong></th>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
              <th><strong>Aksi</strong></th>
              <?php  
                } else {

                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
              include ('../../config/koneksi.php');

              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM nomor_surat");
              foreach($qTampil as $row){
                
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['jenis_surat']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['no_surat']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
              <td>
                <a class="btn btn-success btn-sm" href='edit-nomorsurat.php?id=<?php echo $row['id']; ?>'><i class="fa fa-edit"></i></a>
                <!-- <a class="btn btn-danger btn-sm" href='hapus-nomorsurat.php?id=<php echo $row['id']; ?>' onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a> -->
              </td>
              <?php  
                } else {
                  
                }
              ?>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>