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
            <h3>Meta</h3>
        </div>


    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Page Meta :: <?php echo $pages['page_name']; ?></h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">

                    <?php
                    echo form_open(base_url() . "admin/update-page-meta".'/'.$page['page_id'], array("class" => "form-horizontal form-label-left", "name" => "Login_Form"));
                    ?>  

                    <p><?php
                        echo $this->session->flashdata('msg');
                        ?></p>
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Page Title
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12"  name="inputTitle" type="text" value="<?php echo $page['page_title']; ?>">
                        </div>
                    </div>
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Meta Description<input type="hidden" name="metaUpdateId" value="1"></label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <textarea name="inputMetaDesc" id="inputMetaDesc" class="form-control col-md-7 col-xs-12">
						   <?php echo $page['meta_description']; ?>
						   </textarea> 
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Meta Keyword
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12"  name="inputMetaKeyWord" type="text" value="<?php echo $page['meta_keyword']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Meta Robot
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" name="inputMetaRobot" class="form-control col-md-7 col-xs-12" value="<?php echo $page['meta_robot']; ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Meta Revisit After</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="inputRevisitAfter" class="form-control col-md-7 col-xs-12" value="<?php echo $page['meta_revisit_after']; ?>">
                           
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Canonical Link 
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputCanonicalLink" value="<?php echo $page['canonical_link']; ?>" />
                           
                        </div>
                    </div>  
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Locale
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOglocale"  value="<?php echo $page['og_locale']; ?>" />
                           
                        </div>
                    </div> 
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Type
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOgType"  value="<?php echo $page['og_type']; ?>" />
                           
                        </div>
                    </div> 
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Image
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOgImage"   value="<?php echo $page['og_image']; ?>"/>
                           
                        </div>
                    </div> 
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Title
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOgTitle"   value="<?php echo $page['og_title']; ?>"/>
                           
                        </div>
                    </div> 
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Description
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOgDescription"  value="<?php echo $page['og_description']; ?>" />
                           
                        </div>
                    </div> 
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Url
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOgUrl"  value="<?php echo $page['og_url']; ?>" />
                           
                        </div>
                    </div> 

					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Og Site Name
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <input type="text" class="form-control col-md-7 col-xs-12"  name="inputOgSiteName"  value="<?php echo $page['og_site_name']; ?>" />
                           
                        </div>
                    </div> 
					<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sdate">Extra Head Code
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12 ">
                           
                                <textarea class="form-control col-md-7 col-xs-12"  name="inputExtraHeadCode"><?php echo $page['extraheadcode']; ?></textarea>
                           
                        </div>
                    </div> 
					
					
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           
                            <button id="editPageMeta" type="submit" class="btn btn-success">Update Meta</button>
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