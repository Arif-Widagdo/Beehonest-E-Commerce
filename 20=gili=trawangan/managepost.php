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
                  <h3>All Post Blog</h3>
                </div>
                <div class="col-md-6">
                    <a href="addpost.php" class="btn btn-primary " style="float:right;" target="_blank  ">Add Post <i class="fas fa-plus"></i></a>
                </div>
              </div>

              

              <div class="col-sm-12">
                
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th >Image</th>
                            <th >Admin</th>
                            <th >Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <?php
                        require_once '../vendor/autoload.php';
                        $allCat = new \App\classes\Post();
                        $data = $allCat->showAllPost();
                        $i=0;
                        while ($row = mysqli_fetch_assoc($data)){ ?>
                            <tr>
                                <td scope="row"><?= ++$i?></td>
                                <td><?= substr($row['title'],0,40)?></td>
                                <td><?= $row['category_name']?></td>
                                <td><img style="width: 50px" src="../uploads/<?= $row['image']?>" alt=""></td>
                                <td><?= $row['admin']?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&inactive" class="btn btn-sm btn-success" style="font-size:14px; width: 90px; height: 40px; line-height: 30px"><i class="fa  fa-hand-o-down"></i> Inactive</a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&active" class="btn btn-sm btn-warning"style="font-size:14px; width: 90px; height: 40px; line-height: 30px"><i class="fa  fa-hand-o-up"></i> Active</a>
                                    <?php } ?>
                                    <?php
                                    if($row['rate'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&makedown" class="btn btn-sm btn-dark" style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i class="fa  fa-hand-o-down"></i> Down</a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managepost&maketop" class="btn btn-sm btn-secondary"style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i class="fa  fa-hand-o-up"></i> Top</a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#id<?= $row['id']?>"style="font-size:14px; width: 70px; height: 40px; line-height: 30px"><i class="fa fa-eye"></i> View</a>
                                    <a href="updatepost.php?id=<?= $row['id']?>&updatepost" class="btn btn-sm btn-info"style="font-size:14px; width: 70px; height: 40px; line-height: 30px"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                    <a href="delete.php?id=<?= $row['id']?>&managepost" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')" style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                            <?php } ?>

                  </table>

                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br/>       
        </div>
        <!-- End = isi konten -->
        <!--  -->
      </div>
    </div>




               
<?php
use App\classes\Post;
$allData = Post::showAllPost();
while ($row = mysqli_fetch_assoc($allData)){ ?>

    <!-- VIEW POST Modal -->
<div class="modal fade " id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="overflow: hidden">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Title : <?= $row['title']?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover" style="overflow:hidden;">
                        <tr>
                            <th>Category</th>
                            <td><?= strtoupper($row['category_name'])?></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                        </tr>
                        <tr>
                            <th>Admin</th>
                            <td><?= ucwords($row['admin'])?></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><?= $row['date']?></td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td><?= $row['tag']?></td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td><?= $row['content']?></td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td class="text-center"><img width="200px" src="../uploads/<?= $row['image']?>" alt=""></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php
    \App\classes\Session::unsetSession('uptxt');
    \App\classes\Session::unsetSession('dltTxt');
?>

    <script type="text/javascript">
      $(document).ready(function () {
        $("button.edit_data").click(function () {
          var myModal = $('#editModal');
            // now get the values from the table
            var idkategori = $(this).closest('tr').html();
            var namakategori = $(this).closest('tr').html();
            var tgldibuat = $(this).closest('tr').html();
            document.getElementById('idkategori').value = idkategori;
            document.getElementById('namakategori').value = nama_pasien;
            document.getElementById('tgldibuat').value = keluhan;
          });
      });
    </script>








<!-- Start = Footer -->
<?php require_once('footer.php'); ?>
<!-- End = Isi Footer -->
</body>
</html>
