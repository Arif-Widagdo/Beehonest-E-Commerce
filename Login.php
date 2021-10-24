<?php
//koneksi ke database
include '20=gili=trawangan/Api/koneksi.php';

// Jika tombol daftar ditekan
if(isset($_POST['daftar'])){
  // Mengambil isian nama, email, password, alamat, telepon
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  

  // Cek apakah email sudah digunakan atau belum
  $ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
  $yangcocok = $ambil->num_rows;
  if($yangcocok == 1){
    echo "<script>alert('Pendaftaran gagal, email sudah digunakan!');</script>;";
    echo "<meta http-equiv='refresh' content='1;url=login'>";
   
  }
  else{
    // Insert ke tabel pelanggan
    $conn->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email', '$password', '$nama_pelanggan', '$telepon', '$alamat')");
    echo "<script>alert('Pendaftaran sukses, Silahkan login');</script>;";
    echo "<meta http-equiv='refresh' content='1;url=login'>";

    $_SESSION['log'] = "Masukan Bio Data Anda";
  }

}

?>




<!-- Author : Arif Widagdo -->
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link rel="shortcut icon" href="assets/img/svg/logo.png">
  <title>Login | Regis</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- main css -->
  <link rel="stylesheet" type="text/css" href="assets/css/style-loginRegis.css">
  <!-- skin colors -->
  <link rel="stylesheet" type="text/css" href="assets/css/skins/color-1.css">
  <!-- style switcher color -->
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-1" href="assets/css/skins/color-1.css">
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-2" href="assets/css/skins/color-2.css"
    disabled>
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-3" href="assets/css/skins/color-3.css"
    disabled>
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-4" href="assets/css/skins/color-4.css"
    disabled>
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-5" href="assets/css/skins/color-5.css"
    disabled>
  <link rel="stylesheet" type="text/css" href="assets/css/style-switcher.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- J-query -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</head>

<body>
<div class="preloader">
    <div class="box">
      <div></div><div></div><div></div>
    </div>
  </div>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup" id="sigin">

        <!--sign-in-form -->
        <form action="log" class="sign-in-form" method="post">
          <h2 class="title">Sign in</h2>
       
          <div class="input-field outer-shadow hover-in-shadow">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="email" class="input-control" required />
          </div>
          <div class="input-field outer-shadow hover-in-shadow">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" class="input-control" required />
          </div>
          <div class="submit-btn">
            <button type="submit" name="login-btn" class="btn-1 outer-shadow hover-in-shadow">LogIn</button>
          </div>
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="https://facebook.com" class="social-icon">
              <!-- <i class="fab fa-facebook-f"></i> -->
            </a>
            <a href="https://twitter.com" class="social-icon">
              <!-- <i class="fab fa-twitter"></i> -->
            </a>
            <a href="https://google.com" class="social-icon">
              <!-- <i class="fab fa-google"></i> -->
            </a>
            <a href="https://linkedin.com" class="social-icon">
              <!-- <i class="fab fa-linkedin-in"></i> -->
            </a>
          </div>
        </form>
        <!-- End sign-in-form -->

        <!-- sign-up-form -->
        <form action="" class="sign-up-form" method="post">
          <h2 class="title" >Sign up</h2>
          <div class="row">
            <div class="w-50">
              <div class="input-field outer-shadow hover-in-shadow">
                <i class="fas fa-user"></i>
                <input type="text" name="nama_pelanggan" placeholder="Name" class="input-control" required />
              </div>
              <div class="input-field outer-shadow hover-in-shadow">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" class="input-control" required />
              </div>
              <div class="input-field outer-shadow hover-in-shadow">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required />
              </div>
            </div>
            <div class="w-50">
              <div class="input-field outer-shadow hover-in-shadow">
                <i class="fas fa-phone"></i>
                <input type="text" name="telepon" placeholder="Telephone" class="input-control" required
                  maxlength="13" />
              </div>
              <div class="input-field textarea outer-shadow hover-in-shadow">
                <i class="fas fa-map-marker-alt"></i>
                <textarea name="alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
              </div>
            </div>
          </div>
          <div class="submit-btn">
            <button type="submit" name="daftar" class="btn-1 outer-shadow hover-in-shadow">Sign Up</button>
          </div>
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="https://facebook.com" class="social-icon">
              <!-- <i class="fab fa-facebook-f"></i> -->
            </a>
            <a href="https://twitter.com" class="social-icon">
              <!-- <i class="fab fa-twitter"></i> -->
            </a>
            <a href="https://google.com" class="social-icon">
              <!-- <i class="fab fa-google"></i> -->
            </a>
            <a href="https://linkedin.com" class="social-icon">
              <!-- <i class="fab fa-linkedin-in"></i> -->
            </a>
          </div>
        </form>
        <!-- End sign-up-form -->
      </div>
    </div>
    <div class="BackHome">
          <a href="home" class="btn-1 outer-shadow-yellow hover-in-shadow-yellow"><i class="fas fa-arrow-circle-up"></i><span> </span>Back To Home </a>
        </div>

    <div class="panels-container">
      <div class="panel left-panel" >
      
        <div class="content">
        
          <h3>New here ?</h3>
          <p>
          Not Registered Yet? Hurry Up and Register and Enjoy Attractive Discounts at BeeHonest.idn
          </p>
          <div class="submit-btn">
            <button type="submit" id="sign-up-btn" class="btn-1 outer-shadow-yellow hover-in-shadow-yellow">Sign
              Up</button>
          </div>

        </div>
        <img src="assets/img/svg/honey-bottle.png" class="image" alt="" />

      </div>
      <div class="panel right-panel">
        <div class="content">
       
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <div class="submit-btn">
            <button type="submit" id="sign-in-btn" class="btn-1 outer-shadow-yellow hover-in-shadow-yellow">Sign
              In</button>
          </div>

        </div>
        <img src="assets/img/svg/beehive.png" class="image" alt="" />
      </div>
    </div>
  </div>

  <!-- style loginRegis js -->
  <script src="assets/js/main-login-regis.js"></script>
</body>

</html>
