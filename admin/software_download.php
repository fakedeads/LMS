<?php
error_reporting(0);
include '../include/koneksi.php';
?>
<?php

		$softwareid = $_GET['id'];

		// membaca informasi file dari tabel berdasarkan id nya
		$query  = "SELECT * FROM tb_mdl_upload_software WHERE id = '$softwareid'";
		$hasil  = mysql_query($query);
		$data = mysql_fetch_array($hasil);
		$new_name = str_replace(" ", "", $data['software_name']);

		header('Content-Description: File Transfer');
		// header yang menunjukkan nama file yang akan didownload

		header("Content-Disposition: attachment; filename=".$new_name );

		// header yang menunjukkan ukuran file yang akan didownload

		header("Content-length: ". filesize($data['path']));

		// header yang menunjukkan jenis file yang akan didownload

		header("Content-type: ".$data['type']);

		header('Content-Transfer-Encoding: binary');
		ob_end_clean();
		$download = '../tatausaha/';
		$data = $data['path'];
		readfile($download.''.$data);
		exit;


?>