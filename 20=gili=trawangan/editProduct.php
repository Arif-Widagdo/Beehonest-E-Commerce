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
      $cerita = mysqli_query($conn,"SELECT * FROM produk WHERE idproduk = '$idUpdate'");
      while ($infoEditProduct=mysqli_fetch_array($cerita)) {      
        ?>

        <!-- Start = isi konten -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
               <div class="row x_title" >
                <div class="col-md-6" >

                  <a href="manageProductContent.php"  style="float:left; font-size: 22px;">Produk > </a><a class="nav-link disabled" style=" font-size: 20px; line-height: 16px">> Edit Produk</a>
                </div>

              </div>

              <div class="col-md-8 ">              
                <form method="POST" action="action/crud/crudProduk.php" enctype="multipart/form-data" class="form-horizontal form-label-left" >
                  <input type="text" name="kode" value="edit" hidden>
                  <input type="text" name="idUpdate" value="<?php echo $idUpdate;?>"hidden >
                  <input type="text" name="gambarAsalProduk" value="<?php echo $infoEditProduct['gambar']?>" hidden>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Product</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="namaproduk" value="<?php echo $infoEditProduct['namaproduk'] ;?>" >
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Pilih Kategori</label>
                    <div class="col-md-6 col-sm-6 ">
                      <select name="idCategory" class="form-control">
                        <?php
                        $infoIdKategori = $infoEditProduct['idCategory'];
                        $cat=mysqli_query($conn,"select * from produk where idproduk=$infoIdKategori")or die(mysqli_error());
                        while($infoCat=mysqli_fetch_array($cat)){
                          ?>
                          <option selected><?php echo $infoEditProduct['idCategory'] ?></option>
                          <?php
                        }
                        ?>   
                        <?php
                        $det=mysqli_query($conn,"select * from categories order by category_name ASC")or die(mysqli_error());
                        while($d=mysqli_fetch_array($det)){
                          ?>
                          <option value="<?php echo $d['id'] ?>"><?php echo $d['category_name'] ?></option>
                          <?php
                        }
                        ?>    
                      </select>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Produk</label>
                    <div class="col-md-6 col-sm-6 ">
                      <textarea class="form-control" name="deskripsi" rows="5" required><?php echo $infoEditProduct['deskripsi'] ;?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Rating Produk</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input name="rate" type="number" class="form-control" value="<?php echo $infoEditProduct['rate'] ;?>" min="1" max="5" required>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Sebelum Diskon</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input name="hargabefore" type="number" value="<?php echo $infoEditProduct['hargabefore'] ;?>" class="form-control">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Sesudah Diskon</label>
                    <div class="col-md-6 col-sm-6 ">
                     <input name="hargaafter" type="number" value="<?php echo $infoEditProduct['hargaafter'] ;?>" class="form-control">
                   </div>
                 </div>
                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Berat</label>
                    <div class="col-md-6 col-sm-6 ">
                     <input name="berat" type="number" value="<?php echo $infoEditProduct['berat'] ;?>" class="form-control">
                   </div>
                 </div>
                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Harga Sesudah Diskon</label>
                    <div class="col-md-6 col-sm-6 ">
                     <input name="stok_produk" type="number" value="<?php echo $infoEditProduct['stok_produk'] ;?>" class="form-control">
                   </div>
                 </div>
                 <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar 
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="file" name="gambar" >
                  </div>
                </div>
              <?php } ?>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button type="submit"  class="btn btn-info">Simpan</button>
                </div>
              </div>
              <div class="ln_solid"></div>

            </form>
          </div>
          <div class="col-md-4">
           <?php
           $idUpdate = $_GET['idUpdate'];
           $cerita = mysqli_query($conn,"SELECT * FROM produk WHERE idproduk = '$idUpdate'");
           while ($infoEditProduct=mysqli_fetch_array($cerita)) {      
            ?>
            <img src="<?php echo str_replace("../../"," ",$infoEditProduct['gambar']);?>"
            width="200px" height="200px">
          <?php } ?>
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
