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
                   <h3>Tambah Kategori Produk</h3>
                </div>
                
              </div>
 <div class="col-md-9 col-sm-9 ">
                <form method="POST" action="insert.php">
                  <input type="text" name="kodeT" value="tambah" hidden>
                  <input type="text" name="idUpdate" value=" " hidden>

                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Category Name</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" required class="form-control" id="inputEmail3" placeholder="Category Name" name="category_name">
                      <label>Contoh Format : madu-hutan</label>
                    </div>

                  </div>
                   <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
                    <div class="col-md-6 col-sm-6 ">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                          <label class="form-check-label" for="gridRadios1">Active</label>
                            </div>
                             <br>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                                 <label class="form-check-label" for="gridRadios2">Inactive</label>
                                    </div>
                    </div>
                    
                  </div>
                  <br>
                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <button type="submit" name="cat-btn" class="btn btn-info">Tambah</button>

                    </div>
                  </div>

                </form>


              </div>
              

              <div class="col-sm-12">
                
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <th>No</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Admin</th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    <?php
                        require_once '../vendor/autoload.php';
                        $allCat = new \App\classes\Category();
                        $data = $allCat->showAllCategory();
                        $i=0;
                        while ($row = mysqli_fetch_assoc($data)){ ?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                                <td scope="row"><?= strtoupper($row['category_name'])?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                                <td><?= $row['admin_name']?></td>
                                <td class="text-center">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <a href="status.php?id=<?= $row['id']?>&managecat&inactive" class="btn btn-sm btn-success" style="font-size:14px; width: 100px; height: 40px; line-height: 30px"><i class="fa  fa-hand-o-down"></i> Inactive</a>
                                    <?php  }else{ ?>
                                        <a href="status.php?id=<?= $row['id']?>&managecat&active" class="btn btn-sm btn-warning" style="font-size:14px; width: 100px; height: 40px; line-height: 30px"><i class="fa  fa-hand-o-up"></i> Active</a>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="delete.php?id=<?= $row['id']?>&managecat" style="font-size:14px; width: 100px; height: 40px; line-height: 30px" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i> Delete</a>
                                </td>
                            </tr>
                        <?php  }   ?>

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
use App\classes\Category;
$allData = Category::showAllCategory();
while ($row = mysqli_fetch_assoc($allData)){ ?>
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label for="cat"><b>Category Name</b></label>
                            <input  type="text" class="form-control" value="<?= $row['category_name']?>" name="catName">
                        </div>
                        <input type="hidden" value="<?= $row['id']?>" name="id">
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-block btn-success" name="update-cat">
                        </div>
                    </form>
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
