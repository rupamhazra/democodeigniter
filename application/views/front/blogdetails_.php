<!-- Page Preloader Ends /-->
<div class="wrapper">

<!--
	<div class="blog-category">
		<ul>
			<?php blog_category(); ?>	
		</ul>
		<div class="chat-info">
			<a href="#" data-toggle="modal" data-target="#chatpopup"><i class="chat-icon"></i></a>
		</div>
	</div>
	
-->
    <div class="col-md-12">
<div class="row">
<div class="bradcumb">
<div class="container">
<ul>
<li><a href="#">Home</a></li>
<li><a>Blog</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="app-devolopmet blog">
    <div class="container">
           
    
        <hr>
                
           <div class="row">
			<div class="col-md-9">
			    <div class=" col-xs-12 blog-sec" data-aos="fade-right">
				<div class="blog-contant">
                    <div class="col-xs-12  about-thamble">
                        <img src="<?php echo base_url('uploads/blog_images').'/'.$blog['blog_large_image'];?>" alt="" width="100%">
                        
                        <div class="date-box">
                            
                            
                            <?php echo date('jS  F ',strtotime($blog['date_created']));?>
                        </div>
                        
					</div>
					
					<div class="col-xs-12">
						 <div class="blog-column">
							<h2><?php echo $blog['blog_title']; ?></h2>
									<?php echo $blog['blog_content'];?>
                             
                                      <div class="social-share">
    <h4 class="widget-title">Follow us</h4>
    <ul class="social-nav">
        <li><a href="#" target="_blank" title="Twitter" rel="nofollow" class="twitter"><i class="fa fa-twitter"></i></a></li>
        <div class="fb-share-button" data-href="http://shyamfuture.com/blog/what-you-need-to-know-about-google-s-mobile-first-index" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fshyamfuture.com%2Fblog%2Fwhat-you-need-to-know-about-google-s-mobile-first-index&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
       <!-- <li><a href="#"  target="_blank" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>-->
        <li><a href="#" target="_blank" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#" target="_blank" title="Linkedin" rel="nofollow" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="#" target="_blank" title="Pinterest" rel="nofollow" class="pinterest"><i class="fa fa-pinterest"></i></a></li>        
    </ul>
              <div class="clearfix"></div>
</div>
						</div>
					</div>
                    <div class="clearfix"></div>
					</div>
                </div>
				
		
                
				</div>
            <div class="col-md-3">
                       <div class="row">
                           <span class="post-text">Recent Post</span>
                           <br>
               <div class=" blog-sec" data-aos="fade-right">
				<div class="blog-contant listing-blog">
                    <div class="col-xs-12  about-thamble">
<!--
                        <a href="#">
                        <img src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                        
                            <h4>Amazon Polly Wordpress Plugin - Turn Your Blog Posts Into Podcasts And Audio</h4>
                            
                        <div class="clearfix"></div>
                        </a>
                        
-->
                        <?php get_featured_post(); ?>
							
                      
                        
					</div>
                     
                     
                  
                  <div class="clearfix"></div>
					</div>
                   
                </div>
               
        
               
               
               
               </div></div>
           </div>
		   
		  
    </div>
</div>
	
</div>
