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
                    <h2>Edit Page</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <?php
                    echo form_open(base_url() . "admin/update-page".'/'.$page['page_id'], array("class" => "form-horizontal form-label-left", "name" => "Login_Form"));
                    ?>  

                    <p><?php
                        echo $this->session->flashdata('msg');
                        ?></p>
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Parent <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="inputParent" class="form-control col-md-7 col-xs-12">
								<option value="0">No Parent</option>
								<?php if(count($parentList)>0){foreach($parentList as $row){ ?>
								<option value="<?php echo $row['page_id']?>" <?php if($row['page_id']==$page['parent_id']) echo "selected"; ?>><?php echo $row['page_name']?></option>	
								<?php }} ?>
							</select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input id="inputName" class="form-control col-md-7 col-xs-12 cForm"  name="inputName" placeholder="Enter Name" type="text" value="<?php echo $page['page_name']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Url <span class="required" placeholder="Enter Url">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="inputUrl" name="inputUrl" class="form-control col-md-7 col-xs-12 cForm" value="<?php echo $page['page_url']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Location <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                           <select name="inputLocation" class="form-control col-md-7 col-xs-12">
								<option value="header" <?php if($page['location']=="header") echo "selected"; ?>>Header</option>
								<option value="footer" <?php if($page['location']=="footer") echo "selected"; ?>>Footer</option>
								<option value="both" <?php if($page['location']=="both") echo "selected"; ?>>Header & Footer Both</option>
								<option value="link" <?php if($page['location']=="link") echo "selected"; ?>>Display as a link</option>
						   </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Position <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control cForm"  name="inputPosition" id="sdate" placeholder="Numeric value" value="<?php echo $page['position']; ?>" />
                           
                        </div>
                    </div>  

             

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary" onclick="history.back();">Back</button>
                            <button id="editPage" type="submit" class="btn btn-success">Update</button>
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
$("#editPage").on("click",function(e){
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
