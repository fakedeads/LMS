<?php 
include"../include/koneksi.php";

$action = $_GET['action'];

switch ($action){
	case "hapus_brg_iventaris":
	$kd_brg_inv = $_GET['kd_brg_inv'];
	$query = "DELETE FROM tb_barang_inventory WHERE kode_brg_inv = '$kd_brg_inv'";
	$hasil = mysql_query($query);
	
	echo "<script>
			alert('Barang berhasil dihapus');
		setTimeout(function() { document.location.href='tampil_brg_inventaris.html';
		}, 1000);
		</script>";

	break;

}

?>