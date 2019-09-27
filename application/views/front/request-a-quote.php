<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <?php echo @$metaInfo; ?>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
     <!-- font css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>">
	<!-- Animate css -->
	<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
	 <!-- custom css -->
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
<meta name="google-site-verification" content="it6suEvpR5GERBFPRGCCE3l9B-wknMACPJ9yNpglsvo" />
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<style>.errorClass{border:1px solid red !important;}</style>
  </head>
<body>

    <!-- Page Preloader Ends /-->
	
		<!-- Chat Popup -->
<div id="chatpopup" class="modal fade" role="dialog">
  <div class="chatpopup">
    <!-- Modal content-->
    <div class="modal-content"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4>Get In Touch</h4>
		<form>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="NAME" required />
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="EMAIL" required />
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="PHONE" required />
			</div>
			<div class="form-group">
				<textarea placeholder="MESSAGE" class="form-control msg"></textarea>
			</div>
			<div class="input-group">									
				<div class="gmail-robot">
					<img src="images/gmail-robot.png" alt="" />
				</div>
				<div class="input-group-btn">
					<button type="submit" class="submit-btn">Submit</button>
				</div>
			</div>
		</form>
    </div>

  </div>
</div><!--
<div class="chat-position">		
	<div class="chat-info">
		<a href="#" data-toggle="modal" data-target="#chatpopup"><i class="chat-icon"></i></a>
	</div>
</div>-->
<div class="wrapper">
	<header>
			<div class="container">
				<div class="header-top">
					<div class="header-left">
						<ul class="top-list">
							<!--<li><a href="#">Services</a></li>
							<li><a href="#">REQUEST A QUOTE</a></li>-->
						</ul>
					</div>
					<div class="header-right">
						<ul class="header-info-list">
							<li class="call-info">123-456-7890</li>		
							<li class="email-info">info@serpidentity.co.uk</li>								
						</ul>
						<ul class="social-list">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
				
				<div class="navbar navbar-default" role="navigation">					
					<div class="row">
                    <div class="navbar-header">
                    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          					<span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
        				</button>
                        <a class="navbar-brand nav-logo" href="<?php echo base_url();?>">
                          <h1><img class="img-responsive" src="<?php echo base_url('assets'); ?>/images/logo.png" alt="logo"></h1>
                        </a>                    
               		</div>
               		<div class="navbar-collapse collapse">
                       <?php display_menu(0,1); ?>
              		</div>
                </div>           
				</div>
				
			</div>
		</header>
		
<section class="innerpage-top contact-top-bg">
		<div class="container">
			<div class="contact-top-heading">
				<div class="contact-map-place">					
				</div>
				<div class="contact-heading">
					<h1>Request a quote</h1>
				</div>
			</div>
			<div class="breadcrumb-nav">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>					
					<li><span class="breadcrumb-active">Request a quote</span></li>
				</ul>
			</div>
		</div>
	</section>
	
	
<section class="inner-top-content">
		<div class="container">			
			<div class="contact-top ">
				<div class="contact-detail request-sec border-down">
					<div class=" col-sm-6 pad-req">
						<h4>Send Us <span>A Message</span></h4>
						<form class="col-sm-12" method="POST" action="<?php echo base_url('send-request'); ?>" id="requestForm">            
							<div class="contact-form-row">
								<div class="contact-col-12">
									<div class="form-group">
										<input type="text" name="inputName" placeholder="NAME" class="form-control cForm"/>
									</div>
								</div>
								<div class="contact-col-12">
									<div class="form-group">
										<input type="text" name="inputEmail" id="inputEmail" placeholder="EMAIL" class="form-control cForm"/>
									</div>
								</div>
								<div class="contact-col-12">
									<div class="form-group">
										<input type="text" name="inputPhone" id="inputPhone" placeholder="PHONE" class="form-control cForm" />
									</div>
								</div>
								<div class="contact-col-12">
									<div class="form-group">
										<input type="text" name="inputCompName" placeholder="COMPANY NAME" class="form-control cForm"/>
									</div>
								</div>
								
								<div class="contact-col-12">
									<div class="form-group">
										<textarea class="form-control msg cForm" name="message" placeholder="MESSAGE"></textarea>
									</div>
								</div>
								
								<div class="contact-col-5">
									<div class="form-group">
										<div id="recaptcha1" class="g-recaptcha" data-sitekey="6LeUIiMUAAAAAFJe9EYL-SIH0xE5g0M5KI0YNXae"></div>
									</div>
								</div>
								
								<div class="contact-col-5">
									<div class="form-group">
										<button type="submit" class="send-btn"><i class="fa fa-paper-plane"></i></button>
									</div>
								</div>
								
							</div>
						</form>
					</div>
					
					<div class="col-sm-6 bg-gr pad-req">
                    <div class="abt-count">
                	<div class="count-itm">
                    	<h2>5+</h2>
                        <p>Years of Experience</p>
                    </div>
                    
                    <div class="count-itm">
                    	<h2>50+</h2>
                        <p>Professionals in 
