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
                            <div class="col-md-4">
                           
                                <img src="../uploads/<?= $userData['image']?>" class="img-circle profile_img"
                                    style=" margin:auto; text-align:center;">
                            </div>
                        </div>
                    </div>
                    <!-- Row2 -->
                    <div class="col-md-12 col-sm-12 ">
                        <div class="dashboard_graph">
                            <div class="col-md-4">
                                <div class="card">
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
                                <br>
                                <div class="card">
                                    <div class="profile_info">
                                        <ul class="nav nav-pills nav-stacked">
                                            <li class="active nav-item"><a class="nav-link btn-light" href="profile.php"
                                                    style="width:170px; border:1px solid;"> <i class="fa fa-user"></i>
                                                    Profile</a></li>
                                            <li class="active nav-item"><a></a></li>
                                            <li class="nav-item"><a class="nav-link btn-light"
                                                    style="width:170px; border:1px solid;" href="editprofile.php"> <i
                                                        class="fa fa-edit"></i> Edit profile</a></li>
                                            <li class="active nav-item"><a></a></li>
                                            <li class="nav-item"><a class="nav-link btn-primary"
                                                    style="width:170px; border:1px solid;" href="changepassword.php"> <i
                                                        class="fa fa-edit"></i> Change Password</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body" style="border:none; padding: 22px; ">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Name</b></label>
                                            <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" id="f-name" placeholder=" " value="<?= $userData['fname']," ", $userData['lname'] ?>" name="fname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b>Email</b></label>
                                            <div class="col-sm-9">
                                            <input readonly type="text" name="email" class="form-control" id="email" placeholder=" " value="<?= $userData['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b>Username</b></label>
                                            <div class="col-sm-9">
                                            <input readonly type="text" class="form-control" id="mobile" name="username" placeholder=" " value="<?= $userData['username'] ?>">
                                            </div>
                                        </div>
                                        <form class="form-horizontal" role="form" action="action/crud/change-password.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b>Current Password</b></label>
                                            <div class="col-sm-9">
                                            <input  type="password" class="form-control" id="mobile" name="password_lama" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b>New Password</b></label>
                                            <div class="col-sm-9">
                                            <input  type="password" class="form-control" id="mobile" name="password_baru" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b>Confirm Password</b></label>
                                            <div class="col-sm-9">
                                            <input  type="password" class="form-control" id="mobile" name="konf_password" >
                                            </div>
                                        </div>
                                        <input hidden type="text" class="form-control" id="f-name" placeholder=" " value="<?= $userData['id']?>" name="userId">
                                        <br>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b></b></label>
                                            <div class="col-sm-9">
                                            <input type="submit" class="btn btn-success" name="submit-change-password" value="Save"></input>
                                            </div>
                                        </div>



                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>















                    <!-- End Row2 -->
                </div>
                <br />
            </div>
            <!-- End = isi konten -->
        </div>
    </div>
    <!-- Start = Footer -->
    <?php require_once('footer.php'); ?>
    <!-- End = Isi Footer -->
</body>

</html>
