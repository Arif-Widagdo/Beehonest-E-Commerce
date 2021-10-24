<?php 
session_start();

require_once('../../Api/koneksi.php');
error_reporting(0);



$idproduk=$_POST['idproduk'];
$idCategory=$_POST['idCategory'];
$namaproduk=$_POST['namaproduk'];


$nama_file = $_FILES['uploadgambar']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$random = crypt($nama_file, time());
$ukuran_file = $_FILES['uploadgambar']['size'];
$tipe_file = $_FILES['uploadgambar']['type'];
$tmp_file = $_FILES['uploadgambar']['tmp_name'];
$path = "../../produk/subProduk/".$random.'.'.$ext;
$pathdb = "../../produk/subProduk/".$random.'.'.$ext;


if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){
	if($ukuran_file <= 5000000){ 
		if(move_uploaded_file($tmp_file, $path)){ 
			
			$query = "insert into gambarproduk (idproduk, idCategory, gambar1, namaproduk)
			values('$idproduk','$idCategory','$pathdb','$namaproduk')";
		  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
		  
		  if($sql){ 
		  	echo "<br><meta http-equiv='refresh' content='3; URL=../../subGambarProduk.php?idproduk=$idproduk'> You will be redirected to the form in 3 seconds";
		  	$_SESSION['$idproduk'] = $idproduk;
		  }else{
			// Jika Gagal, Lakukan :
		  	echo "Sorry, there's a problem while submitting.";
		  	echo "<br><meta http-equiv='refresh' content='3; URL=../../manageProductContent.php'> You will be redirected to the form in 3 seconds";
		  }
		}else{
		  // Jika gambar gagal diupload, Lakukan :
			echo "Sorry, there's a problem while uploading the file.";
			echo "<br><meta http-equiv='refresh' content='3; URL=../../manageProductContent.php'> You will be redirected to the form in 3 seconds";
		}
	}else{
		// Jika ukuran file lebih dari 1MB, lakukan :
		echo "Sorry, the file size is not allowed to more than 1mb";
		echo "<br><meta http-equiv='refresh' content='3; URL=../../manageProductContent.php'> You will be redirected to the form in 3 seconds";
	}
}else{
	  // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
	echo "Sorry, the image format should be JPG/PNG.";
	echo "<br><meta http-equiv='refresh' content='3; URL=../../manageProductContent.php'> You will be redirected to the form in 3 seconds";
}
?>