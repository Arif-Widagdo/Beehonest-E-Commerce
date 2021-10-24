<?php 
session_start();
include '20=gili=trawangan/Api/koneksi.php';
require_once('20=gili=trawangan/Api/koneksi.php'); 
$s = $_POST['Search'];
?>


<!-- Author : Arif Widagdo -->
<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include 'templates/head.php'; ?>
  <title>BeeHonest</title>
  
</head>

<body>

  <div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
  </div>

  <?php include 'templates/topbar.php'; ?>



<!-- Portfolio section start -->
  <section class="portfolio-section section" id="products">
    <div class="container">
      <div class="row">
        <div class="section-title">
          <h2 data-heading="Order Now">Our Products</h2>
        </div>
      </div>
      <!-- portfolio filter start -->
      <div class="row">
        <div class="portfolio-filter">
          <span class="filter-item outer-shadow active" data-target="all"><?php echo $s = $_POST['Search'];?></span>
          </span>
        </div>
      </div>
      <!-- portfolio filter end -->

      <!-- portfolio items start -->
      <div class="row portfolio-items">
        <?php 
        $cat=mysqli_fetch_array(mysqli_query($conn,"SELECT * from categories "));  
          $brgs=mysqli_query($conn,"SELECT * from  produk  where  namaproduk like '%$s%' or deskripsi like '%$s%' order by idproduk ASC");  
          while($p=mysqli_fetch_array($brgs)){  
          $idproduk=$p['idproduk'];    
        ?>
        <?php 
          $brgs2=mysqli_fetch_array(mysqli_query($conn,"SELECT * from gambarproduk  where idproduk=$idproduk "));  
        ?>
        <div class="portfolio-item" data-category="<?php echo $cat['category_name']?>">
          <div class="portfolio-item-inner outer-shadow">
            <div class="portfolio-item-img">
              <?php $infoGambarSub = isset($brgs2['gambar1']);?>
              <img src="<?php echo str_replace("../../","20=gili=trawangan/",$p['gambar'])?>" alt="portfolio"
                data-screenshots="<?php echo str_replace("../../","20=gili=trawangan/",$p['gambar'])?>, 
                    <?php  
                        if (!$infoGambarSub){
                            echo("20=gili=trawangan/produk/subProduk/no_image2.jpg");
                        }else
                            echo str_replace("../../","20=gili=trawangan/",$brgs2['gambar1']);
                        ?>">
              <!-- View Products btn -->
              <span class="view-project">View Products <i class="fas fa-arrow-circle-right"></i></span>
            </div>
            <div class="portfolio-display">
              <div class="row">
                <p class="portfolio-item-star">
                  <span>
                    <?php
                      $bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                      $rate = $p['rate'];
                        for($n=1;$n<=$rate;$n++){
                          echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                        };
                    ?>
                  </span>
                </p>
              </div>
              <div class="row">
                <h3 class="portfolio-item-title"><?php echo $p['namaproduk']?></h3>
                <div class="harga">
                  <div class="harga-diskon">
                    <p>IDR <?php echo number_format($p['hargaafter'],2,',','.')?></p>
                    <p>Stok Barang : <?php echo $p['stok_produk'];?>pcs</p>
                  </div>
                  <div class="harga-awal">
                    <p>IDR <?php echo number_format($p['hargabefore'],2,',','.')?></p>
                  </div>
                </div>
                <!-- portfolio item details start -->
              </div>
            </div>

            <div class="portfolio-item-details">
              <div class="row">
                <div class="description">
                  <h3>Deskripsi</h3>
                  <p><?php echo $p['deskripsi'];?></p>
                </div>
                <div class="pp-project-order-btn outer-shadow hover-in-shadow">
                  <div class="input-group">
                    <a href="beli?id=<?= $p['idproduk']; ?>" class="btn btn-primary">Add to cart <i
                        class="fas fa-shopping-cart"></i></a>
                  </div>
                </div>
                <div class="info">
                  <h3>buy in marketplace</h3>
                  <table style="width:100%;  padding:0 15px;">
                    <tbody>
                      <?php 
                        $marketplace=mysqli_query($conn,"SELECT * from marketplace");
                        $no=1;
                        while($infoProduk=mysqli_fetch_array($marketplace)){
                        $idmarketplace = $infoProduk['idmarketplace'];
                        $p3 = mysqli_fetch_array(mysqli_query($conn,"Select * from linksmarketplace where idmarketplace='$idmarketplace' && idproduk=$idproduk"));
                      ?>
                      <tr>
                        <td><a onClick="alert('Browse Marketplace Link')" href="<?php if(!$p3){
                            echo "#";
                          }else 
                          echo $p3['linkmarket'];?> "> <?php echo $infoProduk['namamarketplace'];?></td>
                        <td>
                          <a onClick="alert('Browse Marketplace Link')" href="<?php if(!$p3){
                            echo "#";
                          }else 
                          echo $p3['linkmarket'];?> "> <img
                              src="20=gili=trawangan/fileUpload/logo<?php echo $infoProduk['gambarmarketplace']; ?>"
                              width="150px" style=margin-top:5px;></a></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                  </ul>
                </div>
              </div>
            </div>
            <!-- portfolio item details end -->
          </div>
        </div>
        <!-- portfolio item end -->
        <?php
          }
        ?>
      </div>
  </section>
  <!-- Portfolio section end -->







  <!-- contact section start -->
  <?php require_once('templates/contact.php'); ?>
  <!-- contact section end -->

  <!-- Portfolio popup start -->
  <div class="pp portfolio-popup">
    <div class="pp-details">
      <div class="pp-details-inner">
        <div class="pp-title">
          <h1></h1>
          <h2></h2>
          <p>Category - <span class="pp-project-category"></span></p>
        </div>
        <div class="pp-project-details">
          <div class="row">
            <div class="description">
              <h3>Deskripsi</h3>
              <p></p>
            </div>
            <div class="info">
              <h3>Product Info</h3>
              <ul>
                <li>Date - <span>2020</span></li>
                <li>Client - <span>Dado</span></li>
                <li>ingredient - <span>html, css, jquery</span></li>
                <li>View Resource - <span><a href="https://www.google.com/">www.google.com</a></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="separator"></div>
 
    <div class="pp-main">
      <div class="pp-main-inner">
        <div class="pp-project-details-btn outer-shadow hover-in-shadow">Product Details <i class="fas fa-plus"></i>
        </div>
        <div class="pp-close outer-shadow hover-in-shadow">&times;</div>
        <img src="" alt="pp-img" class="pp-img outer-shadow">
        <div class="pp-counter">1 of 6</div>
      </div>
      <div class="pp-loader">
        <div></div>
      </div>
      <!-- pp navigation -->
      <div class="pp-prev"><i class="fas fa-play"></i></div>
      <div class="pp-next"><i class="fas fa-play"></i></div>
    </div>
  </div>
  <!-- Portfolio popup end -->

  <!-- style switcher start - for demo purposes only -->
  <div class="style-switcher outer-shadow">
    <div class="style-chat s-icon outer-shadow hover-in-shadow">
      <?php
        //ubah timezone menjadi jakarta
        date_default_timezone_set("Asia/Jakarta");
        $jam = date('H:i');
        if ($jam > '05:30' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:00') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }
        ?>
      <a href="https://api.whatsapp.com/send?phone=<?php echo $alamat['no_telpPerusahaan'];?><?php echo "&text=Halo....+Selamat+$salam,+Beehonest+👋+&app_absent=0"?>"
        alt="Hubungin Kami" target="_blank"><img src="assets/img/svg/whatsapp.svg"></a>
    </div>
  </div>
  <div class="style-switcher2 outer-shadow">
    <div class="style-search s-icon outer-shadow hover-in-shadow">
      <i class="fas fa-search"></i>
    </div>
    <div class="input-field inner-shadow ">
      <form action="search" method="post">
        <input type="text" placeholder="Search" name="Search" class="input-control" required />
        <button type="submit" class="btn btn-default search" aria-label="Left Align">
          <i class="fa fa-search" aria-hidden="true"> </i>
        </button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>



  <footer>
    <span>Created By <a href="#">"<?php echo $alamat['namaPerusahaan'] ?>"</a> | <span class="far fa-copyright"></span>
      2021 All rights
      reserved.</span>
  </footer>


  <?php include 'templates/navbarbottom.php'; ?>



  <!-- style switcher  end -->
  <!-- main js -->
  <script src="assets/js/main.js"></script>
  <!-- style switcher js -->
  <script src="assets/js/style-switcher2.js"></script>
</body>

</html>