Our Team</p>
                    </div>
                    
                    <div class="count-itm">
                    	<h2>100+</h2>
                        <p>Successful Projects</p>
                    </div>
                </div>
                    </div>
					
					
				</div>
				<div class="clear-fix"></div>
			</div>
		</div>
	</section>
	
	
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="footer-col">
							<h4>Sitemap</h4>
							<ul>
								<?php footer_menu();?>
							</ul>
						</div>
						<div class="footer-col">
							<h4>Services</h4>
							<ul>
								<?php service_menu(); ?>        
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="recent-post">
							<h4>Recent Post</h4>
							<ul>
							<?php popular_post_footer(); ?>
              </ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="footer-contact">
							<h4>Contact Info</h4>
                            <address class="get_in_touch">
							<ul>
								<li>31 LOREM STREET, DOLOR SITE, <br> 
								LONDON SW19 E30</li>
								<li><a href="tel:+44-20-3808-9519">+44 20 3808 9519</a></li>
								<li><a href="mailto:info@serpidentity.co.uk" class="transition3s">info@serpidentity.co.uk</a></li>
							</ul>
						</address>
						<div class="footer-social">
							<ul>
								<li>
									<a href="#"><i class="fa facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa linkedin"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa gplus"></i></a>
								</li>
							</ul>
						</div>
						</div>
					</div>
				</div>				
			</div>
		<div class="clearfix"></div>	
		</div>
		<div class="footer-copyright">
			<div class="container">
				<p>&copy; <?php echo date('Y',strtotime(date('Y'))); ?> serpidentity - ALL RIGHTS RESERVED
				<span>Design & Develop By <a href="<?php echo base_url(); ?>">serpidentity</a></span>
				</p>
			</div>
		</div>
	</footer>	
	
	<?php //print_r($this->router->routes);?>
	
	
</div>

<!-- jQuery (JavaScript plugins) -->
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/wow.min.js')?>"></script>
<script>    $(function(){
    $(".dropdown1").hover(           
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                            
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                              
            });
    });
	$('#requestForm').submit(function(e){
	var proceed=true;
	$('.cForm').each(function(){
		if(!$.trim($(this).val())){
			$(this).addClass('errorClass');
			proceed=false;
		}
		});
		
		var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
        if(!email_reg.test($.trim($('#inputEmail').val()))){
            $('#inputEmail').addClass('errorClass');  
            proceed = false;    
        } 
  var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  if(!filter.test($('#inputPhone').val()))
  {
   $('#inputPhone').addClass('errorClass');
   proceed=false;
  } 
		
		/*  var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
        if(!email_reg.test($.trim($('#inputEmail').val()))){
            $('#inputEmail').addClass('errorClass');  
            proceed = false;    
        }
		var v = grecaptcha.getResponse(recaptcha1);
		
		if(v.length==0){
			$("#recaptcha1").addClass('errorClass'); 
			proceed = false; 
		}*/
		if(proceed===false){
			e.preventDefault();
		}
	
});
    </script>
<!-- counter compiled plugins-->
<script src="<?php echo base_url('assets/js/jquery.counterup.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugins.js');?>"></script>
<!-- progress animation-->
<script src="<?php echo base_url('assets/js/masonry.pkgd.js');?>"></script>	
<script src="<?php echo base_url('assets/js/imagesloaded.pkgd.js');?>"></script>
<!-- masonary jquery-->
<script src="<?php echo base_url('assets/js/jquery.isotope.min.js');?>"></script>

<script src="<?php echo base_url('assets/js/main.js');?>"></script>


</body>
</html>