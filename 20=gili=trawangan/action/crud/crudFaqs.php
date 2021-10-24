<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$kode=$_POST['kode'];

$edit = $_POST['idUpdate'];

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];



if ($kode == "tambah") {
		$query = "INSERT INTO faqs(judul_pertanyaan,deskripsi_pertanyaan) VALUES('".$judul."','".$deskripsi."')";    
        $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
					
		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
            echo "<script>alert('Pertanyaan ditambahkan');history.go(-);</script>";
			header("location:../../managefaqs.php"); // Redirectke halaman index.php
			}else{
			// Jika Gagal, Lakukan :
			echo "<script>alert('Terjadi Masalah Saat Menyimpan Data');history.go(-);</script>";
		}
				


} else if(empty($kode) && empty($edit) ){
    $hapus =$_GET['id'];
	mysqli_query($conn,"DELETE FROM faqs WHERE id_faq = '$hapus'");
	header("location:../../managefaqs.php");
	//kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
} else if($kode == "edit"){
    $query = "UPDATE faqs SET judul_pertanyaan = '$judul', deskripsi_pertanyaan='$deskripsi' where id_faq='$edit'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
    header('location:../../managefaqs.php');
}
?>