<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$kode=$_POST['kode'];
$hapus =$_GET['id'];
$edit = $_POST['idUpdate'];


$gambarLogoAsal = $_POST['gambarLogoAsal'];
$metode = $_POST['metode'];
$norek = $_POST['norek'];
$an = $_POST['an'];

$id = "";
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

if ($kode == "tambah") {
	$path = "../../fileUpload/logo".$nama_file;
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
			if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
				// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
				// Proses upload
				if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
					// Jika gambar berhasil diupload, Lakukan :	
					// Proses simpan ke Database
					$query = "INSERT INTO metodepembayaran(id,metode,norek,logo,an) VALUES('".$id."','".$metode."','".$norek."','".$nama_file."','".$an."')";
				         
                    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
					
					if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
						header("location:../../managemetodepembayaran.php"); // Redirectke halaman index.php
					}else{
						// Jika Gagal, Lakukan :
						echo "<script>alert('Terjadi Masalah Saat Menyimpan Data');history.go(-);</script>";
					}
				}else{
					// Jika gambar gagal diupload, Lakukan :
					echo "<script>alert('Maaf Gagal Upload, Periksa Koneksi Anda');history.go(-1);</script>";
				}
			}else{
				// Jika ukuran file lebih dari 1MB, lakukan :
				echo "<script>alert('Gambar yang di upload tidak boleh lebih dari 2MB');history.go(-1);</script>";
			}
		}else{
			// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
			echo "<script>alert('Gambar yang di upload harus berformat JPG/JPEG/PNG');history.go(-1);</script>";
		}


} else if(empty($kode) && empty($edit) ){
	mysqli_query($conn,"DELETE FROM metodepembayaran WHERE id = '$hapus'");
	header("location:../../managemetodepembayaran.php");
	//kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
} else if($kode == "edit"){
	//echo "edit";
	$path = "../../fileUpload/logo".$nama_file;

	if (empty($nama_file)) {
       
		$query = "UPDATE metodepembayaran SET metode = '$metode', norek = '$norek', logo='$gambarLogoAsal', an = '$an'  where id='$edit'";
		$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
		header('location:../../managemetodepembayaran.php');
	}else {
		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
			if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
				// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
				// Proses upload
				if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
					// Jika gambar berhasil diupload, Lakukan :	
					// Proses simpan ke Database
					$query = "UPDATE metodepembayaran SET metode = '$metode',norek = '$norek', logo='$nama_file', an = '$an' where id='$edit'";
					$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
					
					if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
						header("location: ../../managemetodepembayaran.php"); // Redirectke halaman index.php
					}else{
						// Jika Gagal, Lakukan :
						echo "<script>alert('Terjadi Masalah Saat Menyimpan Data');history.go(-1);</script>";
					}
				}else{
					// Jika gambar gagal diupload, Lakukan :
					echo "<script>alert('Maaf Gagal Upload, Periksa Koneksi Anda');history.go(-1);</script>";
				}
			}else{
				// Jika ukuran file lebih dari 1MB, lakukan :
				echo "<script>alert('Gambar yang di upload tidak boleh lebih dari 2MB');history.go(-1);</script>";
			}
		}else{
			// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
			echo "<script>alert('Gambar yang di upload harus berformat JPG/JPEG/PNG');history.go(-1);</script>";
		}
	}
}
?>