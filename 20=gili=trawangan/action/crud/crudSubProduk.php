<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$tambah = $_POST['kodeT'];
$idHapus = $_GET['id'];
$idUpdate = $_POST['idUpdate'];


$namakategori = $_POST['namakategori'];

	
 	

if ($tambah == "tambah") {
    $namakategori = $_POST['namakategori'];
    mysqli_query($conn,"insert into gambarproduk (namakategori) values ('$namakategori')");
 	header('location:../../manageProductContent.php');
} else if (empty($tambah) && empty($idUpdate)){
	mysqli_query($conn,"DELETE FROM gambarproduk WHERE idproduk = '$idHapus' ") or die(mysql_error());
    $message = "Berhasil dihapus";
    echo "<script type='text/javascript'>alert('$message');</script>";
   	header("location:../../manageProductContent.php");
   	//kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
} else if ($tambah == "edit" ){
	mysqli_query($conn,"UPDATE gambarproduk SET namakategori='$namakategori' WHERE idkategori='$idUpdate'");
	header("location:../../manageProductContent.php");
}
 	
?>