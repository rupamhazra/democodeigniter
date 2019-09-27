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
           
            <div class="row">
                 <div class="col-lg-4 col-lg-offset-4 text-center">  
                    <h1>Blog Posts<span class="ion-minus"></span></h1>
</div> 
            </div> 
        <hr>
                
           <div class="row">
			<div class="col-md-9">
                <?php if(count($blogList)>0){ foreach($blogList as $row){ ?>
			    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-sec" data-aos="fade-right">
				<div class="blog-contant">
                    <div class="col-xs-12  about-thamble">
                        <img src="<?php echo base_url('uploads/blog_images').'/'.$row['blog_small_image']; ?>" alt="" width="100%">
                        
<!--
                        <div class="date-box"><b>25</b>
                        Mar
                        </div>
-->
                        <div class="date-box">
                            <?php echo date('jS  F  ',strtotime($row['date_created']));?>
                        </div>
                        
					</div>
					
					<div class="col-xs-12">
						 <div class="blog-column">
							<h2><a href="<?php echo base_url('blog').'/'.$row['blog_url']; ?>"><?php echo $row['blog_title']; ?></a></h2>
							<p><?php echo substr($row['blog_content'],0,150); ?>...</p>
							<a href="<?php echo base_url('blog').'/'.$row['blog_url']; ?>">Read More</a>
						</div>
					</div>
                    <div class="clearfix"></div>
					</div>
                </div>
				
	<?php } } else echo "<h2>No blog found in this category. </h2>"; ?>
                
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
