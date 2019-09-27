<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>SERP iDentity</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
     <!-- font css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>">
	<!-- Animate css -->
	<link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet">
	 <!-- custom css -->
	<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">


	
  </head>
<body>
   
	
	<!-- Chat Popup -->
<div id="chatpopup" class="modal fade" role="dialog">
  <div class="chatpopup">
    <!-- Modal content-->
    <div class="modal-content">
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
</div>

    <!-- Page Preloader Ends /-->
<div class="wrapper">
	<header class="blog-header">
		<div class="container">
			
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
					  <h1><img class="img-responsive" src="images/blog-logo.png" alt="logo"></h1>
					</a>                    
				</div>
				<div class="blog-header-contact">
					<ul class="header-info-list">
						<li class="call-info">123-456-7890</li>		
						<li class="email-info">info@serpidentity.co.uk</li>								
					</ul>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-right main-nav"> 
						<li><a href="index.html">Home</a></li> 
						<li><a href="#">About Us</a></li>                     
						<li><a href="#">digital marketing</a></li>		
						<li><a href="#">Webdesign</a></li>
						<li class="current-menu-item"><a href="#">Blog</a></li>                     
						<li><a href="#">Contact</a></li>                          	     
					</ul>
				</div>
			</div>           
			</div>			
		</div>	
	</header>
	<div class="blog-category">
		<ul>
			<li><a href="#">SEO</a></li>
			<li><a href="#">SEM</a></li>
			<li><a href="#">Analytics</a></li>
			<li><a href="#">Mobile</a></li>
			<li><a href="#">Local</a></li>	
            <li><a href="#">Social</a></li>	
           <li><a href="#">Design</a></li>		
		</ul>
		<div class="chat-info">
			<a href="#" data-toggle="modal" data-target="#chatpopup"><i class="chat-icon"></i></a>
		</div>
	</div>
	
	<div class="blog-details">
		<div class="container">
			<div class="blog-topimg">
				<div class="blog-caption">
					<span>Lorem ipsum <strong>dolor sit amet</strong></span>
				</div>
			</div>
			<div class="blog-inner">
				<div class="top-recent-post">
					<div class="recent-postimg">
						<img src="images/post-img.jpg" alt="" />
					</div>
					<h4><a href="#">Powerful Internet Company:</a></h4>
					<p>Along the same lines, Blogger has the bac...</p>
					<span class="recent-link"><a href="#">Recent Post</a></span>
				<div class="clearfix"></div>	
				</div>
				<div class="clearfix"></div>
				<div class="row post-row">
					<div class="col-md-8">
						<!--<div class="top-article">
							<article class="article-post-col">
								<img src="images/article-post-img01.jpg" alt="" />
								<div class="article-post-caption">
									<h4><a href="#">Blogger Outreach Via Blogging Assignments</a></h4>
									<span class="article-date">16 Dec 2016</span>
								</div>
							<div class="clearfix"></div>
							</article>
							
							<div class="article-post-col2">
								<article class="article-row">
									<div class="article-img">
										<img src="images/article-img02.jpg" alt="" />
									</div>
									<div class="article-content">
										<h2><a href="#">The Post With A Custom style Title & Sub Title In Colored Bold</a></h2>
										<p>Lorem ipsum dolor sit amet co nsectetur adipiscing elit. Fusce non sem viverra.</p>
									</div>
								<div class="clearfix"></div>	
								</article>
								<article class="article-row">
									<div class="article-img">
										<img src="images/article-img02.jpg" alt="" />
									</div>
									<div class="article-content">
										<h2><a href="#">The Post With A Custom style Title & Sub Title In Colored Bold</a></h2>
										<p>Lorem ipsum dolor sit amet co nsectetur adipiscing elit. Fusce non sem viverra.</p>
									</div>
								<div class="clearfix"></div>	
								</article>
							<div class="clearfix"></div>	
							</div>
								
								
							
						</div>-->
						<div class="recent-post-article">
							<div class="post-heading">
								<h4>RECENT POST</h4>
								<p>All The Recent News You Need To Know<p>
							</div>
							<?php foreach($blogList as $row){ ?>
							<article class="recent-post-link">
								<div class="recent-post-img">
									<img src="images/recent-post-img01.jpg" alt="" />
								</div>
								<div class="recent-post-des">
									<h2><a href="#">The Post With A Custom style Title & Sub Title In Colored Bold</a></h2>
									<ul class="admin-list">
										<li class="author-name"><i class="admin-icon"></i> Qasim Ali</li>
										<li class="postdate"><i class="date-icon"></i> Saturday, February 06, 2016</li>
									</ul>
									<div class="clearfix"></div>
									<div class="post-content">
										<p>The crisp, fresh mountain air outside the cave 
										acted as an immediate tonic and I felt new life & 
										new courage coursing through me.which fruit 
										gathered blessed earth creepeth,...</p>
									</div>
								</div>
							<div class="clearfix"></div>	
							</article>
							<?php } ?>
																				
						<div class="clearfix"></div>	
						</div>
					</div>
					<div class="col-md-4">
						<div class="fabulious-post">
							<div class="post-heading">
								<h4>Fabulious Articles</h4>
								<p>All The Recent News You Need To Know<p>
							</div>
							<article class="post-article">
								<div class="post-article-img">
									<img src="images/article-img01.jpg" alt="" />
								</div>
								<h2><a href="#">The Post With A Custom style Title & Sub Title In Colored Bold</a></h2>
							</article>
							<div class="row">
								<div class="col-sm-6">
									<article class="post-article post-article-col">
										<div class="post-article-img">
											<img src="images/article-img02.jpg" alt="" />
										</div>
										<h2><a href="#">Powerful Internet Colored Bold</a></h2>
									</article>
								</div>
								<div class="col-sm-6">
									<article class="post-article post-article-col">
										<div class="post-article-img">
											<img src="images/article-img02.jpg" alt="" />
										</div>
										<h2><a href="#">Powerful Internet Colored Bold</a></h2>
									</article>
								</div>
							</div>
						<div class="clearfix"></div>	
						</div>
						
						<div class="newsletter-info">
							<h2>Subscribe Our Newsletter</h2>
							<div class="newsletter-box">
								<p>Subscribe Now and Get Our Latest Articles Delivered to Your email Inbox</p>
								<input type="text" placeholder="info@serpidentity.co.uk" /> 
								<button type="submit" class="newsletter-btn"><i class="fa fa-send"></i> Submit</button>
							</div>
						</div>
						
						<div class="social-widget">
							<h2>SOCIAL WIDGET</h2>
							<ul>
								<li>
									<div class="widget-box fb-bg">
										<i class="fa fa-facebook"></i>
										<span class="counting-like">9.3 k</span>
									</div>
								</li>
								<li>
									<div class="widget-box pinterest-bg">
										<i class="fa fa-pinterest-p"></i>
										<span class="counting-like">5.1 k</span>
									</div>
								</li>
								<li>
									<div class="widget-box linkedin-bg">
										<i class="fa fa-linkedin"></i>
										<span class="counting-like">3.5 k</span>
									</div>
								</li>
								<li>
									<div class="widget-box gplus-widget">
										<i class="fa fa-google-plus"></i>
										<span class="counting-like">5.3 k</span>
									</div>
								</li>
								<li>
									<div class="widget-box twitter-bg">
										<i class="fa fa-twitter"></i>
										<span class="counting-like">9.9 k</span>
									</div>
								</li>
								<li>
									<div class="widget-box instagram-bg">
										<i class="fa fa-instagram"></i>
										<span class="counting-like">3.1 k</span>
									</div>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				
			<div class="clearfix"></div>	
			</div>
		<div class="clearfix"></div>
		</div>
	</div>
	
	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-col">
							<h4>Sitemap</h4>
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Price</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
						<div class="footer-col">
							<h4>Services</h4>
							<ul>
								<li><a href="#">Web Development</a></li>
								<li><a href="#">Graphic Design</a></li>
								<li><a href="seo.html">SEO</a></li>
								<li><a href="#">Digital Marketing</a></li>
								<li><a href="content-marketing.html">Content Writing</a></li>								
							</ul>
						</div>
					</div>
					<div class="col-md-4">
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
				<p>&copy; 2016 serpidentity Website - ALL RIGHTS RESERVED
				<span>Design & Develop By <a href="#">serpidentity</a></span>
				</p>
			</div>
		</div>
	</footer>	
	
	
	
	
</div>

<!-- jQuery (JavaScript plugins) -->
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/wow.min.js');?>"></script>

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