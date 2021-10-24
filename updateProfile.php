<?php
require_once('20=gili=trawangan/API/koneksi.php');
//error_reporting(0);

$bio = $_POST['bio'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$email = $_POST['email'];
$telepon_pelanggan = $_POST['telepon_pelanggan'];
$alamat_pelanggan = $_POST['alamat_pelanggan'];
$id_pelanggan = $_POST['id_pelanggan'];



$nama_file = $_FILES['gambar']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$random = crypt($nama_file, time());
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];
$path2 = "uploads/userprofile/".$random.'.'.$ext;
$pathdb2 = "uploads/userprofile/".$random.'.'.$ext;


if (empty($nama_file)) {
    $query = "UPDATE pelanggan SET email_pelanggan='$email', nama_pelanggan='$nama_pelanggan',telepon_pelanggan='$telepon_pelanggan', alamat_pelanggan='$alamat_pelanggan', bio = '$bio' where id_pelanggan='$id_pelanggan'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
    header('location:profile');
}else {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
          // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
          // Proses upload
          if(move_uploaded_file($tmp_file, $path2)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan : 
            // Proses simpan ke Database
           
            $query =  "UPDATE pelanggan SET email_pelanggan='$email', nama_pelanggan='$nama_pelanggan',telepon_pelanggan='$telepon_pelanggan', alamat_pelanggan='$alamat_pelanggan', bio = '$bio',  gambar_profile='$pathdb2' where id_pelanggan='$id_pelanggan'";
            $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
            
            if($sql){ // Cek jika proses simpan ke database sukses atau tidak
              // Jika Sukses, Lakukan :
              header("location:profile"); // Redirectke halaman index.php
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

?>