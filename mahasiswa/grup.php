<?php
	require'template/header.php';
	$kode=md5($data['username']);
?>
    
<div class="main">
  <div class="main-inner">
    <div class="container">
    	<div class="row">
			<div class="span3">
		    		<div class="widget-header"> 
		    			<i class="icon-list-alt"></i> 
		    			<H3>List Grup</H3>
				 	</div>
					<div class="widget-content">
						<ul class="nav nav-tabs nav-stacked">
							<?php
								$query=mysql_query("SELECT * FROM tb_grup_member where id_mhs_dsn='$nim' and status_member='bergabung'");
									while($row = mysql_fetch_array($query)) {
								?>
						  			<li>
						  				<a href="grup_detail.html?v=<?php echo $row['kode_grup'] ?>">
						  					<?php 
												$kode_grup_list = $row['kode_grup']; 
								   				$ambil=mysql_query( "SELECT * from tb_grup WHERE kode_grup='$kode_grup_list'");
								   				$nama_grup = mysql_fetch_assoc($ambil); 
								   				echo $nama_grup['nama_grup'];
											?>
						  				</a>
						  			</li>
						  			<?php 
									}
								?>
						</ul>
					</div>
			</div> <!-- /span3 -->
			<div class="span9">

    			<div class="widget-header"> <i class="icon-group"></i>
		            <h3>Halaman Grup</h3>
		        </div>
		            <!-- /widget-header -->
		        <div class="widget-content">
		        	<div id="infoGrup">
		        		<div class="row-fluid">
			        		<div class="span9"><H3>List Grup Baru</H3></div>
			        		
			        	</div>
			        	<form action="action.php?action=join_grup" method='post'>
			        	<table class="table table-striped table-bordered">
								<thead>
								  <tr>
									<td class="alert alert-info"> Nama Grup </td>
									<td class="alert alert-info"> Anggota </td>
									<td class="alert alert-info"> Admin </td>
									<td class="alert alert-info aksi"> Aksi </td>
									
								  </tr>
								</thead>
								<tbody>
									<!-- view data grup status dosen -->
								<?php
									$hasil=mysql_query("SELECT * FROM tb_grup_member_dsn");
									    while($row = mysql_fetch_array($hasil)){
						  
								?>
								  <tr>	
									<td> 
										<?php 
											$kode_grup_dosen = $row['kode_grup']; 
							   				$ambil=mysql_query( "SELECT * from tb_grup WHERE kode_grup='$kode_grup_dosen'");
							   				$nama_grup = mysql_fetch_assoc($ambil); 
							   				echo $nama_grup['nama_grup'];
										?> 
									</td>
									<td> 
										<?php
							   				$jumlah=mysql_query( "SELECT COUNT(status_member) from tb_grup_member WHERE status_member='bergabung' and kode_grup='$kode_grup_dosen'");
							   				$total_member = mysql_fetch_assoc($jumlah);
							   				$jumlah_dsn=mysql_query( "SELECT COUNT(status_member) from tb_grup_member_dsn WHERE status_member='bergabung' and kode_grup='$kode_grup_dosen'");
							   				$total_member_dsn = mysql_fetch_assoc($jumlah_dsn); 

							   				$total = $total_member['COUNT(status_member)'] + $total_member_dsn['COUNT(status_member)'];
							   				echo $total;
									 	?>
									</td>
									<td> 
										<?php
											$ambil_id_dosen=mysql_query("SELECT * from tb_grup_member_dsn where kode_grup='$kode_grup_dosen' and level_member='admin'");
											$id_dosen= mysql_fetch_assoc($ambil_id_dosen);
											$dosen_nid = $id_dosen['id_mhs_dsn'];
											$ambil_nama=mysql_query("SELECT * from tb_dosen where nid='$dosen_nid'");
											$nama_dosen= mysql_fetch_assoc($ambil_nama);
											echo $nama_dosen['nama_dosen'];
										?> 
									</td>
									<td class="aksi">
										<input type="text" name="nim" value="<?php echo $nim ;?>" style="display:none;">
										<input type="text" name="kode_grup" value="
										<?php echo $kode_grup_dosen ;?>" style="display:none;">

										<button class="btn btn-small btn-success" type="submit"><i class="icon-ok-sign" title="Join"></i> Join</button>
										
									</td>
								  </tr>
								  <?php
									  		
										
									}
								?>
								</tbody>
						</table>
						</form>
						<div class="row-fluid">
			        		<div class="span12"><H3>Menunggu Persetujuan</H3></div>
			        	</div>
				        <form action="action.php?action=update_member_grup" method='post'>
				        	<table class="table table-striped table-bordered">
									<thead>
									  <tr>
										<td class="alert alert-info"> Nama Grup</td>
										<td class="alert alert-info"> Status </td>
										
									  </tr>
									</thead>
									<tbody>
									<?php	
											$hasil=mysql_query("SELECT * FROM tb_grup_member where id_mhs_dsn='$nim' and status_member='pending' ");
										    while($row = mysql_fetch_array($hasil)) {
									?>
											     
									<tr>
										<td>
											<input type="text" name="kode_grup" value="<?php echo $row['kode_grup'];?>" style="display:none;">
											<?php 
												$kode_grup = $row['kode_grup']; 
								   				$ambil=mysql_query( "SELECT * from tb_grup WHERE kode_grup='$kode_grup'");
								   				$nama_grup = mysql_fetch_assoc($ambil); 
								   				echo $nama_grup['nama_grup'];
											?> 
										</td>
										<td> <?php echo $row['status_member']; ?> </td>
										<!-- <td class="aksi">
											<button class="btn btn-small btn-success" type="submit"><i class="icon-ok-circle" title="Approve"></i> Setujui</button>
											</form>
											<form class="delete_member" action="action.php?action=delete_member_grup" method='post'>
												<input type="text" name="nim_mhs" value="<?php echo $row['nim_mhs'];?>" style="display:none;">
												<input type="text" name="kode_grup" value="<?php echo $row['kode_grup'];?>" style="display:none;">
												<button class="btn btn-small btn-danger" type="submit"><i class="icon-remove-circle" title="Delete"></i> Hapus</button>
											</form>
										</td> -->
									</tr>
									<tr>
										<?php
												}
										?>
									</tr>
										
									</tbody>
							</table>
						
		        	</div>
		        	<div id="loading"></div>
              		<div id="buatGrup"></div>
              		<div id="detailGrup"></div>
		        </div><!-- /widget content --> 
          </div><!-- /SPAN 9 -->
      	</div> <!-- /row -->  
    <!-- /container --> 

  </div>
  <!-- /main-inner --> 
  <div class="spasi-footer"></div>
</div>

<?php
	require'template/footer.php';
?>