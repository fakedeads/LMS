<?php

include('../include/koneksi.php');
//tangkap data dari form registrasi
$Kode_Lokasi 	= $_POST['kode_lokasi'];
$Nama_Lokasi	= $_POST['nama_lokasi'];
$Rak_Lokasi	    = $_POST['rak_lokasi'];
$Spesifikasi_Lokasi	= $_POST['spek_lokasi'];




$a=mysql_query("select kode_lokasi from tb_lokasi_brg_inv where kode_lokasi='".$Kode_Lokasi."' ");
$qa=mysql_num_rows($a);

if ($Kode_Lokasi==''||$Nama_Lokasi==''||$Rak_Lokasi==''||$Spesifikasi_Lokasi=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "tampil_lokasi.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Lokasi yang Anda Masukkan Sudah Ada "); window.location.href = "tampil_lokasi.php";</script>';
}

else {
//simpan data ke database
$query = mysql_query("INSERT INTO `tb_lokasi_brg_inv` (
`kode_lokasi` ,
`nama_lokasi` ,
`rak_lokasi` ,
`spesifikasi_lokasi` 
)
VALUES (
'$Kode_Lokasi','$Nama_Lokasi','$Rak_Lokasi','$Spesifikasi_Lokasi'
)");
	
	print '<script>alert ("Input data alat Berhasil.. "); window.location.href = "tampil_lokasi.php";</script>';
	}

/* print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_inventaris.php";</script>'; */

?>
