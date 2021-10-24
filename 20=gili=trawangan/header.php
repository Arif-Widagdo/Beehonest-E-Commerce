<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  
    <link rel="shortcut icon" href="../assets/img/svg/logo.png">
    <title>Dashboard Admin | Beehonest</title>
    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custommin.css" rel="stylesheet">
      
   <?php
require_once '../vendor/autoload.php';
session_start();
if(!isset($_SESSION['login-success'])){
    header('location:login.php');
}
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
use App\classes\Session;
use App\classes\UserLogin;
Use App\classes\Mail;
$name = $_SESSION['username'];
$userData = UserLogin::loginUserData("$name");
$title = '';

?>

</head>
</html>