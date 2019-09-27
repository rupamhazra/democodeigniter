<?php

 function display_menu($parent,$position) {
	 static $i=0;
	 if( $i==0){
		 $cls='class="main-menu clearfix hover-style-one"';
	 }
	 else{
		 $cls='';
	 }
	 $i++;
	$CI = get_instance();
    $CI->load->model('Sitemodel');
    $result = $CI->Sitemodel->getPagesAsMenu($parent,$position);
	if($result){
	echo "<ul ".$cls." >";
	foreach($result as $row){
		if ($row['Count'] > 0) {
            echo "<li><a href='javascript:(void(0))'>" . $row['page_name'] . "</a>";
            display_menu($row['page_id'],$position);
            echo "</li>";
        } elseif ($row['Count']==0) {
			if($row['page_url']=='home')
            echo "<li><a href='". base_url() . "'>" . $row['page_name'] . "</a></li>";
			else
            echo "<li><a href='". base_url(). $row['page_url'] . "'>" . $row['page_name'] . "</a></li>";
        } else;
    }
    echo "</ul>";
	}
	else
		echo '';
}

function popular_post_footer(){
	$CI=get_instance();
	$CI->load->model('Blogmodel');
	$result=$CI->Blogmodel->getFeaturedPost();
	foreach($result as $row){
	echo '                <li>
                  <a href="#">'. $row['blog_title'] .'
                  <span class="post-date">29 August 2014</span></a>
                </li>
				';
			}
}
function get_featured_post(){
	$CI=get_instance();
	$CI->load->model('Blogmodel');
	$result=$CI->Blogmodel->getFeaturedPost();
	$i=0;
	foreach($result as $row){
		if($i==0){
			echo '<div class="recent-single-post">
								<div class="post-img">
									<img  class="img-responsive" src="'. base_url('uploads/blog_images/_thumb').'/'. $row['blog_small_image'].'" alt="" />
								</div>
									<div class="pst-content"><p><a href="'. base_url('blog').'/'.$row['blog_url'].'">'. $row['blog_title'].'</a></p></div>
					</div>';
		}
		else{
			echo '<div class="recent-single-post">
										<div class="post-img">
											<img class="img-responsive" src="'. base_url('uploads/blog_images/_thumb').'/'.$row['blog_small_image'].'" alt="" />
										</div>
										<div class="pst-content"><p><a href="'. base_url('blog').'/'.$row['blog_url'].'">'. $row['blog_title'].'</a></p>			
									</div>
									</div>';
		}
		$i++;
	}
}
function blog_category(){
	$CI=get_instance();
	$CI->load->model('Blogmodel');
	$result=$CI->Blogmodel->get_active_blog_category();
	foreach($result as $row){
		echo '<li><a href="'.base_url('blog').'/'. $row['category_url'].'">'.$row['category_name'].'</a></li>';
	}
}
function footer_menu(){
	$CI=get_instance();
	$CI->load->model('Sitemodel');
	$result=$CI->Sitemodel->get_footer_menu();
	foreach($result as $row){
		if($row['page_url']=='home')
            echo "<li><a href='". base_url() . "'>" . $row['page_name'] . "</a></li>";
			else
            echo "<li><a href='". base_url() . $row['page_url'] . "'>" . $row['page_name'] . "</a></li>";
	}
}
function service_menu(){
	$CI=get_instance();
	$CI->load->model('Sitemodel');
	$result=$CI->Sitemodel->get_services();
	foreach($result as $row){
		echo '<li><a href="'.$row['page_url'].'">'.$row['page_name'].'</a></li>';
	}
}
function displayParent($id){
	$CI = get_instance();
    $CI->load->model('Adminmodel');
    $result = $CI->Adminmodel->getPageById($id);
	echo $result['page_name'];
}
function displayBlogParent($id){
	$CI = get_instance();
    $CI->load->model('Blogmodel');
    $result = $CI->Blogmodel->getBlogCategoryById($id);
	echo $result['category_name'];
}
function get_parent_url($id){
	$CI = get_instance();
    $CI->load->model('Sitemodel');
    $result = $CI->Sitemodel->getParentUrl($id);
	return $result;
}
function get_blog_categroy_url($id){
	$CI = get_instance();
    $CI->load->model('Blogmodel');
    $result = $CI->Blogmodel->getBlogCategoryById($id);
	return $result['category_url'];
}
/* function fabulas_article(){
	$CI=get_instance();
	$CI->load->model('Blogmodel');
	$result=$CI->Blogmodel->get_fabulus_article();
	echo '<div class="post-article-img">
									<img src="'. base_url('uploads/blog-images').'/'.$result['blog_small_image'].'" alt="" />
								</div>
								<h2><a href="#">'.substr($result['blog_content'], 0, 100);.'</a></h2>';
} */
