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
                            <?php
                            $semuadata = [];
                            $tgl_mulai = "-";
                            $tgl_selesai = "-";
                            if(isset($_POST['kirim'])){
                            $tgl_mulai = $_POST['tglm'];
                            $tgl_selesai = $_POST['tgls'];

                            $ambil = $conn->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
                            while($pecah = $ambil->fetch_assoc()){
                                $semuadata[] = $pecah;
                            }

                            // echo "<pre>";
                            // print_r($semuadata);
                            // echo "</pre>";

                            }


                            ?>
                            <div class="row x_title">
                                <div class="col-md-12">
                                    <h3>Laporan Pembelian dari <?= $tgl_mulai; ?> hingga <?= $tgl_selesai; ?></h3>
                                </div>
                            </div>



                            <div class="col-md-12 col-sm-12 col-sm-12">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Tanggal Mulai</label>
                                                <input type="date" class="form-control" name="tglm"
                                                    value="<?= $tgl_mulai; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="">Tanggal Selesai</label>
                                                <input type="date" class="form-control" name="tgls"
                                                    value="<?= $tgl_selesai; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">&nbsp;</label><br>
                                            <button class="btn btn-primary" name="kirim">Lihat</button>
                                        </div>
                                    </div>
                                </form>

                                <table id="example1" class="table table-bordered table-striped"
                                    style="text-align: center;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total=0; ?>
                                        <?php foreach($semuadata as $key => $value): ?>
                                        <?php $total += $value['total_pembelian']; ?>
                                        <tr>
                                            <td><?= $key+1; ?>.</td>
                                            <td><?= $value['nama_pelanggan']; ?></td>
                                            <td><?= $value['tanggal_pembelian']; ?></td>
                                            <td>Rp. <?= number_format($value['total_pembelian']); ?>,-</td>
                                            <td><?= $value['status_pembelian']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">Total</th>
                                            <th>Rp. <?= number_format($total); ?>,-</th>
                                        </tr>
                                    </tfoot>
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
