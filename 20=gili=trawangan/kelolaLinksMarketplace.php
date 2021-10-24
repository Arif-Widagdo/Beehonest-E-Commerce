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

                  <a href="manageProductContent.php"  style="float:left; font-size: 22px;">Product > </a><a class="nav-link disabled" style=" font-size: 20px; line-height: 16px"> >  Links Marketplace</a>
                </div>

              </div>
              <div class="col-sm-12">
                <?php 
                $p2 = mysqli_fetch_array(mysqli_query($conn,"Select * from produk where idproduk='$idproduk'"));
                ?>
                <div class="row x_title" >
                  <div class="col-md-6">
                    <h3><?php echo $p2['namaproduk'];?></h3>
                    <h5>Id Produk :<?php echo $p2['idproduk'];?> </h5>
                    <img src="<?php echo str_replace("../../"," ",$p2['gambar']);?>" width="140px" height="140px">
                  </div>     
                  <div class="col-md-6">
                    <br><br><br><br>  <br><br><br><br><br>
                    <a href="#myModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary "
                    style="float:right;" target="_blank  ">Tambah Link <i class="fas fa-plus"></i></a>
                  </div>
                </div>

                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Logo Marketplace</th>
                      <th>Nama Marketplace</th>
                      <th>Links Marketplace</th>
                      <th>Action</th>

                    </tr>
                  </thead>

                  <tbody>

                    <?php $marketplace=mysqli_query($conn,"SELECT * from marketplace");
                    $no=1;
                    while($infoProduk=mysqli_fetch_array($marketplace)){
                      $idmarketplace = $infoProduk['idmarketplace'];
                      $p3 = mysqli_fetch_array(mysqli_query($conn,"Select * from linksmarketplace where idmarketplace='$idmarketplace' && idproduk=$idproduk"));
                      ?>
                      <tr>                          
                        <td><?php echo $no++;?></td>
                        <td><img src="fileUpload/logo<?php echo $infoProduk['gambarmarketplace']; ?>"
                         width="100px" height="50px"></td>
                         <td><h6><?php echo $infoProduk['namamarketplace'];?></h6></td>
                         <td><a href="<?php echo $p3['linkmarket'] ?>">
                          <?php if(!$p3){
                            echo " ";
                          }else 
                          echo substr($p3['linkmarket'],0,50)?></a></td>
                          <td><a href="editLinksMarketplace.php?idUpdate=<?php echo $p3['idlinksmarket'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <a href="action/crud/crudLinksMarketplace.php?id=<?php echo $p3['idlinksmarket'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a></td>


                          

                          
                        </tr>
                        <?php
                      }
                      ?> 
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
            <h4 class="modal-title">Tambah Links Marketplace</h4>
          </div>
          <div class="modal-body">
            <form action="action/crud/crudLinksMarketplace.php" method="POST" enctype="multipart/form-data">
              <input type="text" value="tambah" name="kode" hidden>
              <div class="form-group">
                <input name="idproduk" type="text" class="form-control" value="<?php echo $p2['idproduk'];?>" hidden >
              </div>
              <div class="form-group">
                <input name="namaproduk" type="text" class="form-control" value="<?php echo $p2['namaproduk'];?>"  hidden>
              </div>
              <div class="form-group">
                <label>Nama Marketplace</label>
                <select name="idmarketplace" class="form-control">
                  <option selected>Pilih Marketplace</option>
                  <?php
                  $market=mysqli_query($conn,"select * from marketplace order by namamarketplace ASC")or die(mysqli_error());
                  while($infolinks=mysqli_fetch_array($market)){
                    ?>
                    <option value="<?php echo $infolinks['idmarketplace'] ?>"><?php echo $infolinks['namamarketplace'] ?></option>
                    <?php
                  }
                  ?>    
                </select>

              </div>
              <div class="form-group">
                <label>Link Marketplace</label>
                <input name="links" type="text" class="form-control">
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
