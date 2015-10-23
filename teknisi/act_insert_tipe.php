<?php

include('../include/koneksi.php');
//tangkap data dari form registrasi
$Kode_Tipe 	= $_POST['kode_tipe'];
$Nama_Tipe	= $_POST['nama_tipe'];
$Spesifikasi	= $_POST['spesifikasi'];




$a=mysql_query("select kode_tipe from tb_tipe_brg where kode_tipe='".$Kode_Tipe."' ");
$qa=mysql_num_rows($a);

if ($Kode_Tipe==''||$Nama_Tipe==''||$Spesifikasi=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "tampil_tipe.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Alat yang Anda Masukkan Sudah Ada "); window.location.href = "tampil_tipe.php";</script>';
}

else {
//simpan data ke database
$query = mysql_query("INSERT INTO `tb_tipe_brg` (
`kode_tipe` ,
`nama_tipe` ,
`spesifikasi_tipe` 
)
VALUES (
'$Kode_Tipe',  '$Nama_Tipe',  '$Spesifikasi'
)");
	
	print '<script>alert ("Input data alat Berhasil.. "); window.location.href = "tampil_tipe.php";</script>';
	}

/* print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_inventaris.php";</script>'; */

?>
