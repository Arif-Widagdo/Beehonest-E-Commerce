<?php require_once 'header-blog.php';
require_once 'vendor/autoload.php';
use App\classes\Post;
require_once('20=gili=trawangan/Api/koneksi.php'); 

use App\classes\Session;
if (isset($_POST['msg-btn'])) {
    $ob = new \App\classes\Mail();
    $ob->sendMail($_POST);
}
?>

<body>

<!-- preloader
================================================== -->
<!-- <?php require_once('templates/preeloader.php'); ?> -->
    <div id="top" class="s-wrap site-wrapper">
        <!-- site header -->
      
        <!-- site content
        ================================================== -->
       <div class="s-content content">
        <?php 
        if (isset($_GET['search-btn'])){
                $searchContent = $_GET['search'];
                $var = \App\classes\Post::searchPost($searchContent);
                if($var == false){
                    echo '<h1 class="text-center"><a>Not Avilable Post !!</a></h1>';
        }else{
                while ($rowSearch = mysqli_fetch_assoc($var)){ 
                        echo '<header class="listing-header-single-page">
                                <h1 class="h2">Search By Keyword ';echo '<a>','"',$searchContent,'"','</a>'; echo'</h1>
                            </header>';
                    ?>
            <div class="masonry-wrap">
                <div class="grid-sizer"></div>
                <article class="masonry__brick entry format-video animate-this">
                        <div class="entry__thumb-link">
                            <a href="singlepage?id=<?= $rowSearch['id'] ?>">
                                <img src="uploads/<?=$rowSearch['image'] ?>" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="entry__text">
                            <div class="entry__header">
                                <h2 class="entry__title"><a href="singlepage?id=<?= $rowSearch['id'] ?>" style="color:#000;" title=""><?=$rowSearch['title'] ?></a></h2>
                                <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                        <a  class="bg-orange" href="singlepage?id=<?= $rowSearch['id'] ?>" title="Category"><?= $rowSearch['category_name'] ?>,</a>
                                         <a  title="Author or Media"><?= $rowSearch['admin'] ?></a>
                                    </span>
                                    <span class="entry__meta-date">
                                         <a  title="Date and Time"><small> <?= $rowSearch['date'] ?></small></a>
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                               <span>
                                <p><?php
                                    $txt = $rowSearch['content'];
                                    echo   \App\classes\Helper::textShort("$txt",250);
                                    ?> 
                                    <a href="singlepage?id=<?= $rowSearch['id'] ?>" title="">See More</a>
                                </p></span> 
                            </div>
                        </div>
                </article> 
            </div>
            <?php
                            }
                        }
                    }
            ?>



            <main class="row content__page">          
            <?php  
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $postOb = Post::singlePost($id);
                if($postOb == false){
                    header('location: 404');
                    die();
                }
                $postData = mysqli_fetch_assoc($postOb);
            ?>
                <article class="column large-full entry format-gallery">
                   <a href="uploads/<?= $postData['image']?>" data-lity class="entry__thumb-link" >
                        <img src="uploads/<?= $postData['image']  ?>" style="display: block; margin-left: auto; margin-right: auto;"
                        sizes="(max-width: 2000px) 100vw, 2000px" alt="Beehonest">
                    </a>
                    <div class="content__page-header entry__header">
                        <h1 class="display-1 entry__title">
                        <?= $postData['title'] ?>
                        </h1>
                        <ul class="entry__header-meta">
                            <li class="author">By <a href="#0"><?= $postData['admin'] ?></a></li>
                            <li class="date">
                                <?php

                        $infoDate = substr($postData['date'],0,10);
                        $getTanggal = $infoDate;
                        $pecahTanggal = explode("-", $getTanggal);
                         str_replace(":", " ", $getTanggal);
                        $bulan = $pecahTanggal[1];
                        $tahun = $pecahTanggal[0];
                        $tanggal = $pecahTanggal[2];
                        
                        if ($bulan == "01") {
                            echo "<h5 = class'date'>January, ".$tanggal." | ".$tahun."</h5>";
                        } else if ($bulan == "02"){
                            echo "<h5 = class'date'>February, ".$tanggal." | ".$tahun."</h5>";
                        }else if ($bulan == "03"){
                            echo "<h5 = class'date'>March, ".$tanggal." | ".$tahun."</h5>";
                        } else if($bulan == "04"){
                           echo "<h5 = class'date'>April, ".$tanggal." | ".$tahun."</h5>";
                        } else if ($bulan == "05"){
                           echo "<h5 = class'date'>May, ".$tanggal." | ".$tahun."</h5>";
                        } else if ($bulan == "06"){
                           echo "<h5 = class'date'>June, ".$tanggal." | ".$tahun."</h5>";
                        } else if ($bulan == "07"){
                           echo "<h5 = class'date'>July, ".$tanggal." | ".$tahun."</h5>";
                        } else if ($bulan == "08"){
                           echo "<h5 = class'date'>August, ".$tanggal." | ".$tahun."</h5>";
                        }else if ($bulan == "09"){
                            echo "<h5 = class'date'>September, ".$tanggal." | ".$tahun."</h5>";
                        }else if ($bulan == "10"){
                            echo "<h5 = class'date'>October, ".$tanggal." | ".$tahun."</h5>";
                        }else if ($bulan == "11"){
                            echo "<h5 = class'date'>November, ".$tanggal." | ".$tahun."</h5>";
                        }else if ($bulan == "12"){
                            echo "<h5 = class'date'>December, ".$tanggal." | ".$tahun."</h5>";
                        }
                    ?>     
                    </li>
                        <li class="cat-links">
                            <a href="#0"><?= $postData['category_name'] ?></a>
                        </li>
                        </ul>
                    </div> <!-- end entry__header -->
                    <div class="entry__content">
                        <p class="lead drop-cap">
                        <?= $postData['content'] ?>
                        </p>  
                        <blockquote>
                            <p>
                            <?= $postData['quote'] ?>
                             </p>
                            <cite><?= $postData['admin'] ?>, | <?=$getTanggal = $postData['date'];?></cite>
                        </blockquote>                      
                        <p class="entry__tags">
                            <span>Post Tags</span>   
                            <span class="entry__tag-list">
                                <a href="blog?id=<?= $postData['tag']?>"><?= $postData['tag'] ?></a>
                            </span>           
                        </p>
                    </div> <!-- end entry content -->
                </article>
    <?php } ?>
    <div class="s-content">
        <h1 class="h2"  style="font-weight: 600;  text-transform: capitalize;"> Related Post</h1>
        <hr style="width: 50%; border: 1px solid; color: var(--skin-color);">    
        <hr style="width: 100%; margin-top: -30px; top: 0; border: 1px solid; color: var(--skin-color);">  
    </div>
        <?php 
        $rand1 = rand(1,5);
        $rand2 = rand(1,3);
        $sql = mysqli_query($conn,"SELECT blog.*, categories.category_name FROM blog INNER JOIN categories ON blog.cat_id = categories.id WHERE blog.status = 1 LIMIT $rand1,$rand2 ");
            while ($infoRelated = mysqli_fetch_array($sql)) {
        ?>

                <article class="masonry__brick entry format-video animate-this">
                    <div class="entry__thumb-link">
                        <a href="singlepage?id=<?= $infoRelated['id'] ?>" >
                            <img src="uploads/<?= $infoRelated['image'] ?>" alt="" class="img-fluid w-100" style="display: block; margin-left: auto; margin-right: auto;">
                        </a>
                    </div>
                        <div class="entry__text">
                            <div class="entry__header">
                                <h2 class="entry__title"><a style="color:#000;" href="singlepage?id=<?= $infoRelated['id'] ?>" title=""><?= $infoRelated['title'] ?></a></h2>
                                <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                        <a  class="bg-orange" href="singlepage?id=<?= $infoRelated['id'] ?>" title="Category"><?= $infoRelated['category_name'] ?></a>
                                         <a  title="Author or Media">, <?= $infoRelated['admin'] ?></a>
                                    </span>
                                    <span class="entry__meta-date">
                                       
                                         <a  title="Date and Time"><small><?= $infoRelated['date'] ?></small></a>
                                        
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">

                               <span> <p><?php
                            $txt = $infoRelated['content'];
                            echo   \App\classes\Helper::textShort("$txt",150);
                            ?><a href="singlepage?id=<?= $infoRelated['id'] ?>">See more</a></p></span>
                            </div>
                        </div>
                    </article> 

<?php } ?>













 

           <div class="entry__pagenav">
                        <div class="entry__nav">
                            <div class="entry__prev">
                                <a >
                                    <span>See More Content on Our Social Media</span>
                                    Follow Us
                                </a>
                                </ul> <!-- end header__nav -->
                    <?php 
                        $alamat=mysqli_fetch_array(mysqli_query($conn,"SELECT * from alamat "));  
                        ?>
                    <ul class="header__social2">
                        <li class="ss-facebook">
                        <a href="<?php echo $alamat['fb'];?>">
                            <span class="screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li class="ss-twitter ">
                        <a href="<?php echo $alamat['twitter'];?>">
                            <span class="screen-reader-text ">Twitter</span>
                        </a>
                    </li>
                    <li class="ss-instagram ">
                        <a href="<?php echo $alamat['ig'];?>">
                            <span class="screen-reader-text">Instagram</span>
                        </a>
                    </li>
                    <li class="ss-linkedin ">
                        <a href="<?php echo $alamat['linkedin'];?>">
                            <span class="screen-reader-text">LinkedIn</span>
                        </a>
                    </li>
                </ul>
                            </div>

                            
                        </div>
                    </div> <!-- end entry content -->         

                  

