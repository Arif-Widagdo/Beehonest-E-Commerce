<?php
session_start();
//koneksi ke database
include '20=gili=trawangan/Api/koneksi.php';

if(isset($_POST['updateprofile'])){

}


?>

<!-- Author : Arif Widagdo -->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8">
	<!-- main css -->
	<?php include 'templates/head.php'; ?>
	<title>Details Pembayaran</title>


</head>

<body>
	<?php require_once('20=gili=trawangan/Api/koneksi.php'); ?>

	

	<div class="scroll-up-btn">
		<i class="fas fa-angle-up"></i>
	</div>

	<?php include 'templates/topbar.php'; ?>


	<!-- contact section start -->
    <section class="profile-section section active" id="home">
    

    <!-- Home Content 1 -->
    
    <div class="mySlides fade">
      <div class="container">
        <div class="row ">
        <div class="section-title justify-content-center">
          <h2 data-heading="E D I T">My Profile</h2>
        </div>
        <div class="profile-img">
            <div class="img-box inner-shadow">
            <?php
            $nama_pelanggan = $_SESSION['nama_pelanggan'];
            $query = mysqli_query($conn,"SELECT * FROM pelanggan WHERE nama_pelanggan = '$nama_pelanggan' ");
            while ($info_pelanggan=mysqli_fetch_array($query)) {
            ?>
            <img src="<?php 

            if (!$info_pelanggan['gambar_profile']){
                echo(" assets/img/admin.png");
            }else
		echo $info_pelanggan['gambar_profile']; ?>" class="outer-shadow"
                alt="Profile-user">
            </div>
            <div class="row button-setting-acount">
              <div class="button-item ">
              <a href="profile" class="btn-1 outer-shadow hover-in-shadow "><i class="fas fa-user-alt"></i> Profile</a>
              </div>
              <div class="button-item ">
              <a class="btn-1 active outer-shadow"><i class="fas fa-user-edit"></i> Edit Profile</a>
              </div>
              <div class="button-item ">
              <a href="changepassword" class="btn-1 outer-shadow hover-in-shadow"><i class="fas fa-key"></i> Change Password</a>
              </div>
              </div>
          </div>
          <div class="profile-text">
         
          <form action="updateprofile" method="POST" enctype="multipart/form-data" >
          <label for="" style="margin-left:15px">Bio</label>
          <div class="input-group-textarea outer-shadow hover-in-shadow ">
          <textarea class="input-control-bio"  type="text" name="bio" class="form-control"><?php echo $info_pelanggan['bio']; ?></textarea>
         
        </div>
        <label for="" style="margin-left:15px">Nama Lengkap</label>
        <div class="input-group outer-shadow ">
        <input class="input-control" type="text" readonly name="nama_pelanggan" value="<?php echo $info_pelanggan['nama_pelanggan']; ?>" >
        </div>
        <label for="" style="margin-left:15px">Email</label>
              <div class="input-group outer-shadow ">
              <input class="input-control" type="text" name="email" readonly value="<?php echo $info_pelanggan['email_pelanggan']; ?>" class="form-control">
        </div>
         
        <label for="" style="margin-left:15px">Nomor Telepon</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <input class="input-control" type="number" name="telepon_pelanggan" value="<?php echo $info_pelanggan['telepon_pelanggan']; ?>" class="form-control">
        </div>
        
        <label for="" style="margin-left:15px">Alamat</label>
              <div class="input-group-textarea outer-shadow hover-in-shadow">
             <textarea class="input-control-alamat"  type="text" name="alamat_pelanggan" class="form-control"><?php echo $info_pelanggan['alamat_pelanggan']; ?></textarea>
              </div>
              <label for="" style="margin-left:15px">Gambar</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <input name="gambar" type="file" class="form-control">
              </div>
       
         

        
              <input class="input-control" type="hidden" name="id_pelanggan" value="<?php echo $info_pelanggan['id_pelanggan']; ?>" class="form-control">
              <div class="submit-btn">
              <button type="submit" name="updateprofile" class="btn-1 outer-shadow hover-in-shadow">Submit</button>
            </div>
              </form>
              
          </div>
          <?php
            }
            ?>
  
      
          <div class="row align-items-center">
           
          </div>
        </div>
      </div>
    </div>
    <!-- End Home Content 1 -->


   
   
  </section>
  <!-- home section end -->


	<!-- contact section end -->





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
						<li><a href="home#home">Home</a></li>
						<li><a href="home#about">About</a></li>
						<li><a href="home#products">Products</a></li>
						<li><a href="blog">Resources</a></li>
					</ul>
				</div>

				<div class="footer-col">
					<h4>get help</h4>
					<ul>
						<li><a href="faqs">FAQ</a></li>
						<li><a href="riwayat">order status</a></li>

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
		<span>Created By <a href="#">"<?php echo $alamat['namaPerusahaan'] ?>"</a> | <span
				class="far fa-copyright"></span>
			2021 All rights
			reserved.</span>
	</footer>

	<?php include 'templates/navbarbottom.php'; ?>

	<!-- style switcher  end -->
	<!-- main js -->
	<script src="assets/js/main-product.js"></script>
	<!-- style switcher js -->
	<script src="assets/js/style-switcher2.js"></script>
</body>

</html>