<?php 
  include ('../part/akses.php');
  include ('../../config/koneksi.php');
  include ('../part/header.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT * FROM pejabat_desa WHERE id_pejabat_desa='$id'");
  while($row = mysqli_fetch_array($qCek)){
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
           <?php 
        }else{
          ?>
                <li>
     				<a href="../penduduk"><i class="fa fa-circle-notch"></i> Data Penduduk</a>
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
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-edit"></i> Edit Data Pejabat Desa</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <form class="form-horizontal" method="post" action="update-pejabatdesa.php">
                <div class="col-md-6">
                  <div class="box-body">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id_pejabat_desa']; ?>">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">NIK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnik" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $row['NIK']; ?>" required>
                        <script>
                          function hanyaAngka(evt){
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                            return true;
                          }
                        </script>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" placeholder="Nama" value="<?php echo $row['nama_pejabat_desa']; ?>" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Jabatan</label>
                      <div class="col-sm-8">
                        <select name="fjabatan" class="form-control" value="<?php echo $row['jabatan']; ?>" required>
                          <option value="">-- Jabatan --</option>
                          <option <?php if($row['jabatan'] == 'Kepala Desa'){ echo 'selected'; } ?> value="Kepala Desa">Kepala Desa</option>
                          <option <?php if($row['jabatan'] == 'Plt. Kepala Desa'){ echo 'selected'; } ?> value="Plt. Kepala Desa">Plt. Kepala Desa</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status</label>
                      <div class="col-sm-8">
                        <select name="fstatus" class="form-control" value="<?php echo $row['status']; ?>" required>
                          <option value="">-- Status --</option>
                          <option <?php if($row['status'] == '1'){ echo 'selected'; } ?> value="1">Active</option>
                          <option <?php if($row['status'] == '0'){ echo 'selected'; } ?> value="0">Non Active</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer pull-right">
                    <input type="reset" class="btn btn-default" value="Batal">
                    <input type="submit" name="submit" class="btn btn-info" value="Submit">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
  }

  include ('../part/footer.php');
?>