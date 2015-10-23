<?php 
include"../include/koneksi.php";

$action = $_GET['action'];

switch ($action){
	case "hapus_tipe":
	$kd_tipe = $_GET['kd_tipe'];
	$query = "DELETE FROM tb_tipe_brg WHERE kode_tipe = '$kd_tipe'";
	$hasil = mysql_query($query);
	
	echo "<script>
			alert('Barang berhasil dihapus');
		setTimeout(function() { document.location.href='tampil_tipe.html';
		}, 1000);
		</script>";

	break;

}

?>