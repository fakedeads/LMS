<?php
error_reporting(0);
include('../include/koneksi.php');


//tangkap data dari form registrasi
$Id_Vendor 	= $_POST['id_vendor'];
$Nama_Vendor	= $_POST['nama_vendor'];
$Tentang_Vendor	= $_POST['tentang_vendor'];
$Alamat_Vendor 	= $_POST['alamat_vendor'];
$Email_Vendor	= $_POST['email_vendor'];
$Website	= $_POST['website'];

if (empty($Id_Vendor)){
	$a=mysql_query("UPDATE tb_vendor SET id_vendor='".$Id_Vendor."',nama_vendor='".$Nama_Vendor."',tentang_vendor='".$Tentang_Vendor."',alamat_vendor='".$Alamat_Vendor."' ,email_vendor='".$Email_Vendor."',website='".$Website."' where id_vendor='".$Id_Vendor."' ");


}else{
$a=mysql_query("UPDATE tb_vendor SET id_vendor='".$Id_Vendor."',nama_vendor='".$Nama_Vendor."',tentang_vendor='".$Tentang_Vendor."',alamat_vendor='".$Alamat_Vendor."',email_vendor='".$Email_Vendor."',website='".$Website."' where id_vendor='".$Id_Vendor."' ");


}
	
print '<script>alert ("Update data alat Berhasil.."); window.location.href = "tampil_vendor.php";</script>';
	


?>