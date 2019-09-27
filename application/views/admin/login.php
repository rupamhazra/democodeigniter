<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shyam Future Admin</title>

        <!-- Bootstrap core CSS -->

        <link href="<?php echo base_url('assets'); ?>/admin/css/bootstrap.min.css" rel="stylesheet">


        <script src="<?php echo base_url('assets'); ?>/admin/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
              <script src="<?php echo base_url('assets'); ?>/admin/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="<?php echo base_url('assets'); ?>/admin/js/html5shiv.min.js"></script>
                <script src="<?php echo base_url('assets'); ?>/admin/js/respond.min.js"></script>
              <![endif]-->

        <style>.wrapper {    
                margin-top: 80px;
                margin-bottom: 20px;
            }

            .form-signin {
                max-width: 420px;
                padding: 30px 38px 66px;
                margin: 0 auto;
                background-color: #eee;
                border: 3px dotted rgba(0,0,0,0.1);  
            }

            .form-signin-heading {
                text-align:center;
                margin-bottom: 30px;
            }

            .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
            }

            input[type="text"] {
                margin-bottom: 20px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            input[type="password"] {
                margin-bottom: 20px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

            .colorgraph {
                height: 7px;
                border-top: 0;
                background: #c4e17f;
                border-radius: 5px;
                background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
                background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
                background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
                background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
            }
			.steelBack{
				background:#31aae1 !important;
			}
			.errorClass{
				border:1px solid red !important;
			}
			</style>

    </head>

    <body  class="steelBack">

        <div>
            

            <div id="wrapper">
                <div class = "container">
                    <div class="wrapper">
                        <?php
                        echo form_open(base_url() . "do-login", array("class" => "form-signin", "name" => "Login_Form"));
                        ?>   

                        <h3 class="form-signin-heading"><img src="<?php echo base_url('assets'); ?>/images/logo.jpg" class="img-responsive"></h3>
                        <hr class="colorgraph"><br>
                        <p><?php 
                            echo $this->session->flashdata('msg');
                            ?></p>
                        <hr>
                        <input type="text" class="form-control cForm" name="inputEmail" id="inputEmail" placeholder="Email" autofocus="" />
                        <input type="password" class="form-control cForm" name="inputPassword" placeholder="Password"/>     		  

                        <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" id="loginSubmit" type="Submit">Login</button>  			
                        <span style="color:red"><?php echo $this->session->flashdata('login_error'); ?></span>
						<?php echo form_close(); ?>
						
                    </div>
                </div>
            </div>
		
        </div>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script>
	<script>
		$("#loginSubmit").on("click",function(e){
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
    </body>

</html>
