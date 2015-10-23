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
		  <th colspan="13" align="left" valign="top"><a href="#myAdd" title="Edit" role="button" class="btn btn-warning" data-toggle="modal">Tambah Data Vendor</a>
		</tr>
		<tr id='fn' >
		<td class="alert-info">No</td>
		<td class="alert-info">Id Vendor</td>
		<td class="alert-info">Nama Vendor</td>
		<td class="alert-info">Tentang Vendor</td>
		<td class="alert-info">Alamat Vendor </td>
		<td class="alert-info">Email Vendor</td>
		<td class="alert-info">Website</td>
		<td class="alert-info">Aksi</td>
	  </tr>
	</thead>
	<tbody>


	<?php
	include"../include/koneksi.php";
	$per_page = 5;
					$page_query = mysql_query("SELECT COUNT(*) FROM tb_vendor");
					$pages = ceil(mysql_result($page_query, 0) / $per_page);

					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_page;
					
					$no=1;
					$query = mysql_query("SELECT * FROM tb_vendor LIMIT $start, $per_page");
	$no=$posisi+1;				
	while($data7=mysql_fetch_array($query)){
	echo"<tr class='odd gradeU'>
		<td valign='top'>$no</td>
		<td valign='top'>$data7[id_vendor]</td>
		<td valign='top'>$data7[nama_vendor]</td>
		<td valign='top'>$data7[tentang_vendor]</td>
		<td valign='top'>$data7[alamat_vendor]</td>
		<td valign='top'>$data7[email_vendor]</td>
		<td valign='top'>$data7[website]</td>
		<td><div class=\"btn-group \">
		<a href=\"#myModalid$data7[id_vendor]\" title=\"Edit\" role=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\"><i class=\"icon-edit\"></i></a>
		<a href=\"fungsi_del_vendor.php?action=hapus_vendor&id_vendor=$data7[id_vendor]\" title=\"Hapus\" role=\"button\" class=\"btn btn-warning\"><i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data->nama_alat?')\"></i></a>
		
		</td>



	</tr>";
	$no++;
	$a=$data7['id_vendor']; 
	?>

<!--< edit data tipe>-->
	<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Edit Data Vendor </h3>
	  </div>
	  <div class="modal-body">
	  <form action="act_simpan_edit_vendor.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Id Vendor</label>
		<div class="field">
			<input name="id_vendor" type="text" readonly="readonly" value="<?php echo $data7['id_vendor']; ?>"  />
		</div>
		<label>Nama Vendor</label>
		<div class="field">
			<input name="nama_vendor" type="text" value="<?php echo $data7['nama_vendor']; ?>" />
		</div>		
		<label>Tentang Vendor</label>
		<div class="field">
			<textarea name="tentang_vendor" cols="25" id="spek"><?php echo$data7['tentang_vendor']; ?>
			</textarea>
		</div>		
		<label>Alamat Vendor</label>
		<div class="field">
			<input type="text"  name="alamat_vendor"  value="<?php echo$data7['alamat_vendor']; ?>"/>
		</div>		
		<label>Email</label>
		<div class="field">
			<input type="text"  name="email_vendor"  value="<?php echo$data7['email_vendor']; ?>"/>
		</div>
		<label>Website</label>
		<div class="field">
			<input type="text"  name="website"  value="<?php echo$data7['website']; ?>"/>
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
	 
	  <form action="act_insert_vendor.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Id Vendor</label>
		<div class="field">
			<input name="id_vendor" type="text" required="" />
		</div>
		<label>Nama Vendor</label>
		<div class="field">
			<input name="nama_vendor" type="text" required="" />
		</div>				
		<label>Tentang Vendor</label>
		<div class="field" required="">
			<textarea name="tentang_vendor" cols="25" id="spek">
			</textarea>
		</div>
		<label>Alamat Vendor</label>
		<div class="field">
			<input name="alamat_vendor" type="text" required="" />
		</div>
		<label>Email Vendor</label>
		<div class="field">
			<input name="email_vendor" type="text" required="" />
		</div>				
		<label>Website</label>
		<div class="field" required="">
		<input name="website" type="text" required="" />
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

