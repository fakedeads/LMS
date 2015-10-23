<?php 
include"../include/koneksi.php";

$action = $_GET['action'];

switch ($action){
	case "hapus_lokasi":
	$kd_lokasi = $_GET['kd_lokasi'];
	$query = "DELETE FROM tb_lokasi_brg_inv WHERE kode_lokasi = '$kd_lokasi'";
	$hasil = mysql_query($query);
	
	echo "<script>
			alert('Barang berhasil dihapus');
		setTimeout(function() { document.location.href='tampil_lokasi.html';
		}, 1000);
		</script>";

	break;

}

?>