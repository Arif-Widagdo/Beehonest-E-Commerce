<?php
session_start();
include '20=gili=trawangan/Api/koneksi.php';


$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

// jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka diarahkan ke riwayat (karena tidak berhak melihat nota orang lain)
// Pelanggan yang beli harus pelanggan yang login
// Mendapatkan id_pelanggan yang beli
$idpelangganyangbeli = $detail['id_pelanggan'];

// Mendapatkan id_pelanggan yang login
$idpelangganyanglogin = $_SESSION['pelanggan']['id_pelanggan'];

if($idpelangganyangbeli != $idpelangganyanglogin){
  echo "<script>alert('Akses ditolak!');</script>";
  echo "<script>location='riwayat';</script>";
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

    

    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>

    <?php include 'templates/topbar.php'; ?>


    <!-- contact section start -->
    <section class="nota-section section" id="contact">
        <div class="container">
            <div class="row">
                <div class="section-title-nota">
                    <h2 data-heading="">Nota Pembelian<i class="fas fa-shopping-nota"></i></h2>
                </div>
            </div>
            <div class="row info-nota">
                <div class="Info outer-shadow">
                    <h3>Pembelian</h3>
                  <ul>
                      <li>
                        No. Pembelian: <span><?= $detail['id_pembelian']; ?></span>
                      </li>
                      <li>
                      Tanggal: <span><?= date("d M Y", strtotime($detail['tanggal_pembelian'])); ?></span>
                      </li>
                      <li>
                      Total: <span>Rp. <?= number_format($detail['total_pembelian']); ?>,-</span>
                      </li>
                  </ul>
                    
                </div>
                <div class="Info outer-shadow">
                    <h3>Pelanggan</h3>
                    <ul>
                        <li>
                         <?= $detail["nama_pelanggan"]; ?>
                        </li>
                        <li>
                        <?= $detail["telepon_pelanggan"]; ?>
                        </li>
                        <li>
                        <?= $detail["email_pelanggan"]; ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nota-info">
                <div class="table-container">
                    <table border="15px" class="tbl-info">
                        <thead>
                            <tr>
                                <th scope="col" class="column-primary" data-header="List Nota"><span>No</span></th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Berat</th>
                                <th scope="col">Total Harga</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>

                            <!-- Menampilkan data pembelian_produk -->
                            <?php $ambil = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()): ?>
                            <tr>
                                <td data-header="no" class="title"><?= $no++; ?></td>
                                <td data-header="Nama Produk"><?= $pecah["nama"]; ?></td>
                                <td data-header="Harga">Rp. <?= number_format($pecah["harga"]); ?>,-</td>
                                <td data-header="Berat"><?= $pecah["berat"]; ?> gram</td>
                                <td data-header="Jumlah Produk"><?= $pecah["jumlah"]; ?></td>
                                <td data-header="Total Berat"><?= $pecah["subberat"]; ?> gram
                                </td>
                                <td data-header="Total Harga">Rp.<?= number_format($pecah["subharga"]); ?>,-</td>


                            </tr>
                            <?php $no++; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row info">
                <p>Silahkan melakukan pembayaran sebesar Rp. <?= number_format($detail['total_pembelian']); ?>,- ke salah satu bank dibawah ini: <br></p>
                
               
                <ul>
                <?php 
                $marketplace=mysqli_query($conn,"SELECT * from metodepembayaran");
                    while($infoMetode=mysqli_fetch_array($marketplace)){
                    ?>
                    <li class="outer-shadow">
                      <h3><?php echo $infoMetode['metode'];?></h3>
                      <span><img src="20=gili=trawangan/fileUpload/logo<?php echo $infoMetode['logo']; ?>">
                      </span>
                      <p>Nomor Rekening : <?php echo $infoMetode['norek'];?></p>
                      <p>Atas Nama : <?php echo $infoMetode['an'];?></p>
                    </a>
                  </li>
                    <?php
                      }
                      ?>
                  </ul>
                  </div>
                  <div class="row btn">
                  <?php $ambil = $conn->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'"); ?>
                            <?php while($pecah = $ambil->fetch_assoc()): ?>
                 <a href="pembayaran.php?id=<?php echo $_GET['id'];?>" class="btn-1 outer-shadow hover-in-shadow">
                 Konfirmasi Pembayaran</a>
                 <?php endwhile; ?>
          
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