

<?php 
require_once('header-blog.php');;
require_once('20=gili=trawangan/Api/koneksi.php'); 
use App\classes\Helper;
?>

    <!-- preloader
    ================================================== -->
  <?php require_once('templates/preeloader.php'); ?>

    <div id="top" class="s-wrap site-wrapper">
        <!-- site header -->
     


        <!-- site content
        ================================================== -->
        <div class="s-content">
            
            <div class="masonry-wrap">

                <div class="masonry">

                    <div class="grid-sizer"></div>
    
        <!-- start Artikel -->
             <?php
             
            if(isset($_GET['catwisepost']) && isset($_GET['id'])){
                $id = $_GET['id'];
                $catWisepost = \App\classes\Post::categoryWisePost($id);
                if($catWisepost == false){
                    echo '<h1 class="text-center"><a>Not Avilable  !!</a></h1>';
                }else{
                    while ($catWisepostRow = mysqli_fetch_assoc($catWisepost)) {
                    echo '<header class="listing-header">
                                <h1 class="h2">Category By ';echo '<a>','"',$catWisepostRow['category_name'],'"','</a>'; echo'</h1>
                            </header>';
                    ?>
                    <article class="masonry__brick entry format-video animate-this">
                        <div class="entry__thumb-link">
                            <a href="singlepage?id=<?= $catWisepostRow['id'] ?>" >
                                <img src="uploads/<?=$catWisepostRow['image'] ?>" alt="" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="entry__text">
                            <div class="entry__header">
                                <h2 class="entry__title"><a href="singlepage?id=<?= $catWisepostRow['id'] ?>" title=""><?=$catWisepostRow['title'] ?></a></h2>
                                <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                        <a  class="bg-orange" href="singlepage?id=<?= $catWisepostRow['id'] ?>" title="Category"><?= $catWisepostRow['category_name'] ?></a>
                                         <a  title="Author or Media"><?= $catWisepostRow['admin'] ?></a>
                                    </span>
                                    <span class="entry__meta-date">
                                         <a  title="Date and Time"><?php echo substr($catWisepostRow['date'],0,10) ?></a>    
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                               <span><p>
                                    <?php
                                    $txt = $catWisepostRow['content'];
                                    echo \App\classes\Helper::textShort("$txt",250);
                                    ?> 
                                    <a href="singlepage?id=<?= $catWisepostRow['id'] ?>" title="">See More</a>
                                    </p>
                                </span> 
                            </div>
                        </div>
                    </article> 
                 <?php 
             } 
         }
        }
            /*---------------------------------------- */
            #---------------------

            elseif (isset($_GET['search-btn'])){
                $searchContent = $_GET['search'];
                $var = \App\classes\Post::searchPost($searchContent);
                if($var == false){
                    echo '<h1 class="text-center"><a>Not Avilable Post !!</a></h1>';
                }else{
                    while ($rowSearch = mysqli_fetch_assoc($var)){
                        echo '<header class="listing-header">
                                <h1 class="h2">Search By Keyword ';echo '<a>','"',$searchContent,'"','</a>'; echo'</h1>
                            </header>';
                     ?>


                <article class="masonry__brick entry format-video animate-this">
                        <div class="entry__thumb-link">
                            <a href="singlepage?id=<?= $rowSearch['id'] ?>">
                                <img src="uploads/<?=$rowSearch['image'] ?>" alt="" class="img-fluid w-100">
                            </a>
                        </div>
        
                        <div class="entry__text">
                            <div class="entry__header">
                                <h2 class="entry__title"><a href="singlepage?id=<?= $rowSearch['id'] ?>" title=""><?=$rowSearch['title'] ?></a></h2>
                                <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                        <a  class="bg-orange" href="singlepage?id=<?= $rowSearch['id'] ?>" title="Category"><?= $rowSearch['category_name'] ?></a>
                                         <a  title="Author or Media"><?= $rowSearch['admin'] ?></a>
                                    </span>
                                    <span class="entry__meta-date">
                                       
                                         <a  title="Date and Time"> <?php echo substr($rowSearch['date'],0,10) ?></a>
                                       
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">

                               <span><p><?php
                                        $txt = $rowSearch['content'];
                                        echo   \App\classes\Helper::textShort("$txt",250);
                                        ?> <a href="singlepage?id=<?= $rowSearch['id'] ?>" title="">See More</a></p></span> 
                            </div>
                        </div>
                    </article> 

 <?php  }
  }
            }
            # ------------------------------------------------
            else{
            ?>
            <?php
            $ob = new \App\classes\Site();
            $a = $ob->display();
            $siteData = mysqli_fetch_assoc($a);
            $skip = 0;
            $take = $siteData['postdisplay'];
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $skip = ( $page - 1 ) * $take;
            }
            $totalPost = \App\classes\Post::countActivePost();
            $totalPage = ceil($totalPost/$take);
            if($totalPage < $page){
                
            }
            $sql = "SELECT blog.*, categories.category_name FROM blog INNER JOIN categories ON blog.cat_id = categories.id ORDER BY id DESC LIMIT $skip,$take ";
            $post = \App\classes\Post::pagination($sql);
            while ($row = mysqli_fetch_assoc($post)){
                echo '<header class="listing-header">
                        <h1 class="h2">Resources News <i class="fa fa-rss"></i></h1>
                    </header>';
                ?>

                <article class="masonry__brick entry format-video animate-this">
                        <div class="entry__thumb-link">
                            <a href="singlepage?id=<?= $row['id'] ?>" >
                                <img src="uploads/<?=$row['image'] ?>" alt="" class="img-fluid w-100">
                            </a>
                        </div>
        
                        <div class="entry__text">
                            <div class="entry__header">
                                <h2 class="entry__title"><a href="singlepage?id=<?= $row['id'] ?>" title=""><?=$row['title'] ?></a></h2>
                                <div class="entry__meta">
                                    <span class="entry__meta-cat">
                                    
                                        <a  class="bg-orange" href="blog?id=<?= $row['cat_id'] ?>&catwisepost" title="Category"><?= $row['category_name'] ?></a>
                                         <a  title="Author or Media"><?= $row['admin'] ?></a>
                                    </span>
                                    <span class="entry__meta-date">
                                       
                                         <a  title="Date and Time"><?php echo substr($row['date'],0,10) ?></a>
                                         
                                    </span>
                                </div>
                            </div>
                            <div class="entry__excerpt">

                               <span><p><?php
                                        $txt = $row['content'];
                                        echo   \App\classes\Helper::textShort("$txt",250);
                                        ?> <a href="singlepage?id=<?= $row['id'] ?>" title="">See More</a></p></span> 
                            </div>
                        </div>
                    </article> 


<?php } 
}
?>



                </div> <!-- end masonry -->
            </div> <!-- end masonry-wrap -->

