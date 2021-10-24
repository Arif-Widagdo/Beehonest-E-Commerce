<?php
require_once 'vendor/autoload.php';
use App\classes\Post;
use App\classes\Site;
$ob = Site::display();
$siteData = mysqli_fetch_assoc($ob);
#$post = Post::showActivelPost();
$populer = Post::showPopulerlPost();
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
$title = '';
if($page == 'login'){
    $title = 'Home';
}
elseif ($page == 'contact'){
    $title = 'Contact';
}
require_once('20=gili=trawangan/Api/koneksi.php'); 
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
   
    <title>Resources - Beehonest</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/svg/logo.png">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/main-blog2.css">

    <!-- script
    ================================================== -->
    <script src="assets/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="assets/site.webmanifest">
<!-- Font Awesome -->
 <link href="assets/css/font-awesome.css" rel="stylesheet">
 <!-- Skin Color -->
   <link rel="stylesheet" type="text/css" href="assets/css/skins/color-1.css">
</head>
<body>
   <?php require_once('templates/preeloader.php'); ?>
 <header class="s-header">
            <div class="header__top">
                <div class="header__logo">
                    <a class="site-logo" href="home">
                        <img src="assets/img/svg/logo.png" alt="ImageLogo">
                        Bee<span>Honest</span>
                    </a>
                </div>
                <div class="header__search">
                    <form role="search" method="get" class="header__search-form" action="#">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="header__search-field" placeholder="Type Keywords" value="" name="search" title="Search for:"  name="search" autocomplete="off">
                        </label>
                        <button  type="submit" style="cursor: pointer;" class="btn-search hover-in-shadow " name="search-btn" value="Search">Search</button>
                    </form>
                    <a href="#0" title="Close Search" class="header__search-close">Close</a>
                </div>  <!-- end header__search -->
                <!-- toggles -->
                  <a href="#0" class="header__search-trigger"></a>
                  <a href="#0" class="header__menu-toggle"><span>Menu</span></a>
                </div>     
            <nav class="header__nav-wrap">
                <ul class="header__nav">
                    <li><a href="home" title="">Home</a></li>
                     <li><a href="home#about" title="">About</a></li>
                     <li class=" current"><a href="blog" title="">resources</a></li>
                    <li class="has-children">
                        
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                            <?php
                    use App\classes\Category;
                    $categories = Category::activeCategories();
                    while ($row2 = mysqli_fetch_assoc($categories)){
                    ?>
                           <li><a href="blog?id=<?= $row2['id']?>&catwisepost"><?= $row2['category_name'] ?></a></li>
                             <?php } ?>
                        
                        </ul>
                    </li>
                    
                    <li><a href="styles.html" title="">Shop</a></li>
                </ul> <!-- end header__nav -->
                    <?php 
                        $alamat=mysqli_fetch_array(mysqli_query($conn,"SELECT * from alamat "));  
                        ?>
                <ul class="header__social ">
                    <li class="ss-facebook outer-shadow hover-in-shadow">
                        <a href="<?php echo $alamat['fb'];?>">
                            <span class="screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li class="ss-twitter outer-shadow hover-in-shadow">
                        <a href="<?php echo $alamat['twitter'];?>">
                            <span class="screen-reader-text ">Twitter</span>
                        </a>
                    </li>
                    <li class="ss-instagram outer-shadow hover-in-shadow">
                        <a href="<?php echo $alamat['ig'];?>">
                            <span class="screen-reader-text">Instagram</span>
                        </a>
                    </li>
                    <li class="ss-linkedin outer-shadow hover-in-shadow">
                        <a href="<?php echo $alamat['linkedin'];?>">
                            <span class="screen-reader-text">LinkedIn</span>
                        </a>
                    </li>
                </ul>

            </nav> <!-- end header__nav-wrap -->
        </header> <!-- end s-header -->

<    