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
                                    <h3>Tambah Marketplace</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="#myModal" data-toggle="modal" data-target="#myModal"
                                    class="btn btn-primary " style="float:right;" target="_blank  ">Add <i
                                    class="fas fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h2>List Produk</h2>
                                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            
                                            <th>Nama Marketplace</th>
                                            <th>Logo Marketplace</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $result = mysqli_query($conn,"SELECT * FROM marketplace");
                                        $no=1;
                                        while($infoMarketplace=mysqli_fetch_array($result)){
                                            ?>

                                            <tr>
                                                <td><?php echo $no++;?></td>
                                               
                                                <td><?php echo $infoMarketplace['namamarketplace'];?></td>
                                                <td><img src="fileUpload/logo<?php echo $infoMarketplace['gambarmarketplace']; ?>"
                                                    width="120px" height="50px"></td>
                                                    <td><a href="editMarketplace.php?idUpdate=<?php echo $infoMarketplace['idmarketplace'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i> Edit</a>
                    <a href="action/crud/crudMarketplace.php?id=<?php echo $infoMarketplace['idmarketplace'];?>" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a> 
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
                        <h4 class="modal-title">Tambah Marketplace</h4>
                    </div>
                    <div class="modal-body">
                        <form action="action/crud/crudMarketplace.php" method="POST" enctype="multipart/form-data">
                            <div class="control-group after-add-more">
                                <input type="text" value="tambah" name="kode" hidden>
                                <input type="text" name="idUpdate" value=" " hidden>
                                <div class="form-group">
                                    <label>Nama Marketplace</label>
                                    <input name="namamarketplace" type="text" class="form-control" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Logo Market place</label>
                                    <input name="gambar" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="col-md-6">
                                    <button class="btn btn-success add-more" type="button">
                                        <i class="glyphicon glyphicon-plus"></i> Add
                                    </button>    
                                </div>
                                <button type="button" class="btn batal btn-default" data-dismiss="modal">Batal</button>
                                <input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
                            </div>
                        </div>
                    </form>
                    <!-- class hide membuat form disembunyikan  -->
                    <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                    <div class="copy hide" hidden>

                        <div class="control-group">
                            <br>
                            <hr>
                            <div class="form-group">
                                <label>Nama Marketplace</label>
                                <input name="namamarketplace" type="text" class="form-control" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Logo Market place</label>
                                <input name="gambar" type="file" class="form-control">
                            </div>
                            
                            <button class="btn btn-danger remove" type="button"><i
                                class="fas fa-trash"></i> Remove</button>
                            </div>






                        </div>
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
