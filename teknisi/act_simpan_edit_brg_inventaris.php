<?php
error_reporting(0);
include('../include/koneksi.php');

//tangkap data dari form registrasi
$Id_Vendor				= $_POST['vendor_brg'];
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

if (empty($foto)){
	$a=mysql_query("UPDATE tb_barang_inventory SET 
			
			kode_brg_inv ='".$Kode_Barang."',
			id_vendor	='".$Id_Vendor."' ,
			nama_brg_inv ='".$Nama_Barang."',
			kode_tipe ='".$Tipe_Barang."',
			spesifikasi_brg_inv ='".$Spesifikasi_Barang."',
			tgl_masuk_brg_inv ='".$Tgl_Masuk."',
			stok_brg_inv ='".$Stok."',
			satuan_brg_inv ='".$Satuan."',
			kode_lokasi ='".$Lokasi."',
			ket_brg_inv ='".$Ket_Barang."',
			tgl_hapus_brg_inv ='".$Tgl_Hapus."'
			 
			where kode_brg_inv='".$Kode_Barang."' ");


}else{
$a=mysql_query("UPDATE tb_barang_inventory SET 
			
			kode_brg_inv ='".$Kode_Barang."',
			id_vendor	='".$Id_Vendor."' ,
			nama_brg_inv ='".$Nama_Barang."',
			kode_tipe ='".$Tipe_Barang."',
			spesifikasi_brg_inv ='".$Spesifikasi_Barang."',
			tgl_masuk_brg_inv ='".$Tgl_Masuk."',
			stok_brg_inv ='".$Stok."',
			satuan_brg_inv ='".$Satuan."',
			kode_lokasi ='".$Lokasi."',
			ket_brg_inv ='".$Ket_Barang."',
			foto_brg_inv ='".$foto."',
			tgl_hapus_brg_inv ='".$Tgl_Hapus."'
			 
			where kode_brg_inv='".$Kode_Barang."' ");


}
	
print '<script>alert ("Update data alat Berhasil.."); window.location.href = "tampil_brg_inventaris.php";</script>';
	


?>