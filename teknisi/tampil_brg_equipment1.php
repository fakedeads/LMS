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
					dateFormat : "dd/mm/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#tglmasukedit").datepicker({
					dateFormat : "dd/mm/yy",
					changeMonth : true,
					changeYear : true
				});
			});
		</script>
	</head>




	<body>
</body>

</html>








<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th colspan="13" align="left" valign="top"><a href="#myAdd" title="Edit" role="button" class="btn btn-warning" data-toggle="modal">Tambah Data Inventaris</a>
    </tr>
    <tr id='fn' >
	<td class="alert-info">No</td>
		<td class="alert-info">Kode </td>
		<td class="alert-info">Nama Barang</td>
		<td class="alert-info">Lokasi Barang</td>
		<td class="alert-info">Stok</td>
		<td class="alert-info">Satuan</td>
		<td class="alert-info">Foto</td>
		<td class="alert-info">Aksi</td>
  </tr>
</thead>
<tbody>


<?php
include"../include/koneksi.php";
$per_page = 5;
				$page_query = mysql_query("SELECT COUNT(*) FROM tb_barang_equipment");
				$pages = ceil(mysql_result($page_query, 0) / $per_page);

				$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
				$start = ($page - 1) * $per_page;
				
				$no=1;
				$query = mysql_query("SELECT * FROM tb_barang_equipment LIMIT $start, $per_page");
$no=$posisi+1;				
while($data7=mysql_fetch_array($query)){
echo"<tr class='odd gradeU'>
	<td valign='top'>$no</td>
	<td valign='top'>$data7[kode_brg_eqp]</td>
	<td valign='top'>$data7[nama_brg_eqp]</td>
	<td valign='top'>$data7[lokasi_brg_eqp]</td>
	<td valign='top'>$data7[stok_brg_eqp]</td>
	<td valign='top'>$data7[satuan_brg_eqp]</td>
	<td valign='top'><img src=\"img/foto_alat/$data7[foto_brg_eqp]\" width=\"150px\"></img></td>
	<td>
		<div class=\"btn-group \">
			<a href=\"#myModalid$data7[kode_brg_eqp]\" 
						title=\"Edit\" 
						role=\"button\" 
						class=\"btn btn-warning\" 
						data-toggle=\"modal\">
						<i class=\"icon-edit\"></i>
			</a>
			<a href=\"detail_brg_equipment.php?Kode_Brg_Eqp=$data7[kode_brg_eqp]\" 
						target=\"_blank\" 
						title=\"Detail\" 
						role=\"button\" 
						class=\"btn btn-warning\">
						<i class=\"icon-info-sign\"></i>
			</a>
			<a href=\"fungsi_del_brg_eqp.php?action=hapus_brg_equipment&kd_brg_eqp=$data7[kode_brg_eqp]\" 
						title=\"Hapus\" 
						role=\"button\" 
						class=\"btn btn-warning\">
						<i class=\"icon-remove-sign\"  onClick=\"return confirm('Apakah anda akan menghapus $data->nama_alat?')\"></i>
			</a>
			<a href=\"demo.php?Kode_Alat=$data7[kode_alat]\"
					onClick=\"popup = window.open('demoinv.php?Kode_Alat=$data7[kode_alat]', 'PopupPage', 'height=450,width=300,scrollbars=yes,resizable=yes'); return false\" 
					target=\"_blank\" 
					role=\"button\" 
					class=\"btn btn-warning\" 
					title=\"QR Code\"> 
					<i class=\"icon-qrcode\"></i>
			</a>
		</div>
			
	</td>



</tr>";
$no++;
$a=$data7['kode_brg_eqp']; 
?>


<div id="myModalid<?php echo $a?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Data Alat </h3>
  </div>
  <div class="modal-body">
  <form action="act_simpan_edit_equipment.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<label>Kode Barang</label>
	<div class="field">
		<input name="kode_brg" type="text" readonly="readonly" value="<?php echo $data7['kode_brg_eqp']; ?>"  />
	</div>
	<label>Nama Barang</label>
	<div class="field">
		<input name="nama_brg" type="text" value="<?php echo $data7['nama_brg_eqp']; ?>" />
	</div>		
	<label>Spesifikasi</label>
	<div class="field">
		<textarea name="spesifikasi" cols="25" id="spek"><?php echo$data7['spesifikasi_brg_eqp']; ?>
		</textarea>
	</div>		
	<label>Tanggal Masuk</label>
	<div class="field">
		<input type="text"  id="tglmasukedit" name="tgl_masuk"  value="<?php echo$data7['tgl_masuk_brg_eqp']; ?>"/>
	</div>		
	
	<label>Stok</label>
	<div class="field">
		<input name="stok_brg" type="text" value="<?php echo$data7['stok_brg_eqp']; ?>" /></span>
	</div>		
	<label>Satuan</label>
	<div class="field">
		<label>
        <select name="satuan_brg">
		<option><?php echo$data7['satuan_brg_eqp']; ?></option>
          <option>set</option>
		  <option>unit</option>
		  <option>buah</option>
		  <option>lainnya</option>
        </select>
        </label>
	</div>		
	<label>Lokasi</label>
	<div class="field">
		<input name="lokasi_brg" type="text" value="<?php echo$data7['lokasi_brg_eqp']; ?>" />
	</div>
		<label>Foto</label>
	<div class="field">
		<input type="file" name="foto" value="<?php echo$data7['foto_brg_eqp']; ?>" />
	</div>	
	<label>Keterangan</label>
	<div class="field">
		<input name="ket_brg" type="text" value="<?php echo$data7['ket_brg_eqp']; ?>" />
	</div>
	
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
  	</form>
</div>

<!--< tambah data barang equipment>-->

	<div id="myAdd" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Tambah Data Equipment</h3>
	  </div>
	  <div class="modal-body">
	 
	  <form action="act_insert_brg_eqp.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
		<label>Kode Barang</label>
		<div class="field">
			<input name="kode_brg" type="text" required="" />
		</div>
		<label>Nama Barang</label>
		<div class="field">
			<input name="nama_brg" type="text" required="" />
		</div>							
		<label>Spesifikasi</label>
		<div class="field" required="">
			<textarea name="spesifikasi" cols="25" id="spek">
			</textarea>
		</div>
		<label>Tanggal Masuk</label>
		<div class="field">
			<input name="tgl_masuk" type="text" id="tglterbit" />
		</div>
		<label>Stok Barang</label>
		<div class="field">
			<input name="stok_brg" type="text" required="" />
		</div>	
		<label>Satuan Barang</label>
		<div class="field">
			<input name="satuan_brg" type="text" required="" />
		</div>		
		<label>Lokasi Barang</label>
		<div class="field">
			<input name="lokasi_brg" type="text" required="" />
		</div>
		<label>Foto</label>
		<div class="field">
			<input type="file" name="foto" required="" />
		</div>
		<label>Ket Barang</label>
		<div class="field">
			<input name="ket_brg" type="text" required="" />
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

