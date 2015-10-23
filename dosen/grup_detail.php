<?php
  require'template/header.php';
  $kode=$_GET['v'];
  $query=mysql_query("SELECT * from tb_grup where kode_grup='$kode'");
  $data = mysql_fetch_assoc($query); 

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
              <div class="row-fluid">
                    <legend><?php echo $data['nama_grup'];?></legend>
                    <div class="span7">
                      <div class="row-fluid">
                        <form action="action.php?action=add_post_grup" enctype="multipart/form-data" method="POST">
                          <h3>Kirim Sesuatu</h3>
                          <div class="control-group">
                            <input type="text" name="kode_grup" value="<?php echo $data['kode_grup'];?>" style="display:none;" readonly>
                            <input type="text" name="nid_dosen" value="<?php echo $nid;?>" style="display:none;" readonly>
                              <div class="controls">      
                                <textarea class="form-control span5" rows="3" name="info_tulisan" placeholder="Beritahu info terbaru..." required></textarea>
                              </div>
                          </div>
                          <div class="control-group">             
                              <div class="row-fluid controls">
                                <input name="file" id="file" type="file" placeholder="file" title="file" class="span10"/>  
                                <button class="span2 btn-success btn" type="submit">Post</button>
                              </div>
                          </div>
                          <hr>
                        </form>
                        
                      </div>
                      
                      
                      <div class="row-fluid">
                        <div class="span12">
                        <ul class="media-list">
                           <?php 

                                 $query=mysql_query("SELECT * FROM tb_dosen_membuat_grup d WHERE d.kode_grup='$kode' UNION ALL SELECT * FROM tb_mhs_mempunyai_grup m WHERE m.kode_grup='$kode' ORDER BY tgl_akses DESC");
                                  while($row = mysql_fetch_array($query)) { 
                            ?>
                          <li class="media">
                            <div class="media-left">
                              <?php 
                                $id_mhs_dsn= $row['id_mhs_dsn'];
                                  $query_dsn=mysql_query("SELECT nama_dosen, foto FROM tb_dosen WHERE nid='$id_mhs_dsn'");
                                  $row_dsn = mysql_fetch_assoc($query_dsn); 
                                  $nama_dosen= $row_dsn['nama_dosen'];
                                  $foto_dosen= $row_dsn['foto'];

                                  $query_mhs=mysql_query("SELECT nama_mhs, foto FROM tb_mahasiswa WHERE nim='$id_mhs_dsn'");
                                  $row_mhs = mysql_fetch_assoc($query_mhs); 
                                  $nama_mhs= $row_mhs['nama_mhs'];
                                  $foto_mhs= $row_mhs['foto'];
                              ?>
                              
                                <img class="media-object" src="<?php 
                                  if(!empty($nama_dosen)){
                                    echo "foto_dosen/";
                                    echo $foto_dosen;
                                  }else{
                                    echo "../mahasiswa/foto_mahasiswa/";
                                    echo $foto_mhs;
                                  }
                                ?>" height="48px" width="48px">
                              
                            </div>
                            <div class="media-body">

                              <h4 class="media-heading" >
                                <?php 
                                  if(!empty($nama_dosen)){
                                    echo $nama_dosen;
                                  }else{
                                    echo $nama_mhs;
                                  }
                                ?>
                              </h4>
                              <p><?php echo $row['unggah_tulisan']; ?></p>
                              <div>
                                <?php
                                  $download=$row['unggah_file'];
                                  if (!empty($download)) { 
                                ?>
                                  <a href="../file_grup/<?php echo $download;?>" class="btn btn-primary btn-small"><i class="icon-download "></i> Unduh File</a>
                                <?php
                                  }else{

                                  }

                                ?>
                              </div>
                            </div>
                            <div class="media-right">
                              <h6 class="media-heading"><?php echo $row['tgl_akses']; ?></h6>
                              <?php 
                                 $query_admin=mysql_query("SELECT level_member FROM tb_grup_member_dsn WHERE kode_grup='$kode' and id_mhs_dsn='$id_mhs_dsn' and level_member='admin'");
                                  $row_admin = mysql_fetch_assoc($query_admin);
                                  $stat_admin =$row_admin['level_member'];
                                  if(!empty($stat_admin) || ($id_mhs_dsn == $nid)) {
                                  ?>
                                    <form class="delete_member" action="action.php?action=delete_post_grup" method='post'>
                                      <input type="text" name="id_mhs_dsn" value="<?php echo $row['id_mhs_dsn'];?>" style="display:none;">
                                      <input type="text" name="kode_grup" value="<?php echo $row['kode_grup'];?>" style="display:none;">
                                      <input type="text" name="id_akses" value="<?php echo $row['id_akses'];?>" style="display:none;">
                                      <button class="btn btn-small" type="submit"><i class="icon-only icon-trash"></i></button>
                                    </form>
                                  <?php
                                  }else{

                                  }
                              ?>
                              
                            </div>
                            <hr class="media-border-bottom"></hr>
                          </li>
                          <?php 
                            }
                          ?>
                        </ul>
                      </div>
                      
                      </div>
                      
                    </div>

                    <div class="span4"> <legend><h4>Settings</h4></legend></div>
                      
              </div>
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
