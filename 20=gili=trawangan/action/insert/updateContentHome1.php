<?php
require_once('../../Api/koneksi.php');
$id = $_POST['id'];
$title = $_POST['title'];
$deskripsi_title = $_POST['deskripsi_title'];
$span_deskrip = $_POST['span_deskrip'];
$btn_nama = $_POST['btn_nama'];


$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$gambarGedung = $_FILES['gambarGedung']['name'];
$ukuranFG = $_FILES['gambarGedung']['size'];
$tipeFG = $_FILES['gambarGedung']['type'];
$tmpGedung = $_FILES['gambarGedung']['tmp_name'];


if (empty($nama_file) && !empty($gambarGedung)) {
	$pathG = "../../fileUpload/".$gambarGedung;
	$gambarAsal=$_POST['gambarAsal'];
	move_uploaded_file($tmpGedung, $pathG);
	
	mysqli_query($conn,"UPDATE home_content1 SET title = '$title',deskripsi_title ='$deskripsi_title',fileGambar='$gambarAsal',gambarGedung='$gambarGedung', span_deskrip='$span_deskrip', btn_nama='$btn_nama' where id='$id' ");
	header('location:../../kelolaContentHome.php');	

} else if (empty($gambarGedung) && !empty($nama_file)){
	
	$path = "fileUpload/".$nama_file;
	$gambarGedungL=$_POST['gambarGedungL'];
	move_uploaded_file($tmp_file, $path);
	
	mysqli_query($conn,"UPDATE home_content1 SET title = '$title',deskripsi_title ='$deskripsi_title',fileGambar='$nama_file',gambarGedung='$gambarGedungL', span_deskrip='$span_deskrip', btn_nama='$btn_nama'  where id='$id' ");
	header('location:../../kelolaContentHome.php');

}else if (!empty($nama_file) && !empty($gambarGedung)){
	$path = "../../fileUpload/".$nama_file;
	$pathG = "../../fileUpload/".$gambarGedung;

		if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
			// Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
			if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
				// Jika ukuran file kurang dari sama dengan 1MB, lakukan :
				// Proses upload
				if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
					// Jika gambar berhasil diupload, Lakukan :	
					// Proses simpan ke Database
					move_uploaded_file($tmpGedung, $pathG);
					$query = "UPDATE conten_home SET title = '$title',deskripsi_title ='$deskripsi_title', fileGambar='$nama_file',gambarGedung='$gambarGedung', span_deskrip='$span_deskrip', btn_nama='$btn_nama' where id='$id'";
					$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
					
					if($sql){ // Cek jika proses simpan ke database sukses atau tidak
						// Jika Sukses, Lakukan :
						header("location: kelolaResepsi.php"); // Redirectke halaman index.php
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
	
} else {
	$gambarGedungL=$_POST['gambarGedungL'];
	$gambarAsal=$_POST['gambarAsal'];
	mysqli_query($conn,"UPDATE home_content1 SET title = '$title',deskripsi_title ='$deskripsi_title',fileGambar='$gambarAsal',gambarGedung='$gambarGedungL', span_deskrip='$span_deskrip', btn_nama='$btn_nama'  where id='$id' ");
	header('location:../../kelolaContentHome.php');
}



?>