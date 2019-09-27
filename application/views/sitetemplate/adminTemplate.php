<!DOCTYPE html>
<html lang="en">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Administrator | Shyamfuture </title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/animate.min.css" rel="stylesheet">
        <!-- Datatable css -->

        <link href="<?php echo base_url(); ?>assets/admin/css/datatables.min" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url(); ?>assets/admin/css/custom.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">


        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
              <script src="<?php echo base_url(); ?>admin/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="<?php echo base_url(); ?>admin/js/html5shiv.min.js"></script>
                <script src="<?php echo base_url(); ?>admin/js/respond.min.js"></script>
              <![endif]-->

        <?php
        if (!empty($stylesheets)) {
            foreach ($stylesheets as $stylesheet) {
                ?>
                <link href="<?php echo base_url() . $stylesheet; ?>" type="text/css" rel="stylesheet" media="screen,projection">
                <?php
            }
        }
        ?>

    </head>


    <body class="nav-md">

        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo base_url();?>admin-dashboard" class="site_title"><img src="<?php echo base_url().'/assets/images/logo.jpg'; ?>"  height="40"/></a>
                        </div>
                        <div class="clearfix"></div>

                        <br>
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                            <div class="menu_section ">

                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-newspaper-o"></i> PAGES <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">

                                            <li><a href="<?php echo base_url() . "admin-dashboard"; ?>">List Pages</a>
                                            <li><a href="<?php echo base_url() . "admin/add-page"; ?>">Add Page</a>
                                            </li>

                                        </ul>
                                    </li>
                                      <li><a><i class="fa fa-pencil-square-o "></i> BLOG <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">

                                            <li><a href="<?php echo base_url() . "admin/blog-category"; ?>">Category </a>
                                            </li>
											 <li><a href="<?php echo base_url() . "admin/blog-list"; ?>">List </a>
                                            </li>
                                            <li><a href="<?php echo base_url() . "admin/blog-add"; ?>">Add </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-envelope-o "></i> CONTACT <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?php echo base_url() . "admin/contacts";?>">Contact List</a>
                                            </li>

                                        </ul>
                                    </li>


                                   <!-- <li><a><i class="fa fa-picture-o "></i> Banner <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?php echo base_url() . "siteadmin/banner"; ?>">Banner</a>
                                            </li>



                                        </ul>
                                    </li>-->
                                    <li><a><i class="fa fa-picture-o "></i> IMAGES <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?php echo base_url() . "admin/images"; ?>">List</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-picture-o "></i> VIDEOS <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?php echo base_url() . "admin/videos"; ?>">List</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-map-marker "></i> TRACKER <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?php echo base_url() . "admin/tracks"; ?>">List</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>

                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('log-out');?>">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
				<?php echo $body; ?>

</div>
<!-- /page content -->
</div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>

<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script>

<!-- bootstrap progress js -->
<script src="<?php echo base_url(); ?>assets/admin/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="<?php echo base_url(); ?>assets/admin/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
<!-- pace -->
<script src="<?php echo base_url(); ?>assets/admin/js/pace/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/datatable/datatables.min.js"></script>
<?php
if (!empty($javascripts)) {
    foreach ($javascripts as $javascript) {
        ?>
        <script type="text/javascript" src="<?php echo base_url() . $javascript; ?>"></script>
        <?php
    }
}
?>

<script>
    $('#inputName').on('keyup keypress blur', function()
	{

	var myStr = $(this).val();
		myStr=myStr.toLowerCase();
		myStr=myStr.replace(/ /g,"-");
		myStr=myStr.replace(/[^a-zA-Z0-9.\.]+/g,"-");
		myStr=myStr.replace(/\.+/g, "-");


    $('#inputUrl').val(myStr);
});

</script>


</body>

</html>
