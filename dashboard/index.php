<!-- Author : Arif Widagdo -->
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="assets/img/new/logo.png">
  <title>BeeHonest</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <!-- main css -->
  <link rel="stylesheet" type="text/css" href="assets/css/style2.css">
  <!-- Responsive -->
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  <!-- skin colors -->
  <link rel="stylesheet" type="text/css" href="assets/css/skins/color-1.css">
  <!-- style switcher color -->
  <link rel="stylesheet" type="text/css" class="alternate-style" title="color-1" href="assets/css/skins/color-1.css">

  <link rel="stylesheet" type="text/css" href="assets/css/style-switcher3.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- J-query -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>
  <?php require_once('../Admin/Api/koneksi.php'); ?>

 






  <div class="scroll-up-btn">
    <i class="fas fa-angle-up"></i>
  </div>

  <header class="header">
    <div class="container">
      <div class="row justyfy-content-between">
        <div class="logo"><img src="assets/img/new/logo.png" alt="ImageLogo">
          <a href="#">BeeHonest</a></div>
          <div class="list-menu">
            <div class="menu-1">
              <ul class="menu">
                <li><form action="seach.php" method="post">
                 <input class="input-control inner-shadow outer-shadow" name="Search" type="text" placeholder="Search" class="input-control"required />
                 <button type="submit" class="btn btn-default search" aria-label="Left Align"><i class="fa fa-search" aria-hidden="true"></i></button>
                 </form></li>
              </ul>
            </div>
          </div>
          <div class="menu-2">
            <ul class="menu">
              <li><a href="login.php" class="nav-link menu-1 outer-shadow hover-inner hover-in-shadow"><i
                class="fas fa-shopping-cart"></i> Cart</a></li>
                <li><a href="login.php" class=" nav-link menu-1 outer-shadow hover-inner hover-in-shadow">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>










     <!-- testimonial section start -->
                       <section class="testimonial-section section" id="testimonial">
                        <div class="container">
                          <div class="row">
                            <div class="testi-box">
                              <div class="testi-slider outer-shadow">
                                <div class="testi-slider-container">
                                  <!-- testi item start -->
                                  <div class="testi-item">
                                    <i class="fas fa-quote-left left"></i>
                                    <i class="fas fa-quote-right right"></i>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nostrum laudantium totam atque
                                      libero assumenda voluptatum voluptates aperiam, tenetur maiores beatae dolore perspiciatis animi quod
                                    molestiae magnam ab iure delectus.</p>
                                    <img src="assets/img/testimonial/1.png" alt="testimonial">
                                    <span>User - 1</span>
                                  </div>
                                  <!-- testi item end -->
                                  <!-- testi item start -->
                                  <div class="testi-item active">
                                    <i class="fas fa-quote-left left"></i>
                                    <i class="fas fa-quote-right right"></i>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nostrum laudantium totam atque
                                      libero assumenda voluptatum voluptates aperiam, tenetur maiores beatae dolore perspiciatis animi quod
                                    molestiae magnam ab iure delectus.</p>
                                    <img src="assets/img/testimonial/1.png" alt="testimonial">
                                    <span>User - 2</span>
                                  </div>
                                  <!-- testi item end -->
                                  <!-- testi item start -->
                                  <div class="testi-item active">
                                    <i class="fas fa-quote-left left"></i>
                                    <i class="fas fa-quote-right right"></i>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nostrum laudantium totam atque
                                      libero assumenda voluptatum voluptates aperiam, tenetur maiores beatae dolore perspiciatis animi quod
                                    molestiae magnam ab iure delectus.</p>
                                    <img src="assets/img/testimonial/1.png" alt="testimonial">
                                    <span>User - 2</span>
                                  </div>
                                  <!-- testi item end -->
                                  <!-- testi item start -->
                                  <div class="testi-item active">
                                    <i class="fas fa-quote-left left"></i>
                                    <i class="fas fa-quote-right right"></i>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nostrum laudantium totam atque
                                      libero assumenda voluptatum voluptates aperiam, tenetur maiores beatae dolore perspiciatis animi quod
                                    molestiae magnam ab iure delectus.</p>
                                    <img src="assets/img/testimonial/1.png" alt="testimonial">
                                    <span>User - 2</span>
                                  </div>
                                  <!-- testi item end -->
                                  <!-- testi item start -->
                                  <div class="testi-item">
                                    <i class="fas fa-quote-left left"></i>
                                    <i class="fas fa-quote-right right"></i>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati nostrum laudantium totam atque
                                      libero assumenda voluptatum voluptates aperiam, tenetur maiores beatae dolore perspiciatis animi quod
                                    molestiae magnam ab iure delectus.</p>
                                    <img src="assets/img/testimonial/1.png" alt="testimonial">
                                    <span>User - 3</span>
                                  </div>
                                  <!-- testi item end -->
                                </div>
                              </div>
                              <div class="testi-slider-nav">
                                <span class="prev outer-shadow hover-in-shadow"><i class="fas fa-angle-left"></i></span>
                                <span class="next outer-shadow hover-in-shadow"><i class="fas fa-angle-right"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <!-- testimonial section end -->


                <!-- Portfolio section start -->

                <section class="portfolio-section section" id="products">
                  <div class="container">
                    <div class="row">
                      <div class="section-title">
                        <h2 data-heading="Order Now">Our Products</h2>
                      </div>
                    </div>
                    <!-- portfolio filter start -->
                    <div class="row">

                      <div class="portfolio-filter">
                        <span class="filter-item outer-shadow active" data-target="all">all</span>
                        <?php      
                        $kategori = mysqli_query($conn,"SELECT * FROM kategori order by idkategori ASC");
                        while ($infoKategori = mysqli_fetch_array($kategori)) {
                          ?>
                          <span class="filter-item"
                          data-target="<?php echo $infoKategori['namakategori'] ?>"><?php echo str_replace("-"," ",$infoKategori['namakategori']);?></span>
                          <?php
                        }
                        ?>
                        
                      </div>

                    </div>
                    <!-- portfolio filter end -->


                    <!-- portfolio items start -->
                    <div class="row portfolio-items">
                      <?php 
                      $brgs=mysqli_query($conn,"SELECT * from kategori k, produk p where k.idkategori=p.idkategori order by idproduk ASC");  
                        while($p=mysqli_fetch_array($brgs)){  
                        $idproduk=$p['idproduk'];    
                        ?>
                        <?php 
                        $brgs2=mysqli_fetch_array(mysqli_query($conn,"SELECT * from gambarproduk  where idproduk=$idproduk "));  
                        ?>
                        <div class="portfolio-item" data-category="<?php echo $p['namakategori']?>">
                          <div class="portfolio-item-inner outer-shadow">
                            <div class="portfolio-item-img">


                              <?php 
                              $infoGambarSub = isset($brgs2['gambar1']);?>

                              <img src="<?php echo str_replace("../../","../Admin/",$p['gambar'])?>" alt="portfolio" data-screenshots="<?php echo str_replace("../../","../Admin/",$p['gambar'])?>, 

                              <?php  
                              if (!$infoGambarSub){
                                echo("../Admin/produk/subProduk/no_image.png");
                                }else
                                echo str_replace("../../","../Admin/",$brgs2['gambar1']);
                                ?>">
                                <!-- View Products btn -->
                                <span class="view-project">View Products <i class="fas fa-arrow-circle-right"></i></span>
                              </div>
                              <div class="portfolio-display">
                                <div class="row">
                                  <p class="portfolio-item-star">
                                    <span>
                                      <?php
                                      $bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                                      $rate = $p['rate'];
                                      for($n=1;$n<=$rate;$n++){
                                        echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
                                      };
                                      ?>
                                    </span></p>
                                  </div>
                                  <div class="row">
                                    <h3 class="portfolio-item-title"><?php echo $p['namaproduk']?></h3>
                                    <div class="harga">
                                      <div class="harga-diskon">
                                        <p>IDR <?php echo number_format($p['hargaafter'],2,',','.')?></p>
                                      </div>
                                      <div class="harga-awal">
                                        <p>IDR <?php echo number_format($p['hargabefore'],2,',','.')?></p>
                                      </div>
                                    </div>
                                    <!-- portfolio item details start -->
                                  </div>
                                </div>

                                <div class="portfolio-item-details">
                                  <div class="row">
                                    <div class="description">
                                      <h3>Deskripsi </h3>
                                      <p><?php echo $p['deskripsi']?></p>
                                    </div>
                                    <div class="info">
                                      <h3>Product Info</h3>
                                      <table style="width:100%" border="10px">
                                        <tr>
                                          <th rowspan="1">ingredients</th>
                                          <th colspan="2">mixture</th>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>
                                          <td>Madu</td>
                                          <td>100%</td>
                                          <td>80</td>

                                        </tr>
                                        <tr>
                                          <td>telur</td>
                                          <td>84</td>
                                          <td>70</td>
                                        </tr>
                                      </table>
                                      <br>
                                      <ul>

                                        <h3>buy in marketplace</h3>
                                        <table style="width:100%;  padding:0 15px;" >
                                          <tbody>
                                           <?php $marketplace=mysqli_query($conn,"SELECT * from marketplace");
                                           $no=1;
                                           while($infoProduk=mysqli_fetch_array($marketplace)){
                                            $idmarketplace = $infoProduk['idmarketplace'];
                                            $p3 = mysqli_fetch_array(mysqli_query($conn,"Select * from linksmarketplace where idmarketplace='$idmarketplace' && idproduk=$idproduk"));
                                            ?>
                                            <tr>          

                                              <td><a onClick="alert('Browse Marketplace Link')" href="<?php if(!$p3){
                            echo "#";
                          }else 
                          echo substr($p3['linkmarket'],0,50)?> "> <?php echo $infoProduk['namamarketplace'];?></td>
                                               <td><img src="../Admin/fileUpload/logo<?php echo $infoProduk['gambarmarketplace']; ?>"
                                                 width="100px" height="50px"></td>
                                               </tr>
                                               <?php
                                             }
                                             ?>
                                           </tbody>
                                         </table>
                                       </ul>
                                     </div>
                                   </div>
                                 </div>
                                 <!-- portfolio item details end -->
                               </div>
                             </div>
                             <!-- portfolio item end -->
                             <?php
                           }
                           ?>
                         </div>
                       </section>
                       <!-- Portfolio section end -->

                  



                      <!-- contact section start -->
                      <section class="footer-section section" id="footer">
                        <div class="container">
                          <div class="row">

                            <div class="footer-col">
                              <h4>Contact Us</h4>
                              <div class="contact">
 <?php 
                        $alamat=mysqli_fetch_array(mysqli_query($conn,"SELECT * from alamat "));  
                        ?>
                                <div class="icons">
                                  <div class="row">
                                    <i class="fas fa-user"></i>
                                    <div class="info">
                                      <div class="head">Company</div>
                                      <div class="sub-title"><?php echo $alamat['namaPerusahaan'] ?></div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="info">
                                      <div class="head">Address</div>
                                      <div class="sub-title"><?php echo $alamat['alamatPerusahaan'] ?></div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <i class="fas fa-envelope"></i>
                                    <div class="info">
                                      <div class="head">Email</div>
                                      <div class="sub-title"><?php echo $alamat['email'] ?></div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>


                            <div class="footer-col">
                              <h4>Menu</h4>
                              <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#products">Products</a></li>
                                <li><a href="">Resources</a></li>
                              </ul>
                            </div>

                            <div class="footer-col">
                              <h4>get help</h4>
                              <ul>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">shipping</a></li>
                                <li><a href="">returns</a></li>
                                <li><a href="">order status</a></li>
                                <li><a href="">payment options</a></li>
                              </ul>
                            </div>


                            <div class="footer-col">
                              <h4>Follow us</h4>
                              
                                <div class="social-links">
                                  <a href="<?php echo $alamat['fb'];?>" class="facebook outer-shadow hover-in-shadow">
                                    <i class="fab fa-facebook-f"></i></a>
                                    <a href="<?php echo $alamat['ig'];?>" class="instagram outer-shadow hover-in-shadow">
                                      <i class="fab fa-instagram instagram"></i><span></span></a>
                                      <a href="<?php echo $alamat['twitter'];?>" class="twitter outer-shadow hover-in-shadow">
                                        <i class="fab fa-twitter"></i></a>
                                        <a href="<?php echo $alamat['linkedin'];?>" class="linkedin outer-shadow hover-in-shadow">
                                          <i class="fab fa-linkedin"></i></a>
                                        </div>
                                       
                                    </div>

                                  </div>
                                </div>
                              </section>
                              <!-- contact section end -->

                     


                              <!-- Portfolio popup start -->
                              <div class="pp portfolio-popup">
                                <div class="pp-details">
                                  <div class="pp-details-inner">
                                    <div class="pp-title">
                                      <h1></h1>
                                      <h2></h2>
                                      <p>Category - <span class="pp-project-category">Web Application</span></p>
                                    </div>
                                    <div class="pp-project-details">
                                      <div class="row">
                                        <div class="description">
                                          <h3>Deskripsi</h3>
                                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores pariatur facere autem deleniti
                                            a ipsa odio, perspiciatis accusamus ipsum dolorem nostrum temporibus, quo tempore laudantium id
                                          odit, quam officiis aut.</p>
                                        </div>
                                        <div class="info">
                                          <h3>Product Info</h3>
                                          <ul>
                                            <li>Date - <span>2020</span></li>
                                            <li>Client - <span>Dado</span></li>
                                            <li>ingredient - <span>html, css, jquery</span></li>
                                            <li>View Resource - <span><a href="https://www.google.com/">www.google.com</a></span></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="separator"></div>
                                <!--  -->
                                <div class="pp-main">
                                  <div class="pp-main-inner">
                                    <div class="pp-project-details-btn outer-shadow hover-in-shadow">Product Details <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="pp-project-order-btn outer-shadow hover-in-shadow"><a href="">Add to cart <i
                                      class="fas fa-shopping-cart"></i></a></div>
                                      <div class="pp-close outer-shadow hover-in-shadow">&times;</div>
                                      <img src="assets/img/portfolio/large/project-1/1.png" alt="pp-img" class="pp-img outer-shadow">
                                      <div class="pp-counter">1 of 6</div>
                                    </div>
                                    <div class="pp-loader">
                                      <div></div>
                                    </div>
                                    <!-- pp navigation -->
                                    <div class="pp-prev"><i class="fas fa-play"></i></div>
                                    <div class="pp-next"><i class="fas fa-play"></i></div>

                                  </div>
                                </div>
                                <!-- Portfolio popup end -->



                                <!-- style switcher start - for demo purposes only -->
                                <div class="style-switcher outer-shadow">
                                  <div class="style-chat s-icon outer-shadow hover-in-shadow">
                                    <i class="fas fa-comments"></i>
                                  </div>
                                  <h4>Live Chat</h4>
                                  <div class="colors">
                                    <span class="color-1" onclick="setActiveStyle('color-1')"></span>
                                    <span class="color-2" onclick="setActiveStyle('color-2')"></span>
                                    <span class="color-3" onclick="setActiveStyle('color-3')"></span>
                                    <span class="color-4" onclick="setActiveStyle('color-4')"></span>
                                    <span class="color-5 " onclick="setActiveStyle('color-5')"></span>
                                  </div>
                                </div>
                                <div class="style-switcher2 outer-shadow">
                                  <div class="style-search s-icon outer-shadow hover-in-shadow">
                                    <i class="fas fa-search"></i>
                                  </div>

                                  <div class="input-field inner-shadow ">
                                    <input type="text" placeholder="Search" class="input-control" required />
                                    <i class="fas fa-search"></i>
                                  </div>
                                </div>




                                <footer>
                                  <span>Created By <a href="#">"BeeHonest"</a> | <span class="far fa-copyright"></span> 2021 All rights
                                reserved.</span>
                              </footer>
                              

                              <!-- style switcher  end -->
                              <!-- main js -->
                              <script src="assets/js/main5.js"></script>
                              <!-- style switcher js -->
                              <script src="assets/js/style-switcher.js"></script>
                            </body>
                            </html>
