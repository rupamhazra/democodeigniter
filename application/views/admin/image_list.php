<div class="page-title">
            <div class="title_left">
              <h3>Images</h3>
            </div>

           
          </div>
		   <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>List</h2>
				  <a href="<?php echo base_url('admin/upload-image');?>" class="btn btn-success pull-right">Upload new image</a>
                   <div class="clearfix"></div>
                </div>
               <div class="x_content">
			   <div class="row">
<?php 
$this->load->helper('directory'); //load directory helper
$dir = "uploads/images/"; // Your Path to folder
$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

foreach ($map as $k)
{?> <div class="col-md-3">
     <img src="<?php echo base_url($dir)."/".$k;?>" alt="" style="width:100%">
	 <p style="width:100%"><?php echo base_url($dir)."/".$k;?></p>
   </div>
<?php }
          
?> </div>
</div>
</div>
</div>
</div>