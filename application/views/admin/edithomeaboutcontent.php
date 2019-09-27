<style type="text/css">

.errorClass {
	border:1px solid red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>
<script src="<?php echo base_url('assets/admin/tinymce/js/tinymce/tinymce.min.js'); ?>"></script>
 <script>
  tinymce.init({
    selector: '#inputContent',
	plugins: "code,preview"
	
  });
 
  </script>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Blog</h3>
        </div>


    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Blog </h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <?php
                    echo form_open_multipart(base_url() . "admin/update-home-about-content/".$homeaboutcontent['home_about_content_id'], array("class" => "form-horizontal form-label-left", "name" => "Login_Form"));
                    ?>  

                    <p><?php
                        echo $this->session->flashdata('msg');
                        ?></p>
						<input type="hidden" name="editBlog" value="1">
						
                    </div>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Title </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="text" name="inputTitle" id="inputTitle" class="form-control cForm" value="<?php echo $homeaboutcontent['home_about_content_title'];?>">
                        </div>
                    </div>
					
                    <div class="item form-group">
                        <label class="col-md-12" for="title">Large Image </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="file" name="inputLargeImage" class="form-control">
                        </div>
                    </div>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Small Image </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="file" name="inputSmallImage" class="form-control">
                        </div>
                    </div>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Image alt </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                           <input type="text" name="inputImageAlt" class="form-control" value="<?php echo $homeaboutcontent['home_about_img_alt'];?>">
                        </div>
                    </div>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Content </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
						<input type="hidden" name="blogAdd" value="1">
                           <textarea name="inputContent" id="inputContent" style="width:100%; min-height:280px;"><?php echo $homeaboutcontent['home_about_content'];?></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           
                            <button id="addBlogBtn" type="submit" class="btn btn-success">Update</button>
							 <button type="submit" class="btn btn-primary" onclick="history.back();">Back</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
    <script>
            $('#inputBlogTitle').on('keyup keypress blur', function() 
{  

	var myStr = $(this).val();
		myStr=myStr.toLowerCase();
		myStr=myStr.replace(/ /g,"-");
		myStr=myStr.replace(/[^a-zA-Z0-9.\.]+/g,"-");
		myStr=myStr.replace(/\.+/g, "-");


    $('#inputBlogUrl').val(myStr); 
});
            

$("#addBlogBtn").on("click",function(e){
			var proceedStep=true;
  $('.cForm').each(function(){
   if(!$.trim($(this).val())){ 
    $(this).addClass('errorClass'); 
    proceedStep = false;
   }
  });
  if(proceedStep==false){
	  e.preventDefault();
  }
		});

</script>
				