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
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                            <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Subject</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
        <?php
        $res = Mail::showAllMail();
        $i=0;
        while ($row = mysqli_fetch_assoc($res)){ ?>
        <tr  <?= $row['status'] == 2 ? 'class="unread"' : '' ?>>
            <td class="inbox-small-cells">
               <span style="<?= $row['status'] == 2 ? 'color:green' : 'color:red' ?>"><?= ++$i ?></span>
            </td>
            <td class="view-message  dont-show"><?= substr($row['subject'],0,15) ?></td>    
            <td class="view-message  text-right"><?= $row['date'] ?></td>
            <td class="view-message  ">
                <?php
                if($row['status'] != 2){ ?>
                    <a href="status.php?id=<?= $row['id'] ?>&seen&inbox-body" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> mark it's been read</a>
               <?php } ?>

                <a href="" class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#ex<?= $row['id'] ?>" ><i class="fa fa-edit"></i> View</a>
                <a href="status.php?id=<?= $row['id'] ?>&trash&inbox-body" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Trash</a>
            </td>
        </tr>
        <?php } ?>
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
        </div>
    </div>


    <?php
$res = Mail::showAllMail();
while ($row = mysqli_fetch_assoc($res)) {
?>

    <div class="modal fade" id="ex<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subject : <?= $row['subject'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php

                ?>
                <div class="modal-body">
                    Date : <?= $row['date'] ?> <br> <br>
                    Name : <?= $row['name'] ?> <br> <br>
                    Email : <?= $row['email'] ?> <br> <br>
                    Telephone : <?= $row['phone'] ?> <br> <br>
                    Message : <?= $row['message'] ?> <br> <br>
                    
                </div>
            </div>
        </div>
    </div>


<?php
}
?>





   
    <!-- Start = Footer -->
    <?php require_once('footer.php'); ?>
    <!-- End = Isi Footer -->
</body>

</html>
