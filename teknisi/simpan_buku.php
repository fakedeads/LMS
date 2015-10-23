<?php
	// Fungsi untuk Merubah susunan format tanggal
	function ubahformatTgl($tanggal) {
		$pisah = explode('/',$tanggal);
		$urutan = array($pisah[2],$pisah[1],$pisah[0]);
		$satukan = implode('-',$urutan);
		return $satukan;
	}
	
	// Ambil variabel dari form
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$tglterbit = $_POST['tglterbit'];
	
	// Cara penggunaan function ubahTgl
	$ubahtgl = ubahformatTgl($tglterbit);
	
	$konek = mysqli_connect("localhost","root","","latihan");
	$query = "INSERT INTO buku(judul,pengarang,tglterbit)
			VALUES('$judul','$pengarang','$ubahtgl')";
	$input = mysqli_query($konek, $query);
	
	if ($input){
		echo "Data Buku Berhasil Disimpan";
	}
	else {
		echo "Data Buku Gagal Disimpan";
	}
?>