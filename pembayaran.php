<?php
session_start();
//koneksi ke database
include '20=gili=trawangan/Api/koneksi.php';


// Jika tidak ada session pelanggan (belum login)
if(!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login';</script>";
	exit();
}

// Mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $conn->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detpem);
// print_r($_SESSION);
// echo "</pre>";

// Mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detpem['id_pelanggan'];
// Mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION['pelanggan']['id_pelanggan'];

if($id_pelanggan_beli != $id_pelanggan_login){
  echo "<script>alert('Akses ditolak!');</script>";
	echo "<script>location='riwayat';</script>";
	exit();
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
	<section class="input-pembayaran-section section" id="contact">
		<div class="container">
			<div class="row">
				<div class="section-title">
					<h2 data-heading="">Konfirmasi Pembayaran</h2>
				</div>
			</div>
      
			<div class="input-pembayaran-info">
				<div class="input-container">
        <form action="" method="post" enctype="multipart/form-data">
             <label for="" style="margin-left:15px">Nama Penyetor</label>
             <div class="input-group outer-shadow hover-in-shadow">
             <input type="text" class="form-control" name="nama" required="">
              </div>
              <label for="" style="margin-left:15px">Bank Tujuan</label>
            <div class="input-group outer-shadow hover-in-shadow">
            <select name="bank" class="form-control" >
             <option selected>--Pilih Bank Tujuan--</option>
             <?php
             $det=mysqli_query($conn,"select * from metodepembayaran order by metode ASC")or die(mysqli_error());
             while($d=mysqli_fetch_array($det)){
               ?>
               <option name="bank" value="<?php echo $d['metode'] ?>"><?php echo $d['metode'] ?></option>
               <?php
             }
             ?>		
           </select>
              </div>
              <label for="" style="margin-left:15px">Jumlah</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <input type="number" class="form-control" name="jumlah" min="1" required>
              </div>
              <label for="" style="margin-left:15px">Bukti Foto</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <input required type="file" class="form-control" name="bukti" required>
              <p class="text-danger">foto bukti harus JPG maksimal 2 MB</p>
              </div>
              
              <div class="submit-btn">
              <button type="submit" name="kirim" class="btn-1 outer-shadow hover-in-shadow">Kirim</button>
            </div>
          </form>

				</div>
        <div class="pesanan outer-shadow">
          <h5>PESANAN</h5>
          <div class="column-inner inner-shadow ">
          <table class="tbl-info">
                        <thead>
                           
                        </thead>
                        <tbody>
                            <?php $no=1; ?>

                            <!-- Menampilkan data pembelian_produk -->
                            <?php $ambil = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()): ?>
                            <tr>
                                <td data-header="Nama Produk"><?= $pecah["nama"]; ?></td>
                                <td data-header="Harga">Rp. <?= number_format($pecah["harga"]); ?>,-</td>
                                <td data-header="Berat"><?= $pecah["berat"]; ?> gram</td>
                                <td data-header="Jumlah Produk"><?= $pecah["jumlah"]; ?></td>
                                <td data-header="Total Berat"><?= $pecah["subberat"]; ?> gram
                                </td>
                                <td data-header="Total Harga">Rp.<?= number_format($pecah["subharga"]); ?>,- <hr></td>
                                
                            </tr>
                           
                            <?php $no++; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>

          <div class="alert alert-info"> 
            <h2>total tagihan Sebesar</h2> 
            <H1>IDR <?= number_format($detpem['total_pembelian']); ?>,- </H1>
          </div>
          <p>(termasuk ongkir)</p>
          </div>
          </div>
          
			</div>
      
		</div>
		</div>
	</section>
	<!-- contact section end -->
<?php
 // Jika tombol kirim di pencet
 if(isset($_POST['kirim'])){
  // Upload dulu foto bukti
  $namabukti = $_FILES['bukti']['name'];
  $lokasibukti = $_FILES['bukti']['tmp_name'];
  $namafiks = date('YmdHis').$namabukti;
  move_uploaded_file($lokasibukti, "uploads/bukti_pembayaran/$namafiks");

  $nama = $_POST['nama'];
  $bank = $_POST['bank'];
  $jumlah = $_POST['jumlah'];
  $tanggal = date('Y-m-d');

  // Insert ke tabel pembayaran
  $conn->query("INSERT INTO pembayaran(id_pembelian, nama, bank, jumlah, tanggal, bukti) VALUES('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

  // Update data pembelian dari pending menjadi sudah kirim pembayaran
  $conn->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

  echo "<script>alert('Terima kasih sudah melakukan pembayaran');</script>";
  echo "<script>location='riwayat';</script>";
}
?>




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