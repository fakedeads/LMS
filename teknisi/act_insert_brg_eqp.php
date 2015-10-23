<?php

error_reporting(0);



include('../include/koneksi.php');


//tangkap data dari form registrasi
$Kode_Barang			= $_POST['kode_brg'];
$Nama_Barang			= $_POST['nama_brg'];
$Spesifikasi_Barang		= $_POST['spesifikasi'];
$Tgl_Masuk				= $_POST['tgl_masuk'];
$Stok					= $_POST['stok_brg'];
$Satuan					= $_POST['satuan_brg'];
$Lokasi					= $_POST['lokasi_brg'];
$Ket_Barang				= $_POST['ket_brg'];


//Lokasi folder produk
	$target = "img/foto_alat_eqp/"; 
	$target = $target . basename( $_FILES['foto']['name']); 

	// membaca nama file
	$foto = $_FILES['foto']['name'];
	
	// memindahkan foto ke folder foto_mahasiswa   
	move_uploaded_file($_FILES['foto']['tmp_name'], $target);

	// membaca nama file temporary
	$tmpName  = $_FILES['foto']['tmp_name'];
	 
	// membaca size file
	$fileSize = $_FILES['foto']['size'];
	 
	// membaca tipe file
	$fileType = $_FILES['foto']['type'];


$a=mysql_query("select kode_brg_eqp from tb_barang_equipment where kode_brg_eqp='".$Kode_Barang."' ");
$qa=mysql_num_rows($a);

if ($Kode_Barang==''||$Nama_Barang==''||$Spesifikasi_Barang==''||$Tgl_Masuk==''||$Stok==''||$Satuan==''||$Lokasi==''||$Ket_Barang==''||$foto=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "tampil_brg_equipment.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Alat yang Anda Masukkan Sudah Ada "); window.location.href = "tampil_brg_equipment.php";</script>';
}

else {
	//simpan data ke database
	
	$query2 = mysql_query("INSERT INTO `tb_barang_equipment` (
	`kode_brg_eqp` ,
	`nama_brg_eqp` ,
	`spesifikasi_brg_eqp` ,
	`tgl_masuk_brg_eqp` ,
	`stok_brg_eqp` ,
	`satuan_brg_eqp` ,
	`lokasi_brg_eqp`,
	`foto_brg_eqp` ,
	`ket_brg_eqp` 
	)VALUES (
        '$Kode_Barang',
        '$Nama_Barang',
        '$Spesifikasi_Barang',
        '$Tgl_Masuk',
        '$Stok',
        '$Satuan',
        '$Lokasi',
        '$foto',
        '$Ket_Barang'
	)");
	print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_brg_equipment.php";</script>';
	print $query;
	}

  

?>
