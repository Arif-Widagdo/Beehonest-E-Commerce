<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
   //koneksi
 require_once ('Api/koneksi.php');
   //header
 require_once('header.php'); ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <!-- Start = Sidebar -->
      <?php 
      //sidebar
      require_once('sidebar.php');
      //navbar atas
      require_once('topNavigation.php');
      ?>


      <!-- Start = isi konten -->
      <div class="right_col" role="main">
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">

              <div class="row x_title">
              <div class="col-md-4">
		<h3>Pembelian</h3>
        <?php
$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

?>
		tanggal : <?= $detail["tanggal_pembelian"]; ?><br>
		total : Rp.<?= number_format($detail["total_pembelian"]); ?>,- <br>
		Status : <?= $detail['status_pembelian']; ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?= $detail["nama_pelanggan"]; ?></strong><br>
		<?= $detail["telepon_pelanggan"]; ?><br>
		<?= $detail["email_pelanggan"]; ?>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<strong><?= $detail['tipe']; ?> <?= $detail['distrik']; ?> <?= $detail['provinsi']; ?></strong><br>
		Ongkos kirim: Rp. <?= number_format($detail['ongkir']); ?>,-<br>
		Ekspedisi: <?= $detail['ekspedisi']; ?> <?= $detail['paket']; ?> <?= $detail['estimasi']; ?><br>
		Alamat: <?= $detail['alamat_pengiriman']; ?>
	</div>

              </div>



              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr> 
	</thead>
    <tbody>

<?php $no=1; ?>
<!-- menggabungkan (join) tabel produk dengan tabel pembelian_produk -->
<?php $ambil = $conn->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.idproduk WHERE pembelian_produk.id_pembelian = '$_GET[id]'"); ?>
<?php while($pecah = $ambil->fetch_assoc()): ?>
<tr>
    <td><?= $no; ?>.</td>
    <td><?= $pecah["namaproduk"]; ?></td>
    <td>Rp. <?= number_format($pecah["hargaafter"]); ?>,-</td>
    <td><?= $pecah["jumlah"]; ?></td>
    <td>Rp. <?= number_format($pecah["jumlah"]*$pecah["hargaafter"]); ?>,-</td>
</tr>
<?php $no++; ?>
<?php endwhile; ?>

</tbody>
                </table>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <br />
      </div>
      <!-- End = isi konten -->
      <!--  -->
    </div>
  </div>


  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>

</html>
