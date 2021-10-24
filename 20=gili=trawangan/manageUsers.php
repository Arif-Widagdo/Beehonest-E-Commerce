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
                  <h3>All User</h3>
                </div>
                <div class="col-md-6">
                  <a href="#adduser" data-toggle="modal" data-target="#adduser" class="btn btn-primary "
                    style="float:right;" target="_blank  ">Add User <i class="fas fa-user"></i></a>
                </div>
              </div>
              <div class="col-sm-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>User Name</th>
                      <th>Role</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        require_once '../vendor/autoload.php';
                        $allUser = new \App\classes\UserLogin();
                        $data = $allUser->allUser();
                        $i=0;
                        while ($row = mysqli_fetch_assoc($data)){ ?>
                    <tr>
                      <th scope="row"><?= ++$i?></th>
                      <td scope="row"><?= strtoupper($row['username'])?></td>
                      <th scope="row">
                        <?php
                                    if($row['role'] == 1){
                                        echo '<span class="badge badge-pill badge-primary">Admin</span>';
                                    }elseif ($row['role'] == 0){
                                        echo '<span class="badge badge-pill badge-danger">Blocked</span>';
                                    }elseif ($row['role'] == 2){
                                        echo '<span class="badge badge-pill badge-warning">Editor</span>';
                                    }elseif ($row['role'] == 3){
                                        echo '<span class="badge badge-pill badge-success">Customer</span>';
                                    }
                                    ?>
                      </th>
                      <th scope="row">
                        <?php
                                    if($row['role'] == 1){
                                        echo '<span class="badge badge-pill badge-primary">Admin</span>'; ?>
                        <a href="status.php?id=<?= $row['id']?>&manageuser&unblock" class="btn btn-sm btn-warning"
                          style="font-size:14px; width: 90px; height: 40px; line-height: 30px"><i
                            class="fa  fa-hand-o-down"></i> Demote</a>
                        <?php  }elseif ($row['role'] == 0){ ?>
                        <a href="status.php?id=<?= $row['id']?>&manageuser&unblock" class="btn btn-sm btn-success"
                          style="font-size:14px; width: 90px; height: 40px; line-height: 30px"><i
                            class="fa  fa-hand-o-up"></i> Unblock</a>
                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"
                          style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i
                            class="fa  fa-trash-o"></i> Delete</a>
                        <?php  }elseif ($row['role'] == 2){ ?>
                        <a href="status.php?id=<?= $row['id']?>&manageuser&block" class="btn btn-sm btn-danger"
                          style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i
                            class="fa  fa-hand-o-down"></i> Block</a>
                        <a href="status.php?id=<?= $row['id']?>&manageuser&admin" class="btn btn-sm btn-info"
                          style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i
                            class="fa  fa-hand-o-up"></i> Admin</a>
                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"
                          style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i
                            class="fa  fa-trash-o"></i> Delete</a>
                        <?php  }elseif ($row['role'] == 3){ ?>
                        <a href="status.php?id=<?= $row['id']?>&manageuser&block" class="btn btn-sm btn-danger"
                          style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i
                            class="fa  fa-hand-o-down"></i> Block</a>
                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"
                          style="font-size:14px; width: 80px; height: 40px; line-height: 30px"><i
                            class="fa  fa-trash-o"></i> Delete</a>

                        <?php      }
                                    ?>
                      </th>

                    </tr>
                    <?php  }   ?>
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
          <form action="insert.php" method="POST" enctype="multipart/form-data">
            <input type="text" value="tambah" name="kode" hidden>
            <input type="text" name="idUpdate" value=" " hidden>
            <div class="form-group">
              <label>Username</label>
              <input type="text" required class="form-control" id="inputEmail3" placeholder="User Name" name="user_name">
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
              <label>Confirm Password</label>
              <input type="password" required class="form-control" id="inputEmail3" placeholder="Confirm password"
                name="conpassword">
            </div>
            <div class="form-group">
              <legend class="col-form-label col-sm-3 pt-0">Role</legend>
              <div class="form-check">
                <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                <label class="form-check-label" for="gridRadios1">
                  Admin
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="2">
                <label class="form-check-label" for="gridRadios2">
                  Editor
                </label>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input name="user-btn" value="Save User" type="submit" class="btn btn-primary" >
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
