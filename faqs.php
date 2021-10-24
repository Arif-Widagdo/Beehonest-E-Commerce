<?php
session_start();
include '20=gili=trawangan/Api/koneksi.php';



?>

<!-- Author : Arif Widagdo -->
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <!-- main css -->
  <?php include 'templates/head.php'; ?>
  <title>BeeHonest</title>
  
  
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


  <!-- contact section start -->
  <section class="faqs-section section" id="contact">
    <div class="container">
      <div class="row">
        <div class="section-title">
          <h2>Frequently Asked Questions <span>(FAQs)</span> <i class="fas fa-question-circle" ></i></h2>
        </div>
      </div>
      <div class="row align-items-center">
      <?php 
      $result = mysqli_query($conn,"SELECT * FROM faqs");
      while($infoFaqs=mysqli_fetch_array($result)){
      ?>
        <div class="acordion">
            <div class="icon"></div>
          <h5><?php echo $infoFaqs['judul_pertanyaan'];?></h2>
        </div>
        <div class="panel">
            <p><?php echo $infoFaqs['deskripsi_pertanyaan'];?></p>
        </div>
      </div>
      <?php }
      ?>
     
    
    </div>
  </section>
  <!-- contact section end -->





  <!-- contact section start -->
  <?php require_once('templates/contact.php'); ?>
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
  <script src="assets/js/main-product.js"></script>
  <script src="assets/js/main-acordion.js"></script>
  <!-- style switcher js -->
  <script src="assets/js/style-switcher2.js"></script>
</body>

</html>
