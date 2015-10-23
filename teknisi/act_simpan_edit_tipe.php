<?php
error_reporting(0);
include('../include/koneksi.php');


//tangkap data dari form registrasi
$Kode_Tipe 	= $_POST['kode_tipe'];
$Nama_Tipe	= $_POST['nama_tipe'];
$Spesifikasi	= $_POST['spesifikasi'];

if (empty($Kode_Tipe)){
	$a=mysql_query("UPDATE tb_tipe_brg SET kode_tipe='".$Kode_Tipe."',nama_tipe='".$Nama_Tipe."',spesifikasi_tipe='".$Spesifikasi."' where kode_tipe='".$Kode_Tipe."' ");


}else{
$a=mysql_query("UPDATE tb_tipe_brg SET kode_tipe='".$Kode_Tipe."',nama_tipe='".$Nama_Tipe."',spesifikasi_tipe='".$Spesifikasi."' where kode_tipe='".$Kode_Tipe."' ");


}
	
print '<script>alert ("Update data alat Berhasil.."); window.location.href = "tampil_tipe.php";</script>';
	


?>