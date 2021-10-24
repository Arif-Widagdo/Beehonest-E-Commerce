<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$kode=$_POST['kode'];


$idproduk = $_POST['idproduk'];
$idmarketplace=$_POST['idmarketplace'];
$namaproduk=$_POST['namaproduk'];
$links = $_POST['links'];



if ($kode == "tambah") {
		$query = "INSERT INTO linksmarketplace(idproduk,idmarketplace,namaproduk,linkmarket) VALUES('".$idproduk."','".$idmarketplace."','".$namaproduk."','".$links."')";     
          $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo "<script>alert('Berhasil Menyimpan Data');</script>"; 
		header("location:../../kelolaLinksMarketplace.php?idproduk=$idproduk"); // Redirectke halaman index.php
		}else{
		// Jika Gagal, Lakukan :
			echo "<script>alert('Terjadi Masalah Saat Menyimpan Data');history.go(-1);</script>";
		}
} else{

}

?>