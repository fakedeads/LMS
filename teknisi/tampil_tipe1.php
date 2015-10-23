<?php 
error_reporting(0);

?> 

	<tr>
		
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default" role="navigation">
							<li>
								 <a href="tampil_brg_inventaris.php"  class="btn"  style="list-style-type:none;">< Kembali ke data inventaris</a>	
							</li>
				</nav>
			</div>
		</div>
	</tr>

	<table class="table table-striped table-bordered">
	  <thead>
		<tr>
		  <th colspan="13" align="left" valign="top"><a href="#myAdd" title="Edit" role="button" class="btn btn-warning" data-toggle="modal">Tambah Data Tipe</a>
		</tr>
		<tr id='fn' >
		<td class="alert-info">No</td>
		<td class="alert-info">Kode Tipe</td>
		<td class="alert-info">Nama Tipe</td>
		<td class="alert-info">Spesifikasi</td>
		<td class="alert-info">Aksi</td>
	  </tr>
	</thead>
	<tbody>


	<?php
	include"../include/koneksi.php";
	$per_page = 5;
					$page_query = mysql_query("SELECT COUNT(*) FROM tb_tipe_brg");
					$pages = ceil(mysql_result($page_query, 0) / $per_page);

					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_page;
					
					$no=1;
					$query = mysql_query("SELECT * FROM tb_tipe_brg LIMIT $start, $per_page");
	$no=$posisi+1;				
	while($data7=mysql_fetch_array($query)){
	echo"<tr class='odd gradeU'>
		<td valign='top'>$no</td>
		<td valign='top'>$data7[kode_tipe]</td>
		<td valign='top'>$data7[nama_tipe]</td>
		<td valign='top'>$data7[spesifikasi_tipe]</td>
		<td><div class=\"btn-group \">
				
		<a href=\"#myModalid$data7[kode_tipe]\" title=\"Edit\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\"><i class=\"icon-edit\"></i></a>
		<a href=\"fungsi_del_tipe.php?action=hapus_tipe&kd_tipe=$data7[kode_tipe]\" title=\"Hapus\" role=\"button\" class=\"btn btn-warning\"><i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data->nama_tipe?')\"></i></a>
	
		</div>
		
		</td>



	</tr>";
	$no++;
	$a=$data7['kode_tipe']; 
	?>
	
	
	<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit DataTipe </h3>
  </div>
  <div class="modal-body">
  <form action="act_simpan_edit_tipe.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<label>Kode Alat</label>
	<div class="field">
		<input name="kode_tipe" type="text" readonly="readonly" value="<?php echo $data7['kode_tipe']; ?>"  />
	</div>
	<label>Nama Alat</label>
	<div class="field">
		<input name="nama_tipe" type="text" value="<?php echo $data7['nama_tipe']; ?>" />
	</div>		
	<label>Spesifikasi</label>
	<div class="field">
		<textarea name="spesifikasi" cols="25" id="spek"><?php echo$data7['spesifikasi_tipe']; ?>
		</textarea>
	</div>			
				
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
  	</form>
</div>

	

<!--< edit data tipe>-->
	<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Edit Data Tipe </h3>
	  </div>
	  <div class="modal-body">
	  
	  <form action="act_simpan_edit_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Kode Alat</label>
		<div class="field">
			<input name="kode_barang" type="text" readonly="readonly" value="<?php echo $data7['kode_tipe']; ?>"  />
		</div>
		<label>Nama Alat</label>
		<div class="field">
			<input name="nama_barang" type="text" value="<?php echo $data7['nama_tipe']; ?>" />
		</div>		
		<label>Spesifikasi</label>
		<div class="field">
			<textarea name="spesifikasi" cols="25" id="spek"><?php echo$data7['spesifikasi']; ?>
			</textarea>
		</div>		
		
					
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button class="btn btn-primary">Simpan</button>
	  </div>
		</form>
	</div>

<!--< tambah data tipe>-->

	<div id="myAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Tipe</h3>
	  </div>
	  <div class="modal-body">
	 
	  <form action="act_insert_tipe.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<label>Kode Tipe</label>
		<div class="field">
			<input name="kode_tipe" type="text" required="" />
		</div>
		<label>Nama Tipe</label>
		<div class="field">
			<input name="nama_tipe" type="text" required="" />
		</div>				
		<label>Spesifikasi</label>
		<div class="field" required="">
			<textarea name="spesifikasi" cols="25" id="spek">
			</textarea>
		</div>		
					
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
		<button class="btn btn-primary">Tambah</button>
	  </div>
		</form>
	</div>


	<?php
	}
	?>

	</tbody>
	</table>

	<div class="pagination pagination-small pagination-centered">
					<ul>
					  <?php
						if($pages >= 1 && $page <= $pages)
						{
						  for($x=1; $x<=$pages; $x++)
						  {
							if($x == $page)
								echo ' <li class="active"><a href="/page'.$x.'">'.$x.'</a></li>';
							else
								echo ' <li><a href="?page='.$x.'">'.$x.'</a></li>';
						  }
						}
						?>
					</ul>
				</div>

