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
      <?php
      $idUpdate = $_GET['idUpdate'];
      $cerita = mysqli_query($conn,"SELECT * FROM marketplace WHERE idmarketplace = '$idUpdate'");
      while ($infoEditMarket=mysqli_fetch_array($cerita)) {      
        ?>

        <!-- Start = isi konten -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">

                <div class="row x_title">

                  <div class="col-md-6" >

                    <a href="kelolaMarketplace.php"  style="float:left; font-size: 22px;">MarketPlace > </a><a class="nav-link disabled" style=" font-size: 20px; line-height: 16px">> Edit Marketplace</a>
                  </div>

                  <div class="col-md-3">
                   <img src="fileUpload/logo<?php echo $infoEditMarket['gambarmarketplace']; ?>"
                   width="170px" height="60px">
                 </div>
               </div>

               <div class="col-md-12 col-sm-12 ">              
                <br>


                <form method="POST" action="action/crud/crudMarketplace.php?id=" enctype="multipart/form-data" class="form-horizontal form-label-left" >


                  <input type="text" name="kode" value="edit" hidden>
                  <input type="text" name="idUpdate" value="<?php echo $idUpdate;?>" hidden>
                  <input type="text" name="gambarLogoAsal" value="<?php echo $infoEditMarket['gambarmarketplace'];?>" hidden>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Marketplace</label>
                    
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="namamarketplace" value="<?php echo $infoEditMarket['namamarketplace'] ;?>" >
                    </div>
                  </div>


                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar 
                    </label>
                    
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambar">
                    </div>
                  </div>
                <?php } ?>
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
