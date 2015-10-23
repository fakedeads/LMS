<?php
// panggil berkas koneksi.php
require 'include/koneksi.php';
?>
<div class="widget-content">
<table class="table table-striped table-bordered">
<thead>
	<tr>
		<th> No </th>
		<th width="11%">Foto</th>
		<th> NIM </th>
		<th> Nama </th>
		<th> Prodi </th>
		<th> Semester </th>
		<th> Email </th>
		<th> No Handphone </th>
	</tr>
</thead>
<tbody>
	<?php
		$i = 1;
		$jml_per_halaman = 8; // jumlah data yg ditampilkan perhalaman
		$jml_data = mysql_num_rows(mysql_query("SELECT * FROM tb_mahasiswa"));
		$jml_halaman = ceil($jml_data / $jml_per_halaman);
		// query pada saat mode pencarian
		if(isset($_POST['cari'])) {
			$kunci = $_POST['cari'];
			echo "<strong>Hasil pencarian untuk kata kunci : $kunci</strong>";
			$query = mysql_query("
				SELECT * FROM tb_mahasiswa
				WHERE nim LIKE '%$kunci%'
				OR nama_mhs LIKE '%$kunci%'
				OR hp LIKE '%$kunci%'
				OR email LIKE '%$kunci%'
				OR status LIKE '%$kunci%'
			");
		// query jika nomor halaman sudah ditentukan
		} elseif(isset($_POST['halaman'])) {
			$halaman = $_POST['halaman'];
			$i = ($halaman - 1) * $jml_per_halaman  + 1;
			$query = mysql_query("SELECT * FROM tb_mahasiswa LIMIT ".(($halaman - 1) * $jml_per_halaman).", $jml_per_halaman");
		// query ketika tidak ada parameter halaman maupun pencarian
		} else {
			$query = mysql_query("SELECT * FROM tb_mahasiswa LIMIT 0, $jml_per_halaman");
		}

		// tampilkan data mahasiswa selama masih ada
		while($data = mysql_fetch_array($query)) {
			if($data['status']==1) {
				$status = "Aktif";
			} else {
				$status = "Tidak Aktif";
			}
	//Filter no HP
	$datahp=$data['hp'];
	$datahpx=substr($datahp,0, 8);
	?>
	<tr>
		<td class="alert alert-success"> <?php echo $i ?> </td>
		<td class="alert alert-success"><img src="mahasiswa/foto_mahasiswa/<?php echo $data['foto']?>" width=100 height=100 title="<?php echo $data['nama']?>" class="img-thumbnail"></td>
		<td class="alert alert-success"> <?php echo $data['nim']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['nama']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['jurusan']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['semester']; ?> </td>
		<td class="alert alert-success"> <?php echo $data['email']; ?> </td>
		<td class="alert alert-success"> <?php echo $datahpx . "xxx";?> </td>
	</tr>
	<?php
		$i++;
		}
	?>
</tbody>
</table>
<?php if(!isset($_POST['cari'])) { ?>
<!-- untuk menampilkan menu halaman -->
<div class="pagination pagination-right">
  <ul>
    <?php for($i = 1; $i <= $jml_halaman; $i++) { ?>
    <li class="halaman" id="<?php echo $i ?>"><a href="#"><?php echo $i ?></a></li>
    <?php } ?>
  </ul>
</div>
</div>
<?php } ?>
<br>
