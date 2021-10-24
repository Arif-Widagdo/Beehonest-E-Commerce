<?php
require_once('../../Api/koneksi.php');
$idAbout = $_POST['idAbout'];
$titleAbout = $_POST['titleAbout'];
$isiParagraf1 = $_POST['isiParagraf1'];
$isiParagraf2 = $_POST['isiParagraf2'];

$linkYoutube = $_POST['linkYoutube'];


 


mysqli_query($conn,"UPDATE about_content SET 
			titleAbout='$titleAbout',
			isiParagraf1='$isiParagraf1', 
			isiParagraf2='$isiParagraf2',
			linkYoutube = '$linkYoutube' 
			WHERE idAbout='$idAbout'");
header('location:../../KelolaContentHome.php#about');
?>