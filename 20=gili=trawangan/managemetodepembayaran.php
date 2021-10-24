<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
   //koneksi
    require_once ('Api/koneksi.php');
   //header
    require_once('header.php'); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
                                    <h3>Metode Pembayaran</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="#myModal" data-toggle="modal" data-target="#myModal"
                                    class="btn btn-primary " style="float:right;" target="_blank  ">Add <i
                                    class="fas fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h2>List Metode Pembayaran</h2>
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                    <thead>
                                        <tr>
                                        <th>No.</th>
										<th>Nama Metode</th>
										<th>No.Rek</th>
										<th>Atas Nama</th>
										<th>URL Logo</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php 
											$brgs=mysqli_query($conn,"SELECT * from metodepembayaran order by id ASC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
												$no = $p['id'];
												?>

                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $p['metode'] ?></td>
                                                <td><?php echo $p['norek'] ?></td>
												<td><?php echo $p['an'] ?></td>
												
                                                <td><img src="fileUpload/logo<?php echo $p['logo']; ?>"
                                                    width="120px" ></td>
                                                    <td><a href="editmetodepembayaran.php?idUpdate=<?php echo $p['id'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <a href="action/crud/crudmetodepembayaran.php?id=<?php echo $p['id'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a> 
                                                    </td>




                                                </tr>
                                                <?php
                                            }
                                            ?>
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
        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Metode Pembayaran</h4>
                    </div>
                    <div class="modal-body">
                        <form action="action/crud/crudmetodepembayaran.php" method="POST" enctype="multipart/form-data">
                            <div class="control-group after-add-more">
                                <input type="text" value="tambah" name="kode" hidden>
                                <input type="text" name="idUpdate" value=" " hidden>
                                <div class="form-group">
                                    <label>Nama Metode Pembayaran</label>
                                    <input name="metode" type="text" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                    <input name="norek" type="text" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input name="an" type="text" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Logo Metode Pembayaran</label>
                                    <input name="gambar" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn batal btn-default" data-dismiss="modal">Batal</button>
                                <input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                        </div>
                    </form>
                    <!-- class hide membuat form disembunyikan  -->
                    <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                
                    </div>
                </div>
            </div>



            <script type="text/javascript">
                $(document).ready(function () {
                    $(".add-more").click(function () {
                        var html = $(".copy").html();
                        $(".after-add-more").after(html);
                    });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function () {
                $(this).parents(".control-group").remove();
            });
        });
    </script>






    <!-- Start = Footer -->
    <?php require_once('footer.php'); ?>
    <!-- End = Isi Footer -->
</body>

</html>