<br><br>
             <div class="row">
                <div class="column large-full">
                    <nav class="pgn">
            <?php
            $take = $siteData['postdisplay'];
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                $skip = ( $page - 1 ) * $take;
            }
            $totalPost = \App\classes\Post::countActivePost();
            $totalPage = ceil($totalPost/$take);
            if($totalPage < $page) {
               
            }
            ?>
                        <ul>
                        <li>  <?php 
                            if ($page < 0) {
                                 echo " ";
                                
                                
                             }else{
                                 echo '<li><a class="pgn__num current">';
                                 echo   $page;
                                 echo '</a></li>';
                             } 
                        
                            ?></li>
                             
                             <li>
                               <?php if($page > 1) { ?>
                                <a class="pgn__prev" href="blog?page=<?=$page-1;?>">Prev</a>
                                <?php } ?>
                            </li>
                            <li>
                                <?php if($totalPage > $page) { ?>
                                <a class="pgn__next" href="blog?page=<?=$page + 1;?>">Next</a>
                                <?php } ?>
                            </li>
                        </ul>
                     
                    </nav>
                </div>
            </div>
       
        </div> <!-- end s-content -->




            <br><br><br><br><br><br>
        <!-- footer -->
       <?php require_once ('footer-blog.php');  ?>
</body>