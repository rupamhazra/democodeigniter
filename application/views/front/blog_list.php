<section>
        <div class="container">
            <div class="row">
                <div class="sec-title text-center mb50">
                    <h2 class="color">Latest News</h2>
                    <div class="devider"><img src="<?php echo base_url('assets/img/sm-logo.png');?>" alt=""></div>
                </div>
            <div class="col-md-9">    
                  <?php if(count($blogList)>0){ foreach($blogList as $row){ ?>
                <figure class="team-member col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="our-team">
                        <div class="pic"> 
                         <a href="<?php echo base_url('blog').'/'.$row['blog_url']; ?>"><img class="img-responsive" src="<?php echo base_url('uploads/blog_images').'/'.$row['blog_large_image']; ?>" alt="" ></a>
                        
                        
                        </div>
                        <div class="team-content blog-box">
                          <?php //$row['blog_title']; ?>
                            <h2><?php echo strlen($row['blog_title']) >= 60 ? substr($row['blog_title'], 0, 55) . '...' : $row['blog_title']; ?></h2>
                           <p><?php echo substr($row['blog_content'],0,150); ?>...</p>
                            <ul class="social transition scale0">
                            <?php 
								$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
							//$actual_link;
							?>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
                                return false;" title="Facebook" rel="nofollow" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                
                                <li><a href="https://twitter.com/intent/tweet?url=<?php echo $actual_link; ?>" title="Twitter" class="twitter" onclick="window.open(this.href, encodeURIComponent(document.title) + ': ' + encodeURIComponent(document.URL),'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" title="Google plus" rel="nofollow" class="google"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $actual_link; ?>" 
      onclick="javascript:window.open(this.href,'','width=600,height=600,menubar=no,toolbar=no,resizable=yes,scrollbars=yes');return false;"  rel="nofollow" title="Linkedin" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            
                        <a class="read-more" href="<?php echo base_url('blog').'/'.$row['blog_url']; ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </figure>
  	<?php } } else { echo "<h2>No blog found in this category. </h2>"; } ?>
                </div>
                
<!--    Blog-loop    -->
       
                <div class="col-md-3">  
                
                <div class="left-head-blog">
						
							<div class="left-blog-page">
								<!-- recent start -->
								<div class="left-blog">
									<h3>Recent post</h3>
									<div class="recent-post">
										<!-- start single post -->
                                       
                                         <?php get_featured_post(); ?>
										
										<!-- End single post -->
										
										
										
									</div>
								</div>
								<!-- recent end -->
							</div>
							<div class="left-blog-page">
								<div class="left-blog">
									<h3>categories</h3>
									<ul class="blog-cata">
                                     <?php 
									 	  if(count($blogCategoryList)>0){ 
										  	foreach($blogCategoryList as $blogCat){
											echo "<li>".$blogCat['category_name']."</li>"; 
										 	}
										  }
									 
									 ?>
										
									</ul>
								</div>
							</div>
					
						</div>
                </div> 
            </div>
        </div>
    </section>
    