<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
   //koneksi
   require_once ('Api/koneksi.php');
   //header
   require_once('header.php'); ?>
    <?php require_once '../vendor/autoload.php';
use App\classes\Category;
$allCat = Category::activeCategories();
if(isset($_GET['updatepost'])){
    $id =  $_GET['id'];
    $ob = new \App\classes\Post();
    $singlePost = $ob->singlePost($id);
    $postData = mysqli_fetch_assoc($singlePost);
}
?>
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
                                    <h3>Edit Post</h3>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">

                                <div class="card-body">
                                    <form action="update.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b>Category
                                                    Name</b></label>
                                            <div class="col-sm-9">
                                                <select name="cat_id" id="" class="form-control">
                                                    <option value="">Select A Category</option>
                                                    <?php
                                                    while ($row = mysqli_fetch_assoc($allCat)){ ?>
                                                    <option value="<?= $row['id']?>"
                                                        <?= $postData['cat_id']== $row['id'] ? 'selected' : '' ?>>
                                                        <?= ucwords($row['category_name'])?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3"
                                                class="col-sm-3 col-form-label"><b>Title</b></label>
                                            <div class="col-sm-9">
                                                <input type="text" required class="form-control" id="inputEmail3"
                                                    placeholder="Post Title" name="title"
                                                    value="<?= $postData['title']?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <b>Content</b>
                                            </div>
                                            <div class="col-sm-9">

                                                <textarea name="content" id="" cols="30" rows="10" class="summernote">
                                                 <?= $postData['content']?>
                                             </textarea>
                                            </div>
                                            <input type="hidden" value="<?= $postData['id'] ?>" name="id">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <b>quote</b>
                                            </div>
                                            <div class="col-sm-9">
                                                <textarea name="quote" id="" cols="30" rows="10" class="summernote">
                                                 <?= $postData['quote']?>
                                             </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <b>Tags</b>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" name="tag" class="form-control"
                                                    value="<?= $postData['tag'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">
                                                <b>Image</b>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="image">
                                                <img style="width: 50px" src="../uploads/<?= $postData['image'] ?>"
                                                    alt="">
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-sm-3 pt-0"><b>Status</b></legend>
                                                <div class="col-sm-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" required
                                                            name="status" id="gridRadios1" value="1"
                                                            <?= $postData['status'] == 1? 'checked': ''?>>
                                                        <label class="form-check-label" for="gridRadios1">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            id="gridRadios2" value="0"
                                                            <?= $postData['status'] == 0? 'checked': ''?>>
                                                        <label class="form-check-label" for="gridRadios2">
                                                            Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-primary btn-block" name="update-btn"
                                                    value="Update Post">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
            </div>
            <!-- End = isi konten -->
            <!--  -->
        </div>
    </div>





    <?php
if(isset($_SESSION['extError'])){
    unset($_SESSION['extError']);
}
if(isset($_SESSION['postInsert'])){
    unset($_SESSION['postInsert']);
}
?>

    <script src="https://cdn.tiny.cloud/1/xqe5y1thqj9j1fqdr3cnp3mn4mxa6nfq73rratrysume8n1p/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
            toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
        });
    </script>
    <!-- Start = Footer -->
    <?php require_once('footer.php'); ?>
    <!-- End = Isi Footer -->
</body>

</html>
