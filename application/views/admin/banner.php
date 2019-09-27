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
	plugins: "code,preview",
	extended_valid_elements: 'span',
	force_br_newlines : false,
      force_p_newlines : false
	
  });
 
  </script>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Banner</h3>
        </div>


    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Page Banner :: <?php echo $page_details['page_name']; ?></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <?php
                    echo form_open_multipart(base_url() . "admin/update-banner/" . $page['page_id'], array("class" => "form-horizontal form-label-left", "name" => "banner_Form"));
                    ?>  

                    <p><?php
                        echo $this->session->flashdata('msg');
                        ?></p>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Banner Content </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
						<input type="hidden" name="updateId" value="1">
                           <textarea name="inputContent" id="inputContent" style="width:100%; min-height:180px;"><?php echo $page['banner_content']; ?></textarea>
                        </div>
                    </div>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Banner Image </label>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                           <input type="file" class="form-control" name="inputImage"><a href="<?php echo base_url('admin/remove-banner').'/'.$page['page_id']; ?>" class="label label-danger">Delete Banner</a>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           
                            <button id="addPage" type="submit" class="btn btn-success">Update</button>
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