<?php
  session_start();
  include 'koneksi/session.php';
  require '../include/koneksi.php';
  $kode=$_GET['add'];
  $query=mysql_query("SELECT * from tb_dosen where password='$kode'");
  $data = mysql_fetch_assoc($query); 
  
  
?>
<form class="form-horizontal" action="action.php?action=create_grup" method="POST">
  	<fieldset>
	    <legend>Buat Grup  baru</legend>
	    <div class="control-group">
        <input type="text" name="nid_dosen" value="<?php echo $data['nid'];?>" style="display:none;">					  
	      <label class="control-label" for="nama_dosen">Administrator :</label>
          <div class="controls">
            <input type="text" class="form-control span4" id="nama_dosen" name="nama_dosen" value="<?php echo $data['nama_dosen'];?>" readonly>
          </div>
       
	    </div>
	    <div class="control-group">						  
	      
          <label class="control-label" for="nama_grup">Nama Grup :</label>
          <div class="controls ">
            <input type="text" class="form-control span4" id="nama_grup" placeholder="Masukan Nama Grup" name="nama_grup" required>
          </div>
          
	    </div>
	    <div class="control-group">						  

          <label class="control-label" for="deskripsi">Deskripsi :</label>
          <div class="controls">          
            <textarea class="form-control span4" rows="4" name="deskripsi"></textarea>
          </div>
	    </div>
	    <div class="control-group">						  
          <div class="controls">
          	<a href="grup.html" class="btn">Cancel</a>        
          	<button class="btn-success btn" type="submit">Create</button>
          </div>
	    </div>
	    
  	</fieldset>
</form>