<div class="entry__related">
                        <h3 class="h2">Popular Post</h3>
                       

                        <ul class="related">
                             <?php
                        $populer = Post::showPopulerlPost();
                    while ($row1 = mysqli_fetch_assoc($populer)){
                        ?>
                            <li class="related__item">
                                <a href="singlepage?id=<?= $row1['id'] ?>" class="related__link">
                                    <img src="uploads/<?= $row1['image'] ?>" alt="" style="display: block; margin-left: auto; margin-right: auto;">
                                </a>
                                <h5 class="related__post-title"><a href="singlepage?id=<?= $row1['id'] ?>" style="color: #000;"><?= substr($row1['title'],0,40) ?></a></h5>
                                <a><small><?= $row1['date'] ?></small></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div> <!-- end entry related -->








                </article> <!-- end column large-full entry-->

               

                    <div class="column large-12 comment-respond">

                        <!-- START respond -->
                        <div id="respond">
            
                            <h3 class="h2">Add Message <span>Your email address will not be published</span></h3>
   
                            <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                                <fieldset>
                                        
                                    <div class="form-field">
                                        <input name="name" id="cName" class="full-width" placeholder="Your Name" value="" type="text">
                                    </div>
            
                                    <div class="form-field">
                                        <input name="email" id="cEmail" class="full-width" placeholder="Your Email" value="" type="text">
                                    </div>
            
                                    <div class="form-field">
                                        <input name="phone" id="cWebsite" class="full-width" placeholder="Number Telephone" value="" type="text">
                                    </div>
                                    <div class="form-field">
                                        <input name="subject" id="cWebsite" class="full-width" placeholder="Subject" value="" type="text">
                                    </div>
            
                                    <div class="message form-field">
                                        <textarea name="message" id="cMessage" class="full-width" placeholder="Your Message"></textarea>
                                    </div>
            
                                    <input name="msg-btn" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">
            
                                </fieldset>
                            </form> <!-- end form -->
            
                        </div>
                        <!-- END respond-->
            
                    </div> <!-- end comment-respond -->
            
                </div> <!-- end comments-wrap -->
            </main>

        </div> <!-- end s-content -->




<?php
Session::unsetSession("emptyName");
Session::unsetSession("emptyEmail");
Session::unsetSession("emptyPhone");
Session::unsetSession("emptySubject");
Session::unsetSession("succesMail");
Session::unsetSession("failMail");
?>









           
       

        <!-- footer -->
       <?php require_once ('footer-blog.php');  ?>
</body>