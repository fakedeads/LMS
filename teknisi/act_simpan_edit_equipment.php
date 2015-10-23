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

if (empty($foto)){
	$a=mysql_query("UPDATE tb_barang_equipment SET 
			
			kode_brg_eqp  ='".$Kode_Barang."' ,
			nama_brg_eqp ='".$Nama_Barang."' ,
			spesifikasi_brg_eqp ='".$Spesifikasi_Barang."' ,
			tgl_masuk_brg_eqp  ='".$Tgl_Masuk."',
			stok_brg_eqp ='".$Stok."' ,
			satuan_brg_eqp ='".$Satuan."' ,
			lokasi_brg_eqp ='".$Lokasi."',
			ket_brg_eqp ='".$Ket_Barang."'
			
			where kode_brg_eqp='".$Kode_Barang."' ");
			


}else{
$a=mysql_query("UPDATE tb_barang_equipment SET 
			
			kode_brg_eqp  ='".$Kode_Barang."' ,
			nama_brg_eqp ='".$Nama_Barang."' ,
			spesifikasi_brg_eqp ='".$Spesifikasi_Barang."' ,
			tgl_masuk_brg_eqp  ='".$Tgl_Masuk."',
			stok_brg_eqp ='".$Stok."' ,
			satuan_brg_eqp ='".$Satuan."' ,
			lokasi_brg_eqp ='".$Lokasi."',
			foto_brg_eqp ='".$foto."',
			ket_brg_eqp ='".$Ket_Barang."'
			
			where kode_brg_eqp='".$Kode_Barang."' ");


}
	
print '<script>alert ("Update data alat Berhasil.."); window.location.href = "tampil_brg_equipment.php";</script>';
	


?>