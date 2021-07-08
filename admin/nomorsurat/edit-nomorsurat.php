<?php 
  include ('../part/akses.php');
  include ('../../config/koneksi.php');
  include ('../part/header.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT * FROM nomor_surat WHERE id='$id'");
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
      <li class="active">Kode Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-edit"></i> Edit Data Kode Surat</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <form class="form-horizontal" method="post" action="update-nomorsurat.php">
                <div class="col-md-6">
                  <div class="box-body">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">JENIS SURAT</label>
                      <div class="col-sm-8">
                        <input type="text" name="fjenis_surat" class="form-control" style="text-transform: capitalize;" placeholder="Jenis Surat" value="<?php echo $row['jenis_surat']; ?>" readonly required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kode No. Surat</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnomorsurat" class="form-control" style="text-transform: capitalize;" placeholder="No. Surat" value="<?php echo $row['no_surat']; ?>" required>
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