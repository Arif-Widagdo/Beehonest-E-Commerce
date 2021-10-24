<?php
require_once('../../Api/koneksi.php');
//error_reporting(0);

$kode=$_POST['kode'];
$edit = $_POST['idUpdate'];



$idCategory=$_POST['idCategory'];
$namaproduk=$_POST['namaproduk'];

$deskripsi=$_POST['deskripsi'];
$rate=$_POST['rate'];
$hargabefore=$_POST['hargabefore'];
$hargaafter=$_POST['hargaafter'];
$berat=$_POST['berat'];
$stok_produk=$_POST['stok_produk'];

$nama_file = $_FILES['uploadgambar']['name'];
$ext = pathinfo($nama_file, PATHINFO_EXTENSION);
$random = crypt($nama_file, time());
$ukuran_file = $_FILES['uploadgambar']['size'];
$tipe_file = $_FILES['uploadgambar']['type'];
$tmp_file = $_FILES['uploadgambar']['tmp_name'];
$path = "../../produk/".$random.'.'.$ext;
$pathdb = "../../produk/".$random.'.'.$ext;


/*----------------tambah------------*/
if ($kode == "tambah") {
  if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg"){
    if($ukuran_file <= 5000000){ 
      if(move_uploaded_file($tmp_file, $path)){ 
        $query = "insert into produk (idCategory, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, berat, stok_produk)
        values('$idCategory','$namaproduk','$pathdb','$deskripsi','$rate','$hargabefore','$hargaafter','$berat','$stok_produk')";
        $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

        if($sql){ 
          echo "<br><meta http-equiv='refresh' content='3; URL=../../manageProductContent.php'> You will be redirected to the form in 3 seconds";
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
  /*----------------Hapus------------*/


} else if(empty($kode) && empty($edit) ){
  $idHapus =$_GET['id'];
  mysqli_query($conn,"DELETE FROM produk WHERE idproduk = '$idHapus' ") or die(mysql_error());
  $message = "Berhasil dihapus";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header("location:../../manageProductContent.php");
  //kalo pas di hosting ga bisa hapus karena error masalahnya disini soalnya ada beberapa variable yang ga ada nilainya.
} 

/*----------------Edit------------*/





else if($kode == "edit"){
  $idUpdate = $_POST['idUpdate'];
  $gambarAsalProduk = $_POST['gambarAsalProduk'];

  $namaproduk=$_POST['namaproduk'];
  $idCategory=$_POST['idCategory'];
  $idproduk="";
  $deskripsi=$_POST['deskripsi'];
  $rate=$_POST['rate'];
  $hargabefore=$_POST['hargabefore'];
  $hargaafter=$_POST['hargaafter'];
  $berat=$_POST['berat'];
  $stok_produk=$_POST['stok_produk'];

  $nama_file = $_FILES['gambar']['name'];
  $ext = pathinfo($nama_file, PATHINFO_EXTENSION);
  $random = crypt($nama_file, time());
  $ukuran_file = $_FILES['gambar']['size'];
  $tipe_file = $_FILES['gambar']['type'];
  $tmp_file = $_FILES['gambar']['tmp_name'];
  $path2 = "../../produk/".$random.'.'.$ext;
  $pathdb2 = "../../produk/".$random.'.'.$ext;

  if (empty($nama_file)) {


    $query = "UPDATE produk SET idCategory='$idCategory', namaproduk = '$namaproduk', gambar='$gambarAsalProduk', deskripsi='$deskripsi',rate='$rate',hargabefore='$hargabefore', hargaafter='$hargaafter', berat='$berat', stok_produk='$stok_produk' where idproduk='$idUpdate'";
    $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
    header('location:../../manageProductContent.php');
  }else {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
      // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
      if($ukuran_file <= 2000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
        // Proses upload
        if(move_uploaded_file($tmp_file, $path2)){ // Cek apakah gambar berhasil diupload atau tidak
          // Jika gambar berhasil diupload, Lakukan : 
          // Proses simpan ke Database
          $query = "UPDATE produk SET idCategory='$idCategory', namaproduk = '$namaproduk', gambar='$pathdb2', deskripsi='$deskripsi',rate='$rate',hargabefore='$hargabefore', hargaafter='$hargaafter', berat='$berat', stok_produk='$stok_produk' where idproduk='$idUpdate'";
          $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
          
          if($sql){ // Cek jika proses simpan ke database sukses atau tidak
            // Jika Sukses, Lakukan :
            header("location: ../../manageProductContent.php"); // Redirectke halaman index.php
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