<html>
<head>
	<title></title>
  <?php
  require_once ('Api/koneksi.php');
  ?>
</head>
<body>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="index.php" class="site_title"> <span>Dashboard Admin</span></a>
      <a href="" class="site_date"><span><script type='text/javascript'>
					
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						
						</script></span></a>
    </div>
    <div class="clearfix"></div>
    <!-- start = profile admin -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="assets/images/admin.png" class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Selamat Datang,</span>
          <h2><?php
              $username = $_SESSION['username'];
              $query = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username' ");
              while ($Nama_Lengkap=mysqli_fetch_array($query)) {
                  echo $Nama_Lengkap['fname'];
              }
              ?>
          </h2>
        </div>
      </div>
      <br />
      <!-- end = profile admin -->

    <!-- start = side menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
        <?php
        $role = $_SESSION['role'];
          $row=mysqli_fetch_array(mysqli_query($conn,"SELECT * from users  where role=$role "));  
          
           if($row['role'] == 1){
              echo '

            <li><a ><i class="fas fa-home"></i> Site Identity <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="kelolaContentHome.php">Kelola Content</a></li>
                  <li><a href="manageAddress.php">Kelola Alamat</a></li>
                  <li><a href="managefaqs.php">FAQs</a></li>
              </ul>
            </li>
             <li> <a>  <i class="fas fa-store"></i> Toko<span class="fa fa-chevron-down"></span>  </a>
              <ul class="nav child_menu">
                <li><a href="manageCategory.php"> Kelola Kategori</a></li>
                <li><a href="kelolaMarketplace.php"> Kelola Marketplace</a></li>
                <li><a href="manageProductContent.php"> Kelola Produk</a></li>
                <li><a href="managemetodePembayaran.php"> Kelola Metode Pembayaran</a></li>
              </ul>
             </li>
             <li><a><i class="fas fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="pembelian.php" > Data Pembelian</a></li>
                <li><a href="laporan_pembelian.php" > Laporan Pembelian</a></li>
              </ul>
            </li>
             <li><a><i class="fas fa-blog"></i> Blog <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="managepost.php" > Post</a></li>
              </ul>
            </li>
            <li><a><i class="fas fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="manageUsers.php" > Kelola Admin</a></li>
                <li><a href="managePelanggan.php" > Kelola Pelanggan</a></li>
              </ul>
            </li>
            <li><a><i class="fas fa-mail-bulk"></i> Mail <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="inbox.php" > Inbox</a></li>
                <li><a href="sentmail.php" > Sent Mail</a></li>
                <li><a href="trash.php" > Trash</a></li>
              </ul>
            </li>
            
            <li><a><i class="fas fa-key"></i> API <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="#" > API</a></li>
              </ul>
            </li>'; 
          }elseif ($row['role'] == 2){
              echo '
            <li><a ><i class="fas fa-home"></i> Site Identity <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                  <li><a href="kelolaContentHome.php">Kelola Content</a></li>
                  <li><a href="manageAddress.php">Kelola Alamat</a></li>
                  <li><a href="managefaqs.php">FAQs</a></li>
              </ul>
            </li>
             <li> <a>  <i class="fas fa-store"></i> Toko<span class="fa fa-chevron-down"></span>  </a>
              <ul class="nav child_menu">
                <li><a href="manageCategory.php"> Kelola Kategori</a></li>
                <li><a href="kelolaMarketplace.php"> Kelola Marketplace</a></li>
                <li><a href="manageProductContent.php"> Kelola Produk</a></li>
                <li><a href="managemetodePembayaran.php"> Kelola Metode Pembayaran</a></li>
              </ul>
             </li>
             <li><a><i class="fas fa-shopping-cart"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="pembelian.php" > Data Pembelian</a></li>
                <li><a href="laporan_pembelian.php" > Laporan Pembelian</a></li>
              </ul>
            </li>
             <li><a><i class="fas fa-blog"></i> Blog <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="managepost.php" > Post</a></li>
              </ul>
            </li>
            <li><a><i class="fas fa-mail-bulk"></i> Mail <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="inbox.php" > Inbox</a></li>
                <li><a href="sentmail.php" > Sent Mail</a></li>
                <li><a href="trash.php" > Trash</a></li>
              </ul>
            </li>';
          } 
        ?>
        </ul>
      </div>
    </div>
    <!-- end = side menu -->

  </div>
</div>
</body>
</html>