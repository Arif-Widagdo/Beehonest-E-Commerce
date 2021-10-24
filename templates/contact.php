<?php
require_once 'vendor/autoload.php';
use App\classes\Session;
if (isset($_POST['msg-btn'])) {
    $ob = new \App\classes\Mail();
    $ob->sendMail($_POST);
}
?>

<!-- contact section start -->
<section class="contact-section section" id="contact">
  <div class="container">
    <div class="row">
      <div class="contact-col">
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


      <script>
        function initialize() {
          var propertiPeta = {
            center: new google.maps.LatLng(-6.1753924, 106.8249641),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
          // even listner ketika peta diklik
          google.maps.event.addListener(peta, 'click', function (event) {
            taruhMarker(this, event.latLng);
          });
        }
        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
      </script>

      <div class="contact-col-inner">
        <h4>Our Location</h4>
        <div class="contact-item-inner outer-shadow">
          <div id="googleMap" style="width:100%;height:380px;"></div>
        </div>
      </div>
      
      <div class="row contact-form">
         <h4>Get in Touch</h4>
      <div class="contact-form">
      <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
          <div class="row">
            <div class="w-50">
              <div class="input-group outer-shadow hover-in-shadow">
                <input type="text" placeholder="Name" name="name" class="input-control">
              </div>
              <div class="input-group outer-shadow hover-in-shadow">
                <input type="email" placeholder="Email" name="email" class="input-control">
              </div>
              <div class="input-group outer-shadow hover-in-shadow">
                <input type="number" placeholder="phone" name="phone" class="input-control">
              </div>
            </div>
            <div class="w-50">
            <div class="input-group outer-shadow hover-in-shadow">
                <input type="text" placeholder="Subject"  name="subject" class="input-control">
              </div>
              <div class="input-group outer-shadow hover-in-shadow">
                <textarea class="input-control"  name="message" placeholder="Message"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="submit-btn">
              <button type="submit" name="msg-btn" class="btn-1 outer-shadow hover-in-shadow">Send Massage</button>
            </div>
          </div>
        </form>
      </div>
      </div>

    </div>
</section>
<!-- contact section end -->













<!-- contact section start -->
<section class="footer-section section" id="footer">
  <div class="container">
    <div class="row">
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
          <!-- <li><a href="">returns</a></li> -->
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