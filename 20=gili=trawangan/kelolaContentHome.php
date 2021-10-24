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
                    <h3>Kelola Home Content</h3>
                  </div>
                  <div class="col-md-6">
                    <a href="../index.php#home" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT WEB</a>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 ">              
                <br>
                <form method="POST" action="action/insert/updateContentHome.php" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <h5>Slide 1</h5>
                 <?php
                    $home_content = mysqli_query($conn,"SELECT * FROM home_content");
                    while ($tampilResepsi=mysqli_fetch_array($home_content)) {
                  ?>
                  <input type="text" name="gambarAsal" value="<?php echo $tampilResepsi['fileGambar'];?>"hidden >
                  <input type="text" name="gambarGedungL" value="<?php echo $tampilResepsi['gambarGedung'];?>" hidden>
                  <input type="text" name="id" value = "<?php echo $tampilResepsi['id'];?>" hidden>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Title </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="title" value="<?php echo $tampilResepsi['title'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Title</label>
                    <div class="col-md-6 col-sm-6 ">
                      <textarea class="form-control" name="deskripsi_title" rows="3" required><?php echo $tampilResepsi['deskripsi_title'];?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Button</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="btn_nama" value="<?php echo $tampilResepsi['btn_nama'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tujuan Button</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="span_deskrip" value="<?php echo $tampilResepsi['span_deskrip'];?>">
                    </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar  Untuk Halaman Home</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambarGedung">
                      <label>Ukuran Gambar Yang Direkomendasikan adalah 500x500 px</label>
                    </div>
                  </div>            
                  <div class="item form-group" hidden>
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar Background</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambar">
                      <label>Ukuran Gambar Yang Direkomendasikan adalah 700x380 px</label>
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




<!-- Home 2 -->
<form method="POST" action="action/insert/updateContentHome1.php" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <h5>Slide 1</h5>
                 <?php
                    $home_content = mysqli_query($conn,"SELECT * FROM home_content1");
                    while ($tampilHome1=mysqli_fetch_array($home_content)) {
                  ?>
                  <input type="text" name="gambarAsal" value="<?php echo $tampilHome1['fileGambar'];?>"hidden >
                  <input type="text" name="gambarGedungL" value="<?php echo $tampilHome1['gambarGedung'];?>" hidden>
                  <input type="text" name="id" value = "<?php echo $tampilHome1['id'];?>" hidden>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Title </label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="title" value="<?php echo $tampilHome1['title'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi Title</label>
                    <div class="col-md-6 col-sm-6 ">
                      <textarea class="form-control" name="deskripsi_title" rows="3" required><?php echo $tampilHome1['deskripsi_title'];?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Button</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="btn_nama" value="<?php echo $tampilHome1['btn_nama'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tujuan Button</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="span_deskrip" value="<?php echo $tampilHome1['span_deskrip'];?>">
                    </div>
                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar  Untuk Halaman Home</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambarGedung">
                      <label>Ukuran Gambar Yang Direkomendasikan adalah 500x500 px</label>
                    </div>
                  </div>            
                  <div class="item form-group" hidden>
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Gambar Background</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="file" name="gambar">
                      <label>Ukuran Gambar Yang Direkomendasikan adalah 700x380 px</label>
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


<!-- About Content -->

        <div class="row" id="about">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Kelola About Content</h3>
                  </div>
                  <div class="col-md-6">
                    <a href="../index.php#about" class="btn btn-primary " style="float:right;" target="_blank  ">LIHAT WEB</a>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 ">              
                <br>
                <form method="POST" action="action/insert/updateContentAbout.php" class="form-horizontal form-label-left" >
                  <?php
                    $sambutan = mysqli_query($conn,"SELECT * FROM about_content");
                    while ($tampilHome=mysqli_fetch_array($sambutan)) {
                  ?>
                  <input type="text" name="idAbout" value = "<?php echo $tampilHome['idAbout'];?>" hidden>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Title About</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" name="titleAbout" value="<?php echo $tampilHome['titleAbout'];?>">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Paragraf-1 
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                     <textarea class="form-control" name="isiParagraf1" rows="3" required><?php echo $tampilHome['isiParagraf1'];?></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Paragraf-2
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                     <textarea class="form-control" name="isiParagraf2" rows="3" required><?php echo $tampilHome['isiParagraf2'];?></textarea>
                    </div>            
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Link Video Youtube
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                    <input type="text" required class="form-control" name="linkYoutube" value="<?php echo $tampilHome['linkYoutube'];?>">
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
      </div>
    <!-- End = isi About -->
    
    



    <!--  -->
    </div>
  </div>

  
  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>
</html>
