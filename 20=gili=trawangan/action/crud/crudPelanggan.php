<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$kode=$_POST['kode'];
$edit = $_POST['idUpdate'];


$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];


if ($kode == "tambah") {
  $ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
  $yangcocok = $ambil->num_rows;
  if($yangcocok == 1){
    echo "<script>alert('Pendaftaran gagal, email sudah digunakan!');</script>";
    echo "<meta http-equiv='refresh' content='1;url=../../managePelanggan.php'>";
   
  }
  else{
    // Insert ke tabel pelanggan
    $conn->query("INSERT INTO pelanggan(email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES('$email', '$password', '$nama_pelanggan', '$telepon', '$alamat')");
    echo "<script>alert('Pendaftaran sukses, Silahkan login');</script>";
    echo "<meta http-equiv='refresh' content='1;url=../../managePelanggan.php'>";
  }

}else if (empty($kode) && empty($idUpdate)){
  $hapus =$_GET['id'];
  mysqli_query($conn,"DELETE FROM pelanggan WHERE id_pelanggan = '$hapus'") or die(mysql_error());
  header("location:../../managePelanggan.php");
    //kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
}

else if ($kode == "edit" ){
  $linkBaru = $_POST['linkBaru'];
  $idUpdate = $_POST['idUpdate'];
  mysqli_query($conn,"UPDATE linksmarketplace SET idproduk=$idproduk, idmarketplace=$idmarketplace, namaproduk=$namaproduk,linkmarket='$linkBaru' WHERE idlinksmarket='$idUpdate'");
  header("location:../../kelolaLinksMarketplace.php?idproduk=$idproduk");
}

?>