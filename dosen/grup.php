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
				                $query=mysql_query("SELECT * FROM tb_grup_member_dsn d WHERE d.id_mhs_dsn='$nid' and status_member ='bergabung' UNION ALL SELECT * FROM tb_grup_member m WHERE m.id_mhs_dsn='$nid' and status_member ='bergabung'");
				                    while($row = mysql_fetch_array($query)) { 
				                ?>
				                    <li>
				                      <a href="grup_detail.html?v=<?php echo $row['kode_grup'] ?>">
				                        <?php 
				                        $kode_grup = $row['kode_grup']; 
				                          $ambil=mysql_query( "SELECT * from tb_grup WHERE kode_grup='$kode_grup'");
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
			        		<div class="span9"><H3>Grup</H3></div>
			        		<div id="createGrup" class="span3">
			        			<a class="btn btn-primary" href="buat_grup_baru.html?add=<?php echo $kode ?>"><i class="icon-plus"></i> Buat Grup</a>
			        		</div>
			        	</div>

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
								
									$hasil=mysql_query("SELECT * FROM tb_grup_member_dsn where id_mhs_dsn='$nid'");
									    while($row = mysql_fetch_array($hasil)) {
									?>
								  <tr>	
									<td> 
										<?php 
											$kode_grup = $row['kode_grup']; 
							   				$ambil=mysql_query( "SELECT * from tb_grup WHERE kode_grup='$kode_grup'");
							   				$nama_grup = mysql_fetch_assoc($ambil); 
							   				echo $nama_grup['nama_grup'];
										?> 
									</td>
									<td> 
										<?php
											$status_member = $row['status_member'];

							   				$jumlah=mysql_query( "SELECT COUNT(status_member) from tb_grup_member WHERE status_member='$status_member' and kode_grup='$kode_grup'");
							   				$total_member = mysql_fetch_assoc($jumlah);
							   				$jumlah_dsn=mysql_query( "SELECT COUNT(status_member) from tb_grup_member_dsn WHERE status_member='$status_member' and kode_grup='$kode_grup'");
							   				$total_member_dsn = mysql_fetch_assoc($jumlah_dsn); 

							   				$total = $total_member['COUNT(status_member)'] + $total_member_dsn['COUNT(status_member)'];
							   				echo $total;
									 	?>
									</td>
									<td> 
										<?php 
											$level_member= $row['level_member'];
											$ambil_id_dosen=mysql_query("SELECT * from tb_grup_member_dsn where kode_grup='$kode_grup' and level_member='$level_member'");
											$id_dosen= mysql_fetch_assoc($ambil_id_dosen);
											$dosen_nid = $id_dosen['id_mhs_dsn'];
											$ambil_nama=mysql_query("SELECT * from tb_dosen where nid='$dosen_nid'");
											$nama_dosen= mysql_fetch_assoc($ambil_nama);
											echo $nama_dosen['nama_dosen'];
										?> 
									</td>
									<td class="aksi"><a href="grup_edit.html?a=<?php echo $row['kode_grup'] ?>" class="btn btn-small btn-warning"><i class="icon-edit" title="Modul Praktikum"> Edit</i></a></td>
								  </tr>
								  <?php 
									}
								?>
								</tbody>
						</table>

						<div class="row-fluid">
			        		<div class="span12"><H3>Menunggu Persetujuan</H3></div>
			        	</div>
				        <form action="action.php?action=update_member_grup" method='post'>
				        	<table class="table table-striped table-bordered">
									<thead>
									  <tr>
										<td class="alert alert-info"> Nama Anggota </td>
										<td class="alert alert-info"> Nama Grup </td>
										<td class="alert alert-info"> Status </td>
										<td class="alert alert-info aksi"> Aksi </td>
										
									  </tr>
									</thead>
									<tbody>
									<?php
										$ambil_kode_grup=mysql_query("SELECT * FROM tb_grup_member_dsn where id_mhs_dsn='$nid'");
										while ($kode_grup= mysql_fetch_assoc($ambil_kode_grup)) {
											$get_kode_grup= $kode_grup['kode_grup'];
											
											$hasil=mysql_query("SELECT * FROM tb_grup_member where kode_grup='$get_kode_grup' and status_member='pending' ");
/*
											if(empty($row = mysql_fetch_assoc($hasil))){
															echo "Belum ada Mahasiswa yang ingin bergabung";
											    }else{*/
										    while($row = mysql_fetch_array($hasil)) {
									?>
											     
									<tr>
										<td>
											<input type="text" name="nim_mhs" value="<?php echo $row['id_mhs_dsn'];?>" style="display:none;">
											<?php
												
													$nim_mhs= $row['id_mhs_dsn'];
													$ambil=mysql_query( "SELECT * from tb_mahasiswa WHERE nim='$nim_mhs'");
									   				$nama_mhs = mysql_fetch_assoc($ambil); 
									   				echo $nama_mhs['nama_mhs']; 
											?> 
										</td>
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
										<td class="aksi">
											<button class="btn btn-small btn-success" type="submit"><i class="icon-ok-circle" title="Approve"></i> Setujui</button>
											</form>
											<form class="delete_member" action="action.php?action=delete_member_grup" method='post'>
												<input type="text" name="nim_mhs" value="<?php echo $row['nim_mhs'];?>" style="display:none;">
												<input type="text" name="kode_grup" value="<?php echo $row['kode_grup'];?>" style="display:none;">
												<button class="btn btn-small btn-danger" type="submit"><i class="icon-remove-circle" title="Delete"></i> Hapus</button>
											</form>
											
										</td>
									</tr>
									<tr>
										<?php	
													/*}*/
												}
											
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