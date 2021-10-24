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
                <div class="col-md-6">
                  <h3>Data Pembayaran</h3>
                </div>

              </div>


              <?php
// Mendapatkan id_pembelian dari url
$id_pembelian = $_GET['id'];
// Mengambil data pembayaran berdasarkan id_pembelian
$ambil = $conn ->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();
?>

              <div class="col-sm-12">
              <div class="row">
  <div class="col-md-6">
    <table class="table">
      <tr>
        <th>Nama</th>
        <td><?= $detail['nama']; ?></td>
      </tr>
      <tr>
        <th>Bank</th>
        <td><?= $detail['bank']; ?></td>
      </tr>
      <tr>
        <th>Jumlah</th>
        <td>Rp. <?= number_format($detail['jumlah']); ?>,-</td>
      </tr>
      <tr>
        <th>Tanggal</th>
        <td><?= $detail['tanggal']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-md-6">
    <img src="../uploads/bukti_pembayaran/<?= $detail['bukti']; ?>" alt="" class="img-responsive">
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <form action="" method="post">
      <div class="form-group">
        <Label>No Resi Pengiriman</Label>
        <input type="text" class="form-control" name="resi">
      </div>
      <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
          <option value="">Pilih Status</option>
          <option value="lunas">Lunas</option>
          <option value="barang dikirim">Barang Dikirim</option>
          <option value="batal">Batal</option>
        </select>
      </div>
      <button class="btn btn-success" name="proses">Proses</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['proses'])){
  $resi = $_POST['resi'];
  $status = $_POST['status'];
  $conn->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

  echo "<script>alert('Data pembelian terupdate');</script>";
  echo "<script>location='index.php?halaman=pembelian';</script>";
}

?>





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
