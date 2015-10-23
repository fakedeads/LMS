<?php 
include"../include/koneksi.php";

$action = $_GET['action'];

switch ($action){
	case "hapus_brg_equipment":
	$kd_brg_eqp = $_GET['kd_brg_eqp'];
	$query = "DELETE FROM tb_barang_equipment WHERE kode_brg_eqp = '$kd_brg_eqp'";
	$hasil = mysql_query($query);
	
	echo "<script>
			alert('Barang berhasil dihapus');
		setTimeout(function() { document.location.href='tampil_brg_equipment.html';
		}, 1000);
		</script>";

	break;

}

?>