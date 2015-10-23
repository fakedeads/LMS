<?php

error_reporting(0);



include('../include/koneksi.php');


//tangkap data dari form registrasi
$Kode_Barang			= $_POST['kode_brg'];
$Nama_Barang			= $_POST['nama_brg'];
$Tipe_Barang			= $_POST['tipe_brg'];
$Spesifikasi_Barang		= $_POST['spesifikasi'];
$Tgl_Masuk				= $_POST['tgl_masuk'];
$Stok					= $_POST['stok_brg'];
$Satuan					= $_POST['satuan_brg'];
$Lokasi					= $_POST['lokasi_brg'];
$Ket_Barang				= $_POST['ket_brg'];
$Tgl_Hapus				= $_POST['tgl_hapus'];


//Lokasi folder produk
	$target = "img/foto_alat/"; 
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


$a=mysql_query("select kode_brg_inv from tb_barang_inventory where kode_brg_inv='".$Kode_Barang."' ");
$qa=mysql_num_rows($a);

if ($Kode_Barang==''||$Nama_Barang==''||$Tipe_Barang ==''|$Spesifikasi_Barang==''||$Tgl_Masuk==''||$Stok==''||$Satuan==''||$Lokasi==''||$Ket_Barang==''||$foto==''||$Tgl_Hapus=='')
{
	print '<script>alert ("Maaf Anda Harus Mengisi Semua Field "); window.location.href = "tampil_brg_inventaris.php";</script>';
}

elseif($qa > 0)
{
	print '<script>alert ("Maaf Kode Alat yang Anda Masukkan Sudah Ada "); window.location.href = "tampil_brg_inventaris.php";</script>';
}

else {
	//simpan data ke database
	
	$query2 = mysql_query("INSERT INTO `tb_barang_inventory` (
	`kode_brg_inv` ,
	`nama_brg_inv` ,
	`kode_tipe` ,
	`spesifikasi_brg_inv` ,
	`tgl_masuk_brg_inv` ,
	`stok_brg_inv` ,
	`satuan_brg_inv` ,
	`kode_lokasi`,
	`ket_brg_inv` ,
	`foto_brg_inv` ,
	`tgl_hapus_brg_inv` 
	)VALUES (
        '$Kode_Barang',
        '$Nama_Barang',
        '$Tipe_Barang',
        '$Spesifikasi_Barang',
        '$Tgl_Masuk',
        '$Stok',
        '$Satuan',
        '$Lokasi',
        '$Ket_Barang',
        '$foto',
        '$Tgl_Hapus'
	)");
	print '<script>alert ("Input data alat Berhasil.."); window.location.href = "tampil_brg_inventaris.php";</script>';
	print $query;
	}

  

?>
