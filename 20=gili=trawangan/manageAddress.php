<!DOCTYPE html>
<html lang="en">
<head>
   <?php 
   //koneksi
   require_once ('Api/koneksi.php');
   //header
   require_once('header.php'); ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Start = Sidebar -->
      <?php 
      //sidebar
      require_once('sidebar.php');
      //navbar atas
      require_once('topNavigation.php');
      ?>
     
    
      <!-- Start = isi konten -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Alamat Perusahaan</h3>
                  </div>
                   <div class="col-md-6">
                    <a href="../index.php#sosmed" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT WEB</a>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 ">              
                <br>

                <form method="POST" action="action/insert/updateAddress.php" class="form-horizontal form-label-left" >
                  <?php
                    $alamat = mysqli_query($conn,"SELECT * FROM alamat");
                    while ($infoAlamat=mysqli_fetch_array($alamat)) {
                  ?>
                  <input type="text" name="idAlamat" value = "<?php echo $infoAlamat['idAlamat'];?>" hidden >
                  
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Perusahaan</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="namaPerusahaan" value="<?php echo $infoAlamat['namaPerusahaan'];?>">
                    </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Perusahaan </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="alamatPerusahaan" value="<?php echo $infoAlamat['alamatPerusahaan'];?>">
                    </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Email Perusahaan</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="email" required class="form-control" name="email" value="<?php echo $infoAlamat['email'];?>">
                    </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="noTelp_P" value="<?php echo $infoAlamat['no_telpPerusahaan'];?>">
                    </div>
                  </div>
                  <hr>
                  <h3>Alamat Link Social Media</h3>
                  <hr>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Link Facebook  </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="url" required class="form-control" name="fb" value="<?php echo $infoAlamat['fb'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Link Instagram </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="url" required class="form-control" name="ig" value="<?php echo $infoAlamat['ig'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Link Twitter</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="url" required class="form-control" name="twitter" value="<?php echo $infoAlamat['twitter'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Link LinkedIn</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="url" required class="form-control" name="linkedin" value="<?php echo $infoAlamat['linkedin'];?>">
                    </div>
                  </div>
                  

                  

                  


                  <?php
                    }
                  ?>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                 
                </form>
                </div>
                <div class="clearfix"></div>

              </div>
            </div>
          </div>
        <br/>       
      </div>
    <!-- End = isi konten -->
    



    <!--  -->
    </div>
  </div>

  
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
