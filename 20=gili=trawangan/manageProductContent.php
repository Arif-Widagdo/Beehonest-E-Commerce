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
                  <a href="../index.php#products" class="btn btn-primary " style="float:left;" target="_blank  ">LIHAT WEB</a>
                </div>
                <div class="col-md-6">
                  <a href="#addProduct" data-toggle="modal" data-target="#addProduct" class="btn btn-primary " style="float:right;" target="_blank  ">TAMBAH PRODUK <i class="fas fa-plus"></i></a>
                </div>
              </div>

              

              <div class="col-sm-12">
                <h3>List Produk</h3>
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Kategori</th>
                      <th>Harga Awal</th>
                      <th>Harga Diskon</th>
                      <th>Berat</th>
                      <th>Stok</th>
                      <th>Tambah Links Marketplace</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody style="">
                    <?php 
                    $brgs=mysqli_query($conn,"SELECT * from categories k, produk p where k.id=p.idcategory order by idproduk ASC");
                    $no=1;
                    while($infoProduk=mysqli_fetch_array($brgs)){
                      ?>
                      
                      <tr>                          
                        <td><?php echo $no++;?></td>
                        <td><img style="width: 80px" src="<?php echo str_replace("../../"," ",$infoProduk['gambar']);?>" width="100px" height="80px"></td>
                        <td><?php echo $infoProduk['namaproduk'];?></td>
                        <td><?php echo $infoProduk['category_name'] ?></td>
                        <td><?php echo $infoProduk['hargabefore'] ?></td>
                        <td><?php echo $infoProduk['hargaafter'] ?></td>
                        <td><?php echo $infoProduk['berat'], " gr" ?></td>
                        <td><?php echo $infoProduk['stok_produk'] ?></td>
                        <td><a style="font-size:14px; width: 150px; height: 40px; line-height: 30px" class="btn btn-success" href="kelolaLinksMarketplace.php?idproduk=<?php echo $infoProduk['idproduk']?>">Tambah Link Market</a> <br> <a style="font-size:14px; width: 150px; height: 40px; line-height: 30px;" class="btn btn-success" href="SubGambarProduk.php?idproduk=<?php echo $infoProduk['idproduk']?>,namaproduk=<?php echo $infoProduk['namaproduk']?>"> Tambah Gambar</td>
                          

                          <td><a href="editProduct.php?idUpdate=<?php echo $infoProduk['idproduk'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Details</a>
                    <a href="action/crud/crudProduk.php?id=<?php echo $infoProduk['idproduk'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a></td>
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
          <br/>       
        </div>
        <!-- End = isi konten -->
        <!--  -->
      </div>
    </div>




    <!-- modal input -->
    <div id="addProduct" class="modal fade">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h4 class="modal-title">Tambah Produk</h4>
       </div>

       <div class="modal-body">
        <form action="action/crud/crudProduk.php" method="POST" enctype="multipart/form-data" >
          <input type="text" value="tambah" name="kode" hidden>
          <input type="text" name="idUpdate" value=" " hidden>
          

          <div class="form-group">
           <label>Nama Produk</label>
           <input name="namaproduk" type="text" class="form-control" required autofocus>
         </div>
         <div class="form-group">
           <label>Nama Kategori</label>
           <select name="idCategory" class="form-control">
             <option selected>Pilih Kategori</option>
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
         <div class="form-group">
           <label>Deskripsi Produk</label>
           <textarea class="form-control" name="deskripsi" rows="5" required></textarea>

         </div>
         <div class="form-group">
           <label>Rating (1-5)</label>
           <input name="rate" type="number" class="form-control"  min="1" max="5" required>
         </div>
         <div class="form-group">
           <label>Harga Sebelum Diskon</label>
           <input name="hargabefore" type="number" class="form-control">
         </div>
         <div class="form-group">
           <label>Harga Setelah Diskon</label>
           <input name="hargaafter" type="number" class="form-control">
         </div>
         <div class="form-group">
           <label>Berat (gram)</label>
           <input name="berat" type="number" class="form-control">
         </div>
         <div class="form-group">
           <label>Stok</label>
           <input name="stok_produk" type="number" class="form-control">
         </div>
         <div class="form-group">
           <label>Gambar</label>
           <input name="uploadgambar" type="file" class="form-control">
         </div>

       </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <input name="kodeT" type="submit" class="btn btn-primary" value="Tambah">
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
