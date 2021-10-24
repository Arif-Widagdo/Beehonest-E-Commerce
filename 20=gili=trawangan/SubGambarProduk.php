<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
   //koneksi
  require_once ('Api/koneksi.php');
  $idproduk = $_GET['idproduk'];

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

              <div class="row x_title" >
                <div class="col-md-6" >

                  <a href="manageProductContent.php"  style="float:left; font-size: 22px;">Produk > </a><a class="nav-link disabled" style=" font-size: 20px; line-height: 16px"> >  Tambah Gambar Produk</a>
                </div>
              </div>
              <div class="col-sm-12">


                <?php 
                $p2 = mysqli_fetch_array(mysqli_query($conn,"Select * from produk where idproduk='$idproduk'"));
                $infoProduk = mysqli_fetch_array(mysqli_query($conn,"Select * from gambarproduk where idproduk='$idproduk'"));
                ?>
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>
                      <td>"<?php echo $p2['namaproduk'];?>"</td>
                    </h3>
                  </div>
                  <div class="col-md-6">
                    <a href="#myModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary "
                    style="float:right;" target="_blank  ">Tambah Gambar <i class="fas fa-plus"></i></a>
                  </div>

                  <div class="col-md-6">
                    <a style="font-size:14px;" class="btn btn-danger"
                    href="action/crud/crudSubProduk.php?id=<?php echo $infoProduk['idproduk'];?>">Hapus</a>
                  </div>

                </div>

                <table id="example1" class="table table-bordered table-striped" style=" text-align: center;">
                  <thead>
                    <tr>
                      <th>id Produk</th>
                      <th>Gambar Display [0]</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td><?php echo $p2['idproduk'];?></td>
                      <td><img src="<?php echo str_replace("../../","",$p2['gambar']); ?>" width="100px" ></td>
                      <?php 
                      $brgs=mysqli_query($conn,"SELECT * from gambarproduk where idproduk='$idproduk'");
                      while($infoProduk=mysqli_fetch_array($brgs)){
                       ?>
                       <td><img src="<?php echo str_replace("../../","",$infoProduk['gambar1']); ?>" width="150px" height="90px"></td>
                       <?php
                     }
                     ?>
                   </tr>
                 </tbody>
               </table>
             </div>
             <div class="clearfix"></div>
           </div>
         </div>
       </div>
       <br />
     </div>
     <!-- End = isi konten -->
     <!--  -->
   </div>
 </div>




 <!-- modal input -->

 <div id="myModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Sub Gambar Produk</h4>
      </div>
      <div class="modal-body">
        <form action="action/insert/updateSubGambar.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input name="idproduk" type="text" class="form-control" value="<?php echo $p2['idproduk'];?>" hidden>
          </div>
          <div class="form-group">
            <input name="idCategory" type="text" class="form-control" value="<?php echo $p2['idCategory'];?>" hidden>
          </div>
          <div class="form-group">
            <label>Nama Produk</label>
            <input name="namaproduk" type="text" class="form-control" value="<?php echo $p2['namaproduk'];?>"
            readonly>
          </div>
          <div class="form-group">
            <label>Gambar1</label>
            <input name="uploadgambar" type="file" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
        </div>
      </form>
    </div>
  </div>
</div>










<!-- Start = Footer -->
<?php require_once('footer.php'); ?>
<!-- End = Isi Footer -->
</body>

</html>
