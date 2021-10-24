<?php
session_start();
include '20=gili=trawangan/Api/koneksi.php';


if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
  echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
  echo "<script>location='home';</script>";
}

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
  <section class="cart-section section" id="contact">
    <div class="container">
      <div class="row">
        <div class="section-title">
          <h2 data-heading="- Enjoy your adjust -">Cart Menu <i class="fas fa-shopping-cart" ></i></h2>
        </div>
      </div>
      <div class="cart-info">
         
      <div class="table-container">
      <table border="15px" class="tbl-info">
  <thead>
	<tr>
		<th scope="col" class="column-primary" data-header="Shopping List"><span>No</span></th>
		<th scope="col">Produk</th>
		<th scope="col">Harga</th>
		<th scope="col">Jumlah</th>
    <th scope="col">Total Harga</th>
		<th scope="col" class="column-primary" >Opsi</th>
    
	</tr>
</thead>
<tbody>
<?php $no=1; ?>
        <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
        <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
        <?php
        $ambil = $conn->query("SELECT * FROM produk WHERE idproduk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        
        $subharga = $pecah['hargaafter'] * $jumlah;
        // echo "<pre>";
        // print_r($pecah);
        // echo "</pre>";
        ?>
	<tr>
		<td data-header="no" class="title"><?= $no++; ?></td>
		<td data-header="Nama Produk" ><?= $pecah['namaproduk']; ?></td>
		<td data-header="Harga" >Rp. <?= number_format($pecah['hargaafter']);?></td>
		<td data-header="Jumlah" >
    <form action="updatecart?id=<?= $id_produk; ?>" method="post">
    <input type="number" name="jumlah" class="form-control inner-shadow" height="100px" value="<?php echo $jumlah ?>" \>
  </td>
    <td data-header="Total Harga" >Rp. <?= number_format($subharga);?>,-</td>
		<th scope="row">
			<div class="toolbox" >
        <div class="btn-updateKeranjang">
      <i class="fas fa-edit"></i><input type="submit" name="update"  value="Update" \>
      </div>
    </form>
				<a class="remove" href="hapuscart?id=<?= $id_produk; ?>" class="remove"><i class="fas fa-trash"> Hapus</i></a>
			</div>
		</th>
	</tr>
  <?php endforeach; ?>
</tbody>
	</table>
</div>
      <div class="row btn">
          <a href="home#product" class="btn-1 outer-shadow hover-in-shadow"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            Continue Shopping</a>
          <a href="checkout" class="link-item btn-1 outer-shadow hover-in-shadow">Chekout Now <i
              class="fa fa-arrow-right" aria-hidden="true"></i></a>
              </div>
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
    <span>Created By <a href="#">"<?php echo $alamat['namaPerusahaan'] ?>"</a> | <span class="far fa-copyright"></span>
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
