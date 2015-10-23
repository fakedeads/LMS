<?php 
include"../include/koneksi.php";

$action = $_GET['action'];

switch ($action){
	case "hapus_vendor":
	$id_vendor = $_GET['id_vendor'];
	$query = "DELETE FROM tb_vendor WHERE id_vendor = '$id_vendor'";
	$hasil = mysql_query($query);
	
	echo "<script>
			alert('Barang berhasil dihapus');
		setTimeout(function() { document.location.href='tampil_vendor.html';
		}, 1000);
		</script>";

	break;

}

?>