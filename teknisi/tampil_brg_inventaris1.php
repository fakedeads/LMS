<?php 
error_reporting(0);
?> 

<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Modal</title>
	  <link rel="stylesheet" href="bootstrap-3.3.1/css/bootstrap.min.css">
	  
	  <link type="text/css" rel="stylesheet" href="development-bundle/themes/ui-lightness/ui.all.css" />
		
		<script src="development-bundle/jquery-1.8.0.min.js"></script>
		<script src="development-bundle/ui/ui.core.js"></script>
		<script src="development-bundle/ui/ui.datepicker.js"></script>
		<script src="development-bundle/ui/i18n/ui.datepicker-id.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tglterbit").datepicker({
					dateFormat : "mm/dd/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tglterbit1").datepicker({
					dateFormat : "mm/dd/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
				<script type="text/javascript">
			$(document).ready(function(){
				$("#tglterbit2").datepicker({
					dateFormat : "mm/dd/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tglterbit3").datepicker({
					dateFormat : "mm/dd/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tglmasukedit").datepicker({
					dateFormat : "mm/dd/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tglhapusedit").datepicker({
					dateFormat : "mm/dd/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
	</head>




	<body>
	 	  
<!--Tamoilan Isi-->	
	<table class="table table-striped table-bordered">
	  <thead>



<!--Tampilan dropdown menu-->	  
		<tr>
		
		<div class="container-fluid" style="float: left;">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-default" role="navigation">
				
				
							<li class="dropdown">
								 <a href="#"  class="btn btn-warning" data-toggle="dropdown" style="list-style-type:none;">+ Tambah Barang<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
												<li>
													<a href="#myAdd" title="Edit" role="button" data-toggle="modal">Vendor</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="#myAddn" title="Edit" role="button" data-toggle="modal">Bukan Vendor</a>
												</li>
									</ul>
							</li>
					
					</nav>
					</div>
					</div>
					</div>
					
		<div class="container-fluid" style="float: left;">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default" role="navigation">
					
							<li class="dropdown" style="list-style-type:none;">
								 <a href="#" class="btn btn-warning" data-toggle="dropdown" >kelola<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
												<li>
													<a href="tampil_tipe.php" >Kelola Tipe</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="tampil_vendor.php" >Kelola Vendor</a>
												</li>
												<li class="divider">
												</li>
												<li>
													<a href="tampil_lokasi.php" >Kelola Lokasi</a>
												</li>
									</ul>
							</li>
					
					
		
					</nav>
					</div>
					</div>
					</div>
					
					
		</tr>

<!--Tampilan Tabel-->	
		<tr id='fn' >
		<td class="alert-info">No</td>
		<td class="alert-info">Kode </td>
		<td class="alert-info">Nama Barang</td>
		<td class="alert-info">Lokasi Barang</td>
		<td class="alert-info">Spesifikasi</td>
		<td class="alert-info">Stok</td>
		<td class="alert-info">Satuan</td>
		<td class="alert-info">Tanggal Masuk</td>
		<td class="alert-info">Foto</td>
		<td class="alert-info">Tanggal Penghapusan</td>
		<td class="alert-info">Aksi</td>
	  </tr>
	  

	  
	</thead>



	</body>
</html>

	 
<!--Menampilkan Isi Tabel-->
				<?php
				include"../include/koneksi.php";
				$per_page = 5;
								$page_query = mysql_query("SELECT COUNT(*) FROM tb_barang_inventory");
								$pages = ceil(mysql_result($page_query, 0) / $per_page);

								$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
								$start = ($page - 1) * $per_page;
								
								$no=1;
								$query = mysql_query("SELECT * FROM tb_barang_inventory LIMIT $start, $per_page");
				$no=$posisi+1;				
				while($data7=mysql_fetch_array($query)){
				echo"<tr class='odd gradeU'>
					<td valign='top'>$no</td>
					<td valign='top'>$data7[kode_brg_inv]</td>
					<td valign='top'>$data7[nama_brg_inv]</td>
					<td valign='top'>$data7[kode_lokasi]</td>
					<td valign='top'>$data7[spesifikasi_brg_inv]</td>
					<td valign='top'>$data7[stok_brg_inv]</td>
					<td valign='top'>$data7[satuan_brg_inv]</td>
					<td valign='top'>$data7[tgl_masuk_brg_inv]</td>
					<td valign='top'><img src=\"img/foto_alat/$data7[foto_brg_inv]\" width=\"150px\"></img></td>
					<td valign='top'>$data7[tgl_hapus_brg_inv]</td>
					<td><div class=\"btn-group \">
						<a href=\"#myModalid$data7[kode_brg_inv]\" 
								title=\"Edit\" 
								role=\"button\" 
								class=\"btn btn-warning\" 
								data-toggle=\"modal\">
								<i class=\"icon-edit\"></i>
						</a>
						<a href=\"detail_brg_inventaris.php?Kode_Brg_Inv=$data7[kode_brg_inv]\" 
								target=\"_blank\" 
								title=\"Detail\" 
								role=\"button\" 
								class=\"btn btn-warning\">
								<i class=\"icon-info-sign\"></i>
						</a>
						<a href=\"fungsi_del_brg_inv.php?action=hapus_brg_iventaris&kd_brg_inv=$data7[kode_brg_inv]\" 
								title=\"Hapus\" 
								role=\"button\" 
								class=\"btn btn-warning\">
								<i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data->nama_alat?')\"></i>
						</a>
						<a href=\"demo_brg_inv.php?Kode_Brg_Inv=$data7[kode_brg_inv]\"
								onClick=\"popup = window.open('demo_brg_inv.php?Kode_Brg_Inv=$data7[kode_brg_inv]', 'PopupPage', 'height=450,width=300,scrollbars=yes,resizable=yes'); return false\" 
								target=\"_blank\" 
								role=\"button\" 
								class=\"btn btn-warning\" 
								title=\"QR Code\"> 
								<i class=\"icon-qrcode\"></i>
						</a></div>
					</td>



				</tr>";
				$no++;
				$a=$data7['kode_brg_inv']; 
				?>

				
<!--tampilan form edit data barang-->

			<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Edit Data Barang Inventaris </h3>
			  </div>
			  <div class="modal-body">
			  <form action="act_simpan_edit_brg_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
				
				<label>Kode Barang</label>
				<div class="field">
					<input name="kode_brg" type="text" readonly="readonly" value="<?php echo $data7['kode_brg_inv']; ?>"/>
				</div>
				<label>Id Vendor</label>
				<div class="field">
					<input name="vendor_brg" type="text" value="<?php echo $data7['id_vendor']; ?>" />
				</div>
				<label>Nama Barang</label>
				<div class="field">
					<input name="nama_brg" type="text" value="<?php echo $data7['nama_brg_inv']; ?>" />
				</div>			
				<label>Tipe Barang</label>
				<div class="field">
					<input name="tipe_brg" type="text" value="<?php echo $data7['kode_tipe']; ?>" />
				</div>		
				<label>Spesifikasi Barang</label>
				<div class="field">
					<textarea name="spesifikasi" cols="25" id="spek"><?php echo$data7['spesifikasi_brg_inv']; ?>
					</textarea>
				</div>			
				<label>Tanggal Masuk</label>
				<div class="field">
					<input name="tgl_masuk" id="tglmasukedit" type="text" value="<?php echo $data7['tgl_masuk_brg_inv']; ?>" /></td></tr>
				</div>	
				<label>Stok</label>
				<div class="field">
					<input name="stok_brg" type="text" value="<?php echo $data7['stok_brg_inv']; ?>" >
				</div>		
				<label>Satuan</label>
				<div class="field" >
					<input name="satuan_brg" type="text" value="<?php echo $data7['satuan_brg_inv']; ?>" >
				</div>		
				<label>Lokasi</label>
				<div class="field">
					<input name="lokasi_brg" type="text" value="<?php echo $data7['kode_lokasi']; ?>" />
				</div>
				<label>Keterangan </label>
				<div class="field">
					<input name="ket_brg" type="text" value="<?php echo $data7['ket_brg_inv']; ?>" />
				</div>
					<label>Foto</label>
				<div class="field">
					<input type="file" name="foto" value="<?php echo $data7['foto_brg_inv']; ?>" />
				</div>
				<label>Tgl Hapus</label>
				<div class="field">
					<input name="tgl_hapus" id="tglhapusedit" type="text" value="<?php echo $data7['tgl_hapus_brg_inv']; ?>" /></td></tr>
				</div>
				
							
			 
				</div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
				<button class="btn btn-primary">Simpan</button>
			  </div>
				</form>
			</div>

			
<!--tampilan form tambah data barang vendor-->

			<div id="myAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Tambah Data Barang Vendor</h3>
			  </div>
			  <div class="modal-body">
			  <form action="act_insert_brg_inventaris.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
				
				<label>Id Vendor</label>
				<div class="field">
					<input name="vendor_brg" type="text" required="" />
				</div>
				<label>Kode Barang</label>
				<div class="field">
					<input name="kode_brg" type="text" required="" />
				</div>
				<label>Nama Barang</label>
				<div class="field">
					<input name="nama_brg" type="text" required="" />
				</div>			
				<label>Tipe Barang</label>
				<div class="field">
					<input name="tipe_brg" type="text" required="" />
				</div>		
				<label>Spesifikasi Barang</label>
				<div class="field" required="">
					<textarea name="spesifikasi" cols="25" id="spek">
					</textarea>
				</div>		
				<label>Tanggal Masuk</label>
				<div class="field">
					<input name="tgl_masuk" id="tglterbit" type="text" /></td></tr>
				</div>	
				<label>Stok</label>
				<div class="field">
					<input name="stok_brg" type="text" required="" >
				</div>		
				<label>Satuan</label>
				<div class="field" required="">
					<input name="satuan_brg" type="text" required="" >
				</div>		
				<label>Lokasi</label>
				<div class="field">
					<input name="lokasi_brg" type="text" required="" />
				</div>
				<label>Keterangan </label>
				<div class="field">
					<input name="ket_brg" type="text" required="" />
				</div>
					<label>Foto</label>
				<div class="field">
					<input type="file" name="foto" required="" />
				</div>
				<label>Tgl Hapus</label>
				<div class="field">
					<input name="tgl_hapus" id="tglterbit1" type="text" /></td></tr>
				</div>
				

				
				
				
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
				<button class="btn btn-primary">Simpan</button>
			  </div>
				</form>
			</div>



<!--tampilan form tambah data barang non vendor-->			

			<div id="myAddn" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Tambah Data Barang Non vendor</h3>
			  </div>
			  <div class="modal-body">
			   <form action="act_insert_brg_inventaris_n.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
				
				<label>Kode Barang</label>
				<div class="field">
					<input name="kode_brg" type="text" required="" />
				</div>
				<label>Nama Barang</label>
				<div class="field">
					<input name="nama_brg" type="text" required="" />
				</div>			
				<label>Tipe Barang</label>
				<div class="field">
					<input name="tipe_brg" type="text" required="" />
				</div>		
				<label>Spesifikasi Barang</label>
				<div class="field" required="">
					<textarea name="spesifikasi" cols="25" id="spek">
					</textarea>
				</div>		
				<label>Tanggal Masuk</label>
				<div class="field">
					<input name="tgl_masuk" id="tglterbit2" type="text" /></td></tr>
				</div>	
				<label>Stok</label>
				<div class="field">
					<input name="stok_brg" type="text" required="" >
				</div>		
				<label>Satuan</label>
				<div class="field" required="">
					<input name="satuan_brg" type="text" required="" >
				</div>		
				<label>Lokasi</label>
				<div class="field">
					<input name="lokasi_brg" type="text" required="" />
				</div>
				<label>Keterangan </label>
				<div class="field">
					<input name="ket_brg" type="text" required="" />
				</div>
				<label>Foto</label>
				<div class="field">
					<input type="file" name="foto" required="" />
				</div>
				<label>Tgl Hapus</label>
				<div class="field">
					<input name="tgl_hapus" id="tglterbit3" type="text" /></td></tr>
				</div>	
							
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
				<button class="btn btn-primary">Simpan</button>
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

