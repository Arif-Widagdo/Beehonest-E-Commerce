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
                  <h3>Data Pelanggan</h3>
                </div>
                <div class="col-md-6">
                  <a href="#adduser" data-toggle="modal" data-target="#adduser" class="btn btn-primary "
                    style="float:right;" target="_blank  ">Add Pelanggan <i class="fas fa-user"></i></a>
                </div>
              </div>
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
		<tr>
		<th>No</th>
		<th>Nama Pelanggan</th>
		<th>Email</th>
		<th>No Telepon</th>
		<th>aksi</th>
		</tr> 
	</thead>
	<tbody>

		<?php $no=1; ?>
		<?php $ambil = $conn->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()): ?>
		<tr>
			<td><?= $no; ?></td>
			<td><?= $pecah["nama_pelanggan"]; ?></td>
			<td><?= $pecah["email_pelanggan"]; ?></td>
			<td><?= $pecah["telepon_pelanggan"]; ?></td>
			<td>
      <a href="action/crud/crudPelanggan.php?id=<?php echo $pecah['id_pelanggan'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a></td>
	
			</td>
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



  <!-- modal input -->
  <div id="adduser" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Produk</h4>
        </div>

        <div class="modal-body">
          <form action="action/crud/crudPelanggan.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="tambah" name="kode" hidden>
            <input type="text" name="idUpdate" value=" " hidden>
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <input type="text" required class="form-control" id="inputEmail3" placeholder="User Name" name="nama_pelanggan">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" required class="form-control" id="inputEmail3" placeholder="Email" name="email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" required class="form-control" id="inputEmail3" placeholder="password"
                name="password">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea type="text" required class="form-control" id="inputEmail3" placeholder="Alamat"
                name="alamat"></textarea>
            </div>
            <div class="form-group">
              <label>Nomo Telepon</label>
              <input type="number" required class="form-control" id="inputEmail3" placeholder="Nomor Telepon"
                name="telepon">
            </div>
          
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input name="tambah" value="Save User" type="submit" class="btn btn-primary" >
        </div>
        </form>
      </div>
    </div>
  </div>






  <!-- Start = Footer -->
  <?php require_once('footer.php'); ?>
  <!-- End = Isi Footer -->
</body>

</html>
