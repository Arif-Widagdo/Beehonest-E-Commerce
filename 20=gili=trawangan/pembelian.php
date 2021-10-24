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
                  <h3>Data Pembelian</h3>
                </div>

              </div>



              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pelanggan</th>
                      <th>Tanggal Pembelian</th>
                      <th>Status Pembelian</th>
                      <th>Total</th>
                      <th>aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    <!-- menggabungkan (join) tabel pelanggan dengan tabel pelanggan -->
                    <?php $ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan ORDER BY tanggal_pembelian DESC"); ?>
                    <?php while($pecah = $ambil->fetch_assoc()): ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $pecah["nama_pelanggan"];?></td>
                      <td><?= date("d F Y", strtotime($pecah["tanggal_pembelian"])); ?></td>
                      <td><?= $pecah["status_pembelian"]; ?></td>
                      <td>Rp. <?= number_format($pecah["total_pembelian"]); ?>,-</td>
                      <td class="text-center">

                        <a href="detailpembelian.php?halaman=detail&id=<?= $pecah["id_pembelian"];?>" class="btn btn-sm btn-info"
                          style="font-size:14px; width: 100px; height: 40px; line-height: 30px"><i class="fas fa-list"></i> Detail</a>

                        <?php if($pecah['status_pembelian'] != 'pending'): ?>
                        <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>"
                          class="btn btn-sm btn-success"style="font-size:14px; width: 120px; height: 40px; line-height: 30px"><i class="fas fa-coins"></i> Pembayaran</a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php $no++; ?>
                    <?php endwhile; ?>
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
