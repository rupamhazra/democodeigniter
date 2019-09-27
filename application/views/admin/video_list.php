<div class="page-title">
            <div class="title_left">
              <h3>Videos</h3>
            </div>

           
          </div>
		   <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>List</h2>
				  <a href="<?php echo base_url('admin/upload-video');?>" class="btn btn-success pull-right">Upload new video</a>
                   
                   <div class="clearfix"></div>
                </div>
               <div class="x_content">
			   <div class="row">
<?php 
$this->load->helper('directory'); //load directory helper
$dir = "uploads/video"; // Your Path to folder
$map = directory_map($dir); /* This function reads the directory path specified in the first parameter and builds an array representation of it and all its contained files. */

foreach ($map as $k)
{?> <div class="col-md-3">
     <img src="<?php echo base_url($dir)."/".$k;?>" alt="" style="width:100%">
	 <p style="width:100%"><?php echo base_url($dir)."/".$k;?></p>
     <!--<button  id="delVideoBtn-<?php ///echo $k;?>" type="submit" class="btn btn-success delVideoBtn">Delete</button>-->
     <a class="label red" href="#" onclick="confirm_modal('<?php echo base_url('admin/delete-videos').'/'.$k;?>');">Delete</a>
     
   </div>
<?php }
          
?> </div>
</div>
</div>
</div>
</div>
  
	<script type="text/javascript">
	function confirm_modal(delete_url)
	{
		$('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this video ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>  
    </script>  
    
       
  <script>
$(".delVideoBtn").on("click",function(e){
	var videoName = $(this).attr("id");
	var arr = videoName.split('-');
	//alert(arr[1]);
			$.ajax({
				url : "<?php echo site_url('admin/delete-videos')?>/"+arr[1],
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					alert(data);
					//reload_table();
				},
				
			});
});

</script>