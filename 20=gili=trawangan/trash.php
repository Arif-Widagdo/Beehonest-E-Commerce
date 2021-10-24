<?php 
require_once '../vendor/autoload.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
use App\classes\Mail;
?>

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
                                    <div class="profile_pic">
                                        <img src="assets/images/admin.png" class="img-circle profile_img">
                                    </div>
                                    <div class="profile_info">
                                        <h2>
                                            <?php
                                            $username = $_SESSION['username'];
                                            $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' ");
                                            while ($Nama_Lengkap=mysqli_fetch_array($query)) {
                                            echo '<h4>',$Nama_Lengkap['fname'],'</h4>';
                                            echo '<a>',$Nama_Lengkap['email'],'</a>';
                                            }
                                            ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="col-md-8" >
                                    <div class="profile_info">
                                        <a data-toggle="modal" href="#myModal"  class="btn btn-primary "
                                            style="float:right;">Compose</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                            <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th >Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <?php
                            require_once '../vendor/autoload.php';
                            $allCat = new \App\classes\Mail();
                            $data = $allCat->showTrashMail();
                            $i=0;
                            while ($row = mysqli_fetch_assoc($data)){ ?>
                                <tr>
                                    <td scope="row"><?= ++$i?></td>
                                    <td><?= $row['name']?></td>
                                    <td><?= $row['subject']?></td>
                                    <td><?= $row['email']?></td>
                                    <td>
                                        <a href="delete.php?id=<?= $row['id']?>&trashpage" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <br />
            </div>
            <!-- End = isi konten -->
        </div>
    </div>













    <!-- Modal Compose -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Compose</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">To</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputEmail1" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Cc / Bcc</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="cc" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Subject</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputPassword1" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 control-label">Message</label>
                            <div class="col-lg-10">
                                <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-send">Send</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

















    <!-- Start = Footer -->
    <?php require_once('footer.php'); ?>
    <!-- End = Isi Footer -->
</body>

</html>
