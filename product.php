<?php
session_start();
include '20=gili=trawangan/Api/koneksi.php';

$idproduk = $_GET['idproduk'];?>

<!-- Author : Arif Widagdo -->
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/img/svg/logo.png">
  <title>BeeHonest</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- main css -->
  <link rel="stylesheet" type="text/css" href="assets/css/style-product.css">
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="assets/css/screen-responsive.css">
  <link rel="stylesheet" type="text/css" href="assets/css/screen-responsive-product.css">
  <!-- skin colors -->
  <link rel="stylesheet" type="text/css" href="assets/css/skins/color-1.css">
  <!-- style switcher color -->
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-1" href="assets/css/skins/color-1.css">

  <link rel="stylesheet" type="text/css" href="assets/css/style-switch.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- J-query -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>
  <?php require_once('20=gili=trawangan/Api/koneksi.php'); ?>

  <div class="preloader">
    <div class="box">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
  </div>

  <?php include 'templates/topbar.php'; ?>


   <?php 
		$p = mysqli_fetch_array(mysqli_query($conn,"Select * from produk where idproduk='$idproduk'"));
    $brgs2=mysqli_fetch_array(mysqli_query($conn,"SELECT * from gambarproduk where idproduk=$idproduk ")); 
    $infoGambarSub = isset($brgs2['gambar1']);
    ?>
  <!-- About section start -->
  <section class="single-product-section section" id="about">
    <div class="container">
      <div class="row">
        <div class="about-img">
          <div class="subimg-box inner-shadow">
            <a id="btn" href="javascript:doSomething();"> <img src="<?php echo str_replace("../../","20=gili=trawangan/",$p['gambar'])?>" class="outer-shadow" alt="Personal"></a>
            <a id="btn2" href="javascript:doSomething();"> <img  src="
            <?php if (!$infoGambarSub){
                    echo("20=gili=trawangan/produk/subProduk/no_image2.jpg");
                  }else
                    echo str_replace("../../","20=gili=trawangan/",$brgs2['gambar1']);
                  ?>" class="outer-shadow" alt="Personal"></a>
          </div>
          <div class="img-box inner-shadow">
            <img id="image" src="<?php echo str_replace("../../","20=gili=trawangan/",$p['gambar'])?>" class="outer-shadow" alt="Personal">
          </div>
          <script>
            function doSomething() {
              document.getElementById('btn').onclick = function change_image() {
              document.getElementById("image").src ="<?php echo str_replace("../../","20=gili=trawangan/",$p['gambar'])?>";
              }
              document.getElementById('btn2').onclick = function change_image() {
              document.getElementById("image").src = "<?php  
                        if (!$infoGambarSub){
                            echo("20=gili=trawangan/produk/subProduk/no_image2.jpg");
                        }else
                            echo str_replace("../../","20=gili=trawangan/",$brgs2['gambar1']);
                        ?>";
              }
            }
          </script>

        </div>

        <div class="about-info">
          <h1><?php
								$bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
								$rate = $p['rate'];
								
								for($n=1;$n<=$rate;$n++){
								echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
								};
								?></h1>
          <div class="title"><?php echo $p['namaproduk'] ?></div>
          <p><?php echo $p['deskripsi'] ?></p>
          <div class="harga">
                  <div class="harga-diskon">
                    <p>IDR <?php echo number_format($p['hargaafter'],2,',','.')?></p>
                  </div>
                  <div class="harga-awal">
                    <p>IDR <?php echo number_format($p['hargabefore'],2,',','.')?></p>
                  </div>
                </div>
                <div class="button-chekout-continue">
                <div class="pp-product-order-btn outer-shadow hover-in-shadow"><a href="home#products"><i class="fas fa-arrow-left"></i> Continue Shopping</a></div>
                <div class="pp-product-order-btn outer-shadow hover-in-shadow"><a href="cart">Continue Chek out <i class="fas fa-arrow-right"></i></a></div>
                </div>    
        </div>
      </div>
        <!-- Links Marketplace -->
        <div class="row">  
      <div class="marketplace">
      
          <div class="section-title">
              <h2 data-heading="Purchase">On the Marketplace</h2>
          </div>
            <ul>
            <?php 
              $marketplace=mysqli_query($conn,"SELECT * from marketplace");
                while($infoProduk=mysqli_fetch_array($marketplace)){
                $idmarketplace = $infoProduk['idmarketplace'];
                $p3 = mysqli_fetch_array(mysqli_query($conn,"Select * from linksmarketplace where idmarketplace='$idmarketplace' && idproduk=$idproduk"));
                ?>
                    <li >
                      <a  onClick="alert('Browse Marketplace Link')" href="<?php if(!$p3){
                            echo "#";
                          }else 
                          echo $p3['linkmarket'];?> "><?php echo $infoProduk['namamarketplace'];?>
                      <span><img class="outer-shadow hover-in-shadow"  src="20=gili=trawangan/fileUpload/logo<?php echo $infoProduk['gambarmarketplace']; ?>">
                      </span>
                    </a>
                  </li>
                    <?php
                      }
                      ?>
                  </ul>
          </div>
      

        <!-- Links Marketplace -->
      </div>
    </div>
  </section>
  <!-- About section end -->







  <!-- contact section start -->
  <section class="footer-section section" id="footer">
    <div class="container">
      <div class="row">

        <div class="footer-col">
          <h4>Contact Us</h4>
          <div class="contact">
            <?php 
                        $alamat=mysqli_fetch_array(mysqli_query($conn,"SELECT * from alamat "));  
                        ?>
            <div class="icons">
              <div class="row">
                <i class="fas fa-user"></i>
                <div class="info">
                  <div class="head">Company</div>
                  <div class="sub-title"><?php echo $alamat['namaPerusahaan'] ?></div>
                </div>
              </div>

              <div class="row">
                <i class="fas fa-map-marker-alt"></i>
                <div class="info">
                  <div class="head">Address</div>
                  <div class="sub-title"><?php echo $alamat['alamatPerusahaan'] ?></div>
                </div>
              </div>

              <div class="row">
                <i class="fas fa-envelope"></i>
                <div class="info">
                  <div class="head">Email</div>
                  <div class="sub-title"><?php echo $alamat['email'] ?></div>
                </div>
              </div>

            </div>
          </div>
        </div>


        <div class="footer-col">
          <h4>Menu</h4>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="">Resources</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>get help</h4>
          <ul>
            <li><a href="">FAQ</a></li>
            <li><a href="">shipping</a></li>
            <li><a href="">returns</a></li>
            <li><a href="">order status</a></li>
            <li><a href="">payment options</a></li>
          </ul>
        </div>


        <div class="footer-col">
          <h4>Follow us</h4>

          <div class="social-links">
            <a href="<?php echo $alamat['fb'];?>" class="facebook outer-shadow hover-in-shadow">
              <i class="fab fa-facebook-f"></i></a>
            <a href="<?php echo $alamat['ig'];?>" class="instagram outer-shadow hover-in-shadow">
              <i class="fab fa-instagram instagram"></i><span></span></a>
            <a href="<?php echo $alamat['twitter'];?>" class="twitter outer-shadow hover-in-shadow">
              <i class="fab fa-twitter"></i></a>
            <a href="<?php echo $alamat['linkedin'];?>" class="linkedin outer-shadow hover-in-shadow">
              <i class="fab fa-linkedin"></i></a>
          </div>

        </div>

      </div>
    </div>
  </section>
  <!-- contact section end -->







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
      <input type="text" placeholder="Search" class="input-control" required />
      <i class="fas fa-search"></i>
    </div>
  </div>




  <footer>
    <span>Created By <a href="#">"<?php echo $alamat['namaPerusahaan'] ?>"</a> | <span class="far fa-copyright"></span>
      2021 All rights
      reserved.</span>
  </footer>


  <!-- style switcher  end -->
  <!-- main js -->
  <script src="assets/js/main-product.js"></script>
  <!-- style switcher js -->
  <script src="assets/js/style-switcher2.js"></script>
</body>

</html>
