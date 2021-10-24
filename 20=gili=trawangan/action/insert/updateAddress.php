<?php
require_once('../../Api/koneksi.php');

$idAlamat = $_POST['idAlamat'];


$namaPerusahaan=$_POST['namaPerusahaan'];
$alamatPerusahaan=$_POST['alamatPerusahaan'];
$email=$_POST['email'];
$noTelp_P=$_POST['noTelp_P'];
$ig=$_POST['ig'];
$fb=$_POST['fb'];
$twitter = $_POST['twitter'];
$linkedin = $_POST['linkedin'];

mysqli_query($conn,"UPDATE alamat SET ig='$ig', twitter='$twitter',fb='$fb',linkedin='$linkedin',namaPerusahaan='$namaPerusahaan',alamatPerusahaan='$alamatPerusahaan',email='$email',no_telpPerusahaan='$noTelp_P' WHERE idAlamat='$idAlamat' ");
header("location:../../manageAddress.php");
?>