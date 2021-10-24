<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$kode=$_POST['kode'];
$hapus =$_GET['id'];
$edit = $_POST['idUpdate'];


$idproduk = $_POST['idproduk'];
$idmarketplace=$_POST['idmarketplace'];
$namaproduk=$_POST['namaproduk'];
$links = $_POST['links'];


if ($kode == "tambah") {
  $query = "INSERT INTO linksmarketplace(idproduk,idmarketplace,namaproduk,linkmarket) VALUES('".$idproduk."','".$idmarketplace."','".$namaproduk."','".$links."')";     
  $sql = mysqli_query($conn, $query); 
  echo "<script>alert('Berhasil Menyimpan Data');</script>"; 
  header("location:../../kelolaLinksMarketplace.php?idproduk=$idproduk"); // Redirectke halaman index.php

}else if (empty($kode) && empty($idUpdate)){
  mysqli_query($conn,"DELETE FROM linksmarketplace WHERE idlinksmarket = '$hapus'") or die(mysql_error());
  header("location:../../manageProductContent.php");
    //kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
} else if ($kode == "edit" ){
  $linkBaru = $_POST['linkBaru'];
  $idUpdate = $_POST['idUpdate'];
  mysqli_query($conn,"UPDATE linksmarketplace SET idproduk=$idproduk, idmarketplace=$idmarketplace, namaproduk=$namaproduk,linkmarket='$linkBaru' WHERE idlinksmarket='$idUpdate'");
  header("location:../../kelolaLinksMarketplace.php?idproduk=$idproduk");
}

?>