<?php
   require_once("Admin/Api/koneksi.php");
   $namalengkap = $_POST['namalengkap'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $notelp = $_POST['notelp'];
   $alamat = $_POST['alamat'];

   $role = 'Member';
   
   $sql = "SELECT * FROM user WHERE email = '$email'";
   $query = $conn->query($sql);

   if($query->num_rows != 0) {
     echo "<div align='center'>Username Sudah Terdaftar! <a href='register'>Back</a></div>";
   } else {
     if(!$namalengkap || !$email || !$password || !$notelp || !$alamat) {
       echo "<div align='center'>Masih ada data yang kosong! <a href='register'>Back</a>";
     } else {
        $tambahuser = mysqli_query($conn,"insert into user (namalengkap, email, password, notelp, alamat, role) 
        values('$namalengkap','$email','$password','$notelp','$alamat', '$role')");
       if($tambahuser) {
         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login'>Login</a></div>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
   }
?>

