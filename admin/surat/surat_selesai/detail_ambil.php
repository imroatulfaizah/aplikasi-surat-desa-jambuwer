<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
    include ('../../../config/koneksi.php');
    $id = $_GET['id'];
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
      <li>
        <a href="../../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li class="active">
        <a href="../../penduduk/">
          <i class="fa fa-users"></i><span>&nbsp;Data Penduduk</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="../permintaan_surat/">
              <i class="fa fa-circle-notch"></i> Permintaan Surat
            </a>
          </li>
          <li>
            <a href="../surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="../../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Pengambilan Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <!-- <form method="post" enctype="multipart/form-data" action="import-penduduk.php">
          <div class="col-md-3">
            <input name="datapenduduk" type="file" required="required">
          </div>
          <div>
            <input name="upload" type="submit" class="btn btn-primary" value="Import .XLS">
          </div>
        </form><br> -->
      </div>
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fas fa-user-plus"></i> Detail Pengambilan Surat</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div>
            <?php
            $id = $_GET['id'];
            $jenis = $_GET['jenis'];
            // var_dump($jenis);

              include ('../../../config/koneksi.php');

              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM surat_diambil WHERE id_surat = $id AND jenis_surat = '$jenis'");
            //   var_dump($qTampil);
              foreach($qTampil as $row){
            //    var_dump($qTampil);
            ?>
          <div class="box-body">
            <div class="row">
              <form class="form-horizontal" method="post" action="ambil_simpan.php">
                <div class="col-md-6">
                  <div class="box-body">
                    <!-- <div class="form-group">
                      <label class="col-sm-4 control-label">NIK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnik" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="NIK" required>
                        <script>
                          function hanyaAngka(evt){
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                            return true;
                          }
                        </script>
                      </div>
                    </div> -->
                    <div class="form-group" hidden>
                      <label class="col-sm-4 control-label">Id</label>
                      <div class="col-sm-8">
                        <input type="text" name="fid_surat" value="<?php echo $_GET['id'];?>" class="form-control" style="text-transform: capitalize;">
                      </div>
                    </div>
                    <div class="form-group" hidden>
                      <label class="col-sm-4 control-label">Jenis Surat</label>
                      <div class="col-sm-8">
                        <input type="text" name="fjenis_surat" value="<?php echo $_GET['jenis'];?>" class="form-control" style="text-transform: capitalize;">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['nama']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Alamat</label>
                      <div class="col-sm-8">
                        <input type="text" name="falamat" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['alamat']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">No. Telp</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnotelp" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['no_telp']; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">KTP</label>
                        <div class="col-md-8">
                            <input name="ktp" type="file" required="required">
                        </div>
                    </div>
                  </div>
                  <!-- <div class="box-footer pull-right">
                    <input type="reset" class="btn btn-default" value="Batal">
                    <input type="submit" name="submit" class="btn btn-info" value="Submit">
                  </div> -->
                </div>
              </form>
            </div>
          </div>
          <?php } ?>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>