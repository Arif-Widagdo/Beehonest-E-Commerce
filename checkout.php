<?php
session_start();
include '20=gili=trawangan/Api/koneksi.php';

// Jika tidak ada session pelanggan (belum login)
if(!isset($_SESSION["pelanggan"])){
  // Diarahkan ke ke login.php
  echo "<script>alert('Silahkan login!')</script>";
  echo "<script>location='login';</script>";
}

if(!isset($_SESSION["keranjang"])){
  // Diarahkan ke ke index.php
  echo "<script>alert('Keranjang kosong!')</script>";
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

  
  <script src="assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>

  <link rel="stylesheet" href="assets/select2-4.0.6-rc.1/dist/css/select2.min.css">

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
  <section class="checkout-section section" id="contact">
    <div class="container">
      <div class="row">
        <div class="section-title">
          <h2 data-heading="">Check Out</h2>
        </div>
      </div>
      <div class="checkout-info">

        <div class="table-container">
          <table border="15px" class="tbl-info">
            <thead>
              <tr>
                <th scope="col" class="column-primary" data-header="Shopping List"><span>No</span></th>
                <th scope="col">Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total Harga</th>


              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php $totalberat = 0; ?>
              <?php $totalbelanja = 0; ?>
              <?php foreach($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
              <!-- Menampilkan produk yang sedang duperulangkan berdasarkan id_produk -->
              <?php
        $ambil = $conn->query("SELECT * FROM produk WHERE idproduk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        $subharga = $pecah['hargaafter'] * $jumlah;
        // Subberat diperoleh dari berat produk x jumlah
        $subberat = $pecah['berat'] * $jumlah;
        $totalberat+=$subberat;

        // echo "<pre>";
        // print_r($pecah);
        // echo "</pre>";
  ?>
              <tr>
                <td data-header="no" class="title"><?= $no++; ?></td>
                <td data-header="Nama Produk"><?= $pecah['namaproduk']; ?></td>
                <td data-header="Harga">Rp. <?= number_format($pecah['hargaafter']); ?>,-</td>
                <td data-header="Jumlah"><?= $jumlah; ?></td>
                <td data-header="Total Harga">Rp. <?= number_format($subharga); ?>,-</td>
              </tr>
              <?php $totalbelanja += $subharga; ?>
              <?php endforeach; ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="5">Total Belanja Rp. <?= number_format($totalbelanja); ?>,-</th>
              </tr>
            </tfoot>
          </table>
        </div>
                <!-- Field Kirim -->
        <div class="row ">
        <div class="filed-cekOngkir">
          <div class="row">
            <div class="w-50 ongkir">
              <div class="section-title-ongkir">
                <h2 data-heading="asd">Ongkos Kirim</h2>
              </div>
              <br>
            <table border="2px" style="text-align:left; height:30%">
            <tr>
              <th style="font-size:16px;" >Provinsi</th>
              <td><input readonly type="text" name="provinsi" style="background:none; color:#ffffff;"></td>
            </tr>
            <tr>
              <th style="font-size:16px;">Kota</th>
              <td><input readonly type="text" name="distrik"  style="background:none; color:#ffffff;"></td>
              </tr>
            <tr>  
              <th style="font-size:16px;" >Nama Ekspedisi</th>
              <td><input readonly type="text" name="ekspedisi"  style="background:none; color:#ffffff;"></td>
            </tr>
            <tr>  
              <th style="font-size:16px;" >Paket Ekspedisi</th>
              <td><input readonly type="text" name="paket"  style="background:none; color:#ffffff;"></td>
            </tr>
            <tr>  
              <th style="font-size:16px;" >Berat Barang</th>
              <td><input readonly type="text" value="<?php echo $totalberat; ?> gram" style="background:none; color:#ffffff;"></td>
            </tr>
            <tr>  
              <th style="font-size:16px;" >Estimasi</th>
              <td><input readonly type="text" name="estimasi"  style="background:none; color:#ffffff;"></td>
            </tr>
            <tr>  
              <th style="font-size:16px;" >Ongkir</th>
              <td><input readonly type="text" name="ongkir"  style="background:none; color:#ffffff;"></td>
            </tr>
            <tfoot>
              <tr>
                <th colspan="2"><h5 style="color:#ffff; font-size:14px; text-align:center;">Noted : Paket akan dikirim dari<span style="color:var(--skin-color); font-weight:700; font-size:14px"> Kota Banjarnegara, Provinsi Jawa Tengah</span></h5>
              </tr>
            </tfoot>
          </table>
          
             
          </div>
           <!-- End Cek Ongkir -->
           <!-- Start Field -->
          <div class="w-50 input-alamat">
          <div class="section-title-ongkir">
                <h2 data-heading="">Masukan Alamat</h2>
              </div>
            <form action="" method="post">
             <label for="" style="margin-left:15px">Nama Lengkap</label>
             <div class="input-group outer-shadow hover-in-shadow">
             <input class="input-control" type="text" readonly value="<?= $_SESSION['pelanggan']['nama_pelanggan']; ?>" class="form-control">
              </div>
              <label for="" style="margin-left:15px">Nomor Telephone</label>
              <div class="input-group outer-shadow hover-in-shadow">
             <input class="input-control" type="text" readonly value="<?= $_SESSION['pelanggan']['telepon_pelanggan']; ?>" class="form-control">
              </div>
              <label for="" style="margin-left:15px">Alamat Pengiriman</label>
              <div class="input-group outer-shadow hover-in-shadow">
             <textarea class="input-control" type="text" name="alamat_pengiriman" class="form-control"></textarea>
              </div>
              <label for="" style="margin-left:15px">Provinsi</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <select name="nama_provinsi" id="" class="input-control">
            </select>
              </div>
              <label for="" style="margin-left:15px">Kabupaten</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <select name="nama_distrik" id="" class="input-control"></select>
              </div>
              <label for="" style="margin-left:15px">Nama Ekspedisi</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <select name="nama_ekspedisi" id="" class="input-control"></select>
              </div>
              <label for="" style="margin-left:15px">Paket Ekspedisi</label>
              <div class="input-group outer-shadow hover-in-shadow">
              <select name="nama_paket" id="" class="input-control"></select>
              </div>


              <input type="text" name="total_berat" value="<?= $totalberat; ?>" hidden >
              <input type="text" name="provinsi" hidden>
              <input type="text" name="distrik" hidden>
              <input type="text" name="tipe" hidden>
              <input type="text" name="kodepos" hidden>
              <input type="text" name="ekspedisi" hidden>
              <input type="text" name="paket" hidden>
              <input type="text" name="ongkir" hidden>
              <input type="text" name="estimasi" hidden>
              <div class="submit-btn">
              <button type="submit" name="checkout" class="btn-1 outer-shadow hover-in-shadow">Chek Out</button>
            </div>
          </form>

          <?php
    if(isset($_POST["checkout"])){
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $tanggal_pembelian = date('Y-m-d');
      $alamat_pengiriman = $_POST['alamat_pengiriman'];
    
      $totalberat = $_POST['total_berat'];
      $provinsi = $_POST['provinsi'];
      $distrik = $_POST['distrik'];
      $tipe = $_POST['tipe'];
      $kodepos = $_POST['kodepos'];
      $ekspedisi = $_POST['ekspedisi'];
      $paket = $_POST['paket'];
      $ongkir = $_POST['ongkir'];
      $estimasi = $_POST['estimasi'];
    
      $total_pembelian = $totalbelanja + $ongkir;
    
      // Menyimpan data ke tabel pembelian
      $conn->query("INSERT INTO pembelian(id_pelanggan, tanggal_pembelian, total_pembelian, alamat_pengiriman, totalberat, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi) VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamat_pengiriman', '$totalberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$ekspedisi', '$paket', '$ongkir', '$estimasi')");

      // Mendapatkan id_pembelian yang baru terjadi
      $id_pemebelian_barusan = $conn->insert_id;

      foreach($_SESSION["keranjang"] as $id_produk => $jumlah){

        // Mendapatkan data produk berdasarkan id_produk
        $ambil = $conn->query("SELECT * FROM produk WHERE idproduk='$id_produk'");
        $perproduk = $ambil->fetch_assoc();
        
        $nama = $perproduk['namaproduk'];
        $harga = $perproduk['hargaafter'];
        $berat = $perproduk['berat'];
        $subberat = $perproduk['berat']*$jumlah;
        $subharga = $perproduk['hargaafter']*$jumlah;

        $conn->query("INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES('$id_pemebelian_barusan', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')");

        // Update stok
        $conn->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE idproduk='$id_produk'");
      }

      // Mengosongkan keranjang belanja
      unset($_SESSION["keranjang"]);

      // Tampilan dialihkan ke halaman nota dari pembelian barusan
      echo "<script>alert('Pembelian sukses');</script>";
      echo "<script>location='nota?id=$id_pemebelian_barusan';</script>";
    }
    ?>
          </div>
         <!-- End Field -->
        </div>
      </div>
      <!-- end Chekout field Row -->



<!-- End field Kirim -->
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
  <script src="assets/js/app-input-alamat.js"></script>
  <script src="assets/js/main-product.js"></script>
  <!-- style switcher js -->
  <script src="assets/js/style-switcher2.js"></script>
</body>

</html>