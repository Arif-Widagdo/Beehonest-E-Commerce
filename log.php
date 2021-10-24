<?php 
// mengaktifkan session pada php
session_start();
date_default_timezone_set("Asia/Bangkok");
$timenow = date("j-F-Y-h:i:s A");
// menghubungkan php dengan koneksi database
include '20=gili=trawangan/Api/koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


  // Melakukan query pada tabel pelanggan
  $ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

  // Mengecek akun yang cocok (email & password)
  $akunyangcocok = $ambil->num_rows;

  // Jika ada akun yang cocok
  if($akunyangcocok == 1){
    // Mendapatkan aku dalam bentuk array
    $akun = $ambil->fetch_assoc();

    // Simpan di session
  $_SESSION['nama_pelanggan'] = $akun['nama_pelanggan'];
	$_SESSION['telpon_pelanggan'] = $akun['telepon_pelanggan'];
	$_SESSION['log'] = "Logged";


    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('Login Sukses!');</script>";

    // Jika sudah belanja
    if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
      echo "<meta http-equiv='refresh' content='1;url=checkout'>";
    }
    else{
      echo "<meta http-equiv='refresh' content='1;url=riwayat'>";
    }
  }
  else{
    // echo "<script>alert('Gagal login')</script>";
    // echo "<script>location='login.php';</script>";
    echo "<script>alert('Login gagal!');</script>";
		echo "<meta http-equiv='refresh' content='1;url=login'>";
  }


?>