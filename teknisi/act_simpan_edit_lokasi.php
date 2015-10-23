<?php
error_reporting(0);
include('../include/koneksi.php');


//tangkap data dari form registrasi
$Kode_Lokasi 	= $_POST['kode_lokasi'];
$Nama_Lokasi	= $_POST['nama_lokasi'];
$Rak_Lokasi	    = $_POST['rak_lokasi'];
$Spesifikasi_Lokasi	= $_POST['spesifikasi_lokasi'];

if (empty($Kode_Tipe)){
	$a=mysql_query("UPDATE tb_lokasi_brg_inv SET kode_lokasi='".$Kode_Lokasi."',nama_lokasi='".$Nama_Lokasi."',rak_lokasi='".$Rak_Lokasi."',spesifikasi_lokasi='".$Spesifikasi_Lokasi."' where kode_lokasi='".$Kode_Lokasi."' ");


}else{
$a=mysql_query("UPDATE tb_tipe_brg SET kode_tipe='".$Kode_Tipe."',nama_tipe='".$Nama_Tipe."',spesifikasi_tipe='".$Spesifikasi."' where kode_tipe='".$Kode_Tipe."' ");


}
	
print '<script>alert ("Update data alat Berhasil.."); window.location.href = "tampil_lokasi.php";</script>';
	


?>



