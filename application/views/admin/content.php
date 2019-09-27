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
	valid_elements : '*[*]',
	force_br_newlines : false,
  force_p_newlines : false

  });

  </script>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Page</h3>
        </div>


    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Page Content :: <?php echo $page_details['page_name']; ?></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <?php
                    echo form_open(base_url() . "admin/update-content/" . $page['page_id'], array("class" => "form-horizontal form-label-left", "name" => "Login_Form"));
                    ?>
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <p><?php
                        echo $this->session->flashdata('msg');
                        ?></p>
					<div class="item form-group">
                        <label class="col-md-12" for="title">Content </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
						<input type="hidden" name="updateId" value="1">
                           <textarea name="inputContent" id="inputContent" style="width:100%; min-height:280px;"><?php echo htmlentities($page['page_content']); ?></textarea>
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
