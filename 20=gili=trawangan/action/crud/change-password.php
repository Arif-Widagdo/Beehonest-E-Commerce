<?php
    include '../../API/koneksi.php';


    //proses ganti password
    $id        = $_POST['userId'];
    $password_lama    = $_POST['password_lama'];
    $password_baru    = $_POST['password_baru'];
    $konf_password    = $_POST['konf_password'];
    //cek old password

    $ambil = $conn->query("SELECT * FROM users WHERE id='$id' AND password='$password_lama'");
    // Mengecek akun yang cocok (email & password)
    $hasil = $ambil->num_rows;
    if (! $hasil >= 1) {
        echo "<script>alert('Password lama tidak sesuai');</script>";
        echo "<meta http-equiv='refresh' content='1;url=../../changepassword.php'>";
    }
    //validasi data data kosong
    else if (empty($_POST['password_baru']) || empty($_POST['konf_password'])) {
              
            echo "<script>alert('Ganti Password Gagal! Data Tidak Boleh Kosong.');</script>";
            echo "<meta http-equiv='refresh' content='1;url=../../changepassword.php'>";
        }
    //validasi input konfirm password
    else if (($_POST['password_baru']) != ($_POST['konf_password'])) { 
            echo "<script>alert('Ganti Password Gagal! Password dan Konfirm Password Harus Sama.');</script>";
            echo "<meta http-equiv='refresh' content='1;url=../../changepassword.php'>";
        }
    else {
    //update data
    
    $query = "UPDATE users SET password='$password_baru' WHERE id='$id'";
    $sql = mysqli_query ($conn, $query);
    //setelah berhasil update
    if ($sql) {
        echo "<script>alert('Ganti Password Berhasil!.');</script>";
        echo "<meta http-equiv='refresh' content='1;url=../../profile.php'>";   
    } else {
        echo "<script>alert('Ganti Password Gagal!.');</script>";
        echo "<meta http-equiv='refresh' content='1;url=../../changepassword.php'>";     
    }
    }
?>