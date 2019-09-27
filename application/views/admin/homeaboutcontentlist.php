<style>
.label{
	border:1px solid;
}
.red{
	color:red;
}
.blue{
	color:blue;
}
.brown{
	color:#a94442;
}
</style>
<div class="">
    
      <div class="page-title">
            <div class="title_left">
              <h3>Blog List</h3>
            </div>

           
          </div>
    <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>List</h2>
				  
                   <div class="clearfix"></div>
                </div>
               <div class="x_content">
                  <p><?php
                        echo $this->session->flashdata('msg');
                        ?></p>
                  <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                      <tr>
                        <th width="100px">Image</th>
                        <th>Title</th>
						 <th>Content</th>
						<th width="80px">Status</th>
						<th width="180px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       <?php if(count($homeaboutcontentList)>0){
						   foreach($homeaboutcontentList as $row){ ?>
							   <tr>
									<td><img src="<?php echo base_url('uploads/home_about_images').'/'. $row['home_about_small_img']; ?>" height="80px"/></td>
									<td><?php echo $row['home_about_content_title']; ?></td>
                                    <td><?php echo $row['home_about_content']; ?></td>
                                    <td><a class="label " <?php if($row['is_active']=='active') echo 'style="color:green;"'; else echo'style="color:red;"'; ?> href="<?php echo base_url().'admin/change-home-about-content-status/'.$row['home_about_content_id']; ?>"><?php echo ucfirst($row['is_active']); ?></a></td>
									<td><a class="label brown" href="<?php echo base_url('admin/update-home-about-content').'/'. $row['home_about_content_id']; ?>">Edit</a><a class="label red" href="#" onclick="confirm_modal('<?php echo base_url('admin/delete-home-about-content').'/'.$row['home_about_content_id'];?>');">Delete</a></td>
									
							   </tr>
						   <?php }
					   }
					   else{ ?>
						   <tr>
							<td colspan="6">No blog category found</td>
						   </tr>
					  <?php }  ?>
                        
                    </tbody>
                  </table>
                  
                  
               </div>
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
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this Blog Category ?</h4>
                </div>
                
                
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>