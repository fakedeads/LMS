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
		  <th colspan="13" align="left" valign="top"><a href="#myAdd" title="Edit" role="button" class="btn btn-warning" data-toggle="modal">Tambah Data Loaksi</a>
		</tr>
		<tr id='fn' >
		<td class="alert-info">No</td>
		<td class="alert-info">Kode Lokasi</td>
		<td class="alert-info">Nama Loaksi</td>
		<td class="alert-info">Lokasi Rak</td>
		<td class="alert-info">Spesifikasi Loaksi </td>
		<td class="alert-info">Aksi</td>
	  </tr>
	</thead>
	<tbody>


	<?php
	include"../include/koneksi.php";
	$per_page = 5;
					$page_query = mysql_query("SELECT COUNT(*) FROM tb_lokasi_brg_inv");
					$pages = ceil(mysql_result($page_query, 0) / $per_page);

					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_page;
					
					$no=1;
					$query = mysql_query("SELECT * FROM tb_lokasi_brg_inv LIMIT $start, $per_page");
	$no=$posisi+1;				
	while($data7=mysql_fetch_array($query)){
	echo"<tr class='odd gradeU'>
		<td valign='top'>$no</td>
		<td valign='top'>$data7[kode_lokasi]</td>
		<td valign='top'>$data7[nama_lokasi]</td>
		<td valign='top'>$data7[rak_lokasi]</td>
		<td valign='top'>$data7[spesifikasi_lokasi]</td>
		<td><div class=\"btn-group \">
				
		<a href=\"#myModalid$data7[kode_lokasi]\" title=\"Edit\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\"><i class=\"icon-edit\"></i></a>
		<a href=\"fungsi_del_lokasi.php?action=hapus_lokasi&kd_lokasi=$data7[kode_lokasi]\" title=\"Hapus\" role=\"button\" class=\"btn btn-warning\"><i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data->nama_tipe?')\"></i></a>
	
		</div>
		
		</td>



	</tr>";
	$no++;
	$a=$data7['kode_lokasi']; 
	?>

<!--< edit data tipe>-->
	<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Edit Data Lokasi </h3>
	  </div>
	  <div class="modal-body">
	  <form action="act_simpan_edit_lokasi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Kode Lokasi</label>
		<div class="field">
			<input name="kode_lokasi" type="text" readonly="readonly" value="<?php echo $data7['kode_lokasi']; ?>"  />
		</div>
		<label>Nama Lokasi</label>
		<div class="field">
			<input name="nama_lokasi" type="text" value="<?php echo $data7['nama_lokasi']; ?>" />
		</div>	
		<label>Lokasi Rak</label>
		<div class="field">
			<input name="rak_lokasi" type="text" value="<?php echo $data7['rak_lokasi']; ?>" />
		</div>	
		<label>Spesifikasi</label>
		<div class="field">
			<textarea name="spesifikasi_lokasi" cols="25" id="spek"><?php echo$data7['spesifikasi_lokasi']; ?>
			</textarea>
		</div>		
					
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save changes</button>
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
	 
	  <form action="act_insert_lokasi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Kode Lokasi</label>
		<div class="field">
			<input name="kode_lokasi" type="text" required="" />
		</div>
		<label>Nama Lokasi</label>
		<div class="field">
			<input name="nama_lokasi" type="text" required="" />
		</div>	
		<label>Lokasi Rak</label>
		<div class="field">
			<input name="rak_lokasi" type="text" required="" />
		</div>						
		<label>Spesifikasi Lokais</label>
		<div class="field" required="">
			<textarea name="spek_lokasi" cols="25" id="spek">
			</textarea>
		</div>
		</div>		
					
	
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save</button>
	  </div>
		</form>
	</div>
	</div>
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

