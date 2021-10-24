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
                  <h3>Internet Of Things (IoT)</h3>
                </div>
                <div class="col-md-6">
                  <a href="../index.php#home" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT
                    WEB</a>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 ">
                <br>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <br />
      </div>
      <!-- End = isi konten -->
    </div>
  </div>
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
