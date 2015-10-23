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
						
					</div>
			</div> <!-- /span3 -->
			<div class="span9">
    			<div class="widget-header"> <i class="icon-group"></i>
		            <h3>Halaman Grup</h3>
		        </div>
		            <!-- /widget-header -->
		        <div class="widget-content">
			        <form class="form-horizontal" action="" method="post">
					  	<fieldset>
						    <legend>Buat Grup  baru</legend>
						    <div class="control-group">						  
						      <label class="control-label" for="kode_grup">Kode Grup :</label>
		                      <div class="controls">
		                        <input type="text" class="form-control span4" id="kode_grup" placeholder="Masukan Kode Grup" name="kode_grup">
		                      </div>
		                   
						    </div>
						    <div class="control-group">						  
						      
		                      <label class="control-label" for="nama_grup">Nama Grup :</label>
		                      <div class="controls ">
		                        <input type="text" class="form-control span4" id="nama_grup" placeholder="Masukan Nama Grup" name="nama_grup">
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
		                      	<button class="btn btn-large">Cancel</button></td>          
		                      	<button class="btn-success btn-large btn" type="submit">Create</button></td>
		                      </div>
						    </div>
						    
					  	</fieldset>
					</form>
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