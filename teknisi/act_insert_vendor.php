<?php

include('../include/koneksi.php');

//tangkap data dari form registrasi
$Id_Vendor 	= $_POST['id_vendor'];
$Nama_Vendor	= $_POST['nama_vendor'];
$Tentang_Vendor	= $_POST['tentang_vendor'];
$Alamat_Vendor 	= $_POST['alamat_vendor'];
$Email_Vendor	= $_POST['email_vendor'];
$Website	= $_POST['website'];




$a=mysql_query("select id_vendor from tb_vendor where id_vendor='".$Id_Vendor."' ");
$qa=mysql_num_rows($a);

if ($Id_Vendor==''||$Nama_Vendor==''||$Tentang_Vendor==''||$Alamat_Vendor==''||$Email_Vendor==''||$Website=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "tampil_vendor.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Alat yang Anda Masukkan Sudah Ada "); window.location.href = "form_input_inventaris.php";</script>';
}

else {
//simpan data ke database
$query = mysql_query("INSERT INTO `tb_vendor` (
`id_vendor` ,
`nama_vendor` ,
`tentang_vendor`,
`alamat_vendor`,
`email_vendor`,
`website`
 
)
VALUES (
'$Id_Vendor','$Nama_Vendor','$Tentang_Vendor','$Alamat_Vendor','$Email_Vendor','$Website'
)");
	
	print '<script>alert ("Input data alat Berhasil.. "); window.location.href = "tampil_vendor.php";</script>';
	}

/* print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_inventaris.php";</script>'; */

?>
