<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogmanager extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Blogmodel','blogmodel');
	}
	public function index(){
		$data=array();
		$data['parentList']=$this->blogmodel->get_all_blog_category();
		$this->template->load('adminTemplate','admin/blogcategorylist',$data);
	}
	
	
	public function addBlogCategory(){
		$data=array();
		$data['parentList']=$this->blogmodel->getParentList();
		$this->template->load('adminTemplate','admin/addblogcategory',$data);
	}
	 public function saveBlogCategory(){
		$data['category_name']=$this->input->post('inputName');
		$data['category_url']=$this->input->post('inputUrl');
		$data['parent_id']=$this->input->post('inputParent');
		$data['is_active']='active';
		$data['ip_address']=getenv('REMOTE_ADDR');
		$this->blogmodel->saveBlogCategoryData($data);
		redirect(base_url('admin/blog-category'));
	}
	public function addBlog(){
		//echo "test";
		//print_r($_POST);
		//exit;
		
		$data=array();
		$data['blogCategoryList']=$this->blogmodel->getParentList();
		if($this->input->post('blogAdd') && $this->input->post('blogAdd')==1){
			//echo "hhh";
			$dataSave['blog_category_id']=$this->input->post('inputBlogCategory');
			$dataSave['blog_title']=$this->input->post('inputBlogTitle');
			$dataSave['blog_url']=$this->input->post('inputBlogUrl');
			$dataSave['blog_content']=$this->input->post('inputContent');
			$lPicture = '';
			$sPicture='';
			if(!empty($_FILES['inputLargeImage']['name'])){
				
                $config['upload_path'] = 'uploads/blog_images';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = "large".time().$_FILES['inputLargeImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
               
				
                if($this->upload->do_upload('inputLargeImage')){
					
                    $uploadData = $this->upload->data();
                    $lPicture = $config['file_name'];
					$r=$this->_create_thumbnail($uploadData['file_name']);
					if($r){
						$smPicture=$uploadData['raw_name'];
						//$file['file_name']=$uploadData['raw_name'];
                		$file=$uploadData['file_ext'];
                		$sPicture = $smPicture.'_thumb'.$file;
                			/*$file['file_ext']=$file_info['file_ext'];
                			return $file;*/
					}
            		//$=$this->_create_thumbnail1($file_info['file_name']);
					
                }
				else{
					 $error = array('error' => $this->upload->display_errors());
                     $lPicture = '';
                }
            }
			else
			{
                $lPicture = '';
            }
			
			//$sPicture = $lPicture;
			
			$dataSave['blog_large_image']=$lPicture;
			$dataSave['blog_small_image']=$sPicture;
			$dataSave['blog_image_alt']=$this->input->post('inputImageAlt');
			$dataSave['date_created']=date('Y-m-d H:i:s');
			$dataSave['is_active']='active';
			$dataSave['is_featured']='1';
			//print_r($dataSave);die;
			$this->blogmodel->saveBlog($dataSave);
			redirect(base_url('admin/blog-list'));
		}
		else{
			$this->template->load('adminTemplate','admin/blogcontent',$data);
		}
	}
	
    
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/blog_images/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='uploads/blog_images/_thumb/';
        $config['width'] = 154;
        $config['height'] = 121;
        $this->load->library('image_lib', $config); 
        if($this->image_lib->resize()) return true;
	}
	
	
	
	
	
	public function blogList(){
		$data=array();
		$data['blogList']=$this->blogmodel->get_all_blogs();
		$this->template->load('adminTemplate','admin/bloglist',$data);
	}
	public function change_blog_status($id){
		$blog=$this->blogmodel->getBlogById($id);
		if($blog['is_active']=='active')
			$data['is_active']='inactive';
		else
			$data['is_active']='active';
		$this->blogmodel->change_blog_status($id,$data);
		redirect(base_url('admin/blog-list'));
	}
	public function delete_blog($id){
		$this->load->helper('file');
		$blog=$this->blogmodel->getBlogById($id);
		/* $lImage='./uploads/blog_images/'.$blog['blog_large_image'];
		$sImage='./uploads/blog_images/'.$blog['blog_small_image']; */
		$lImage=base_url('uploads/blog_images').'/'.$blog['blog_large_image'];
		$sImage=base_url('uploads/blog_images').'/'.$blog['blog_small_image'];
		 unlink($lImage);
		unlink($sImage); 
		$this->blogmodel->delete_blog($id);
		redirect(base_url('admin/blog-list'));
	}
	

	
	public function upload_image($fileName,$uploadPath){
		//Check whether user upload picture
		
            if(!empty($fileName)){
				
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time().$fileName;
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('inputImage')){
                    $uploadData = $this->upload->data();
                    $picture = $config['file_name'];
                }else{
					 $error = array('error' => $this->upload->display_errors());
					 print_r($error);
					 die;
                    $picture = '';
                }
            }else{
                $picture = '';
            }
			return $picture;
	}
	public function changeBlogCategoryStatus($id){
		$page=$this->blogmodel->getBlogCategoryById($id);
		if($page['is_active']=='active')
			$data['is_active']='inactive';
		else
			$data['is_active']='active';
		$this->blogmodel->change_blog_category_status($id,$data);
		redirect(base_url('admin/blog-category'));
	}
		public function deleteBlogCategory($id){
		$this->blogmodel->delete_blog_category($id);
		redirect(base_url('admin/blog-category'));
	}
	public function editBlogCategory($id){
		$data=array();
		$data['blogCategoryList']=$this->blogmodel->getParentList();
		$data['blogCategory']=$this->blogmodel->getBlogCategoryById($id);
		$this->template->load('adminTemplate','admin/editblogcategory',$data);
	}
	public function updateBlog($id){
		$data=array();
		$data['blogCategoryList']=$this->blogmodel->getParentList();
		$data['blog']=$this->blogmodel->getBlogById($id);
		if($this->input->post('editBlog')){
			$dataSave['blog_category_id']=$this->input->post('inputBlogCategory');
			$dataSave['blog_title']=$this->input->post('inputBlogTitle');
			$dataSave['blog_url']=$this->input->post('inputBlogUrl');
			$dataSave['blog_content']=$this->input->post('inputContent');
			if(!empty($_FILES['inputLargeImage']['name'])){
				
                $config['upload_path'] = 'uploads/blog_images';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time().$_FILES['inputLargeImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('inputLargeImage')){
                    $uploadData = $this->upload->data();
                    $lPicture = $config['file_name'];
                }else{
					 $error = array('error' => $this->upload->display_errors());
					 print_r($error);
					 die;
                    $lPicture = '';
                }
				$dataSave['blog_large_image']=$lPicture;
            }
			/*if(!empty($_FILES['inputSmallImage']['name'])){
				
                $config['upload_path'] = 'uploads/blog_images';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time().$_FILES['inputSmallImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('inputSmallImage')){
                    $uploadData = $this->upload->data();
                    $sPicture = $config['file_name'];
                }else{
					 $error = array('error' => $this->upload->display_errors());
					 print_r($error);
					 die;
                    $sPicture = '';
                }
				
				$dataSave['blog_small_image']=$sPicture;
            }*/
			
			$dataSave['blog_image_alt']=$this->input->post('inputImageAlt');
			/* $dataSave['date_created']=date('Y-m-d H:i:s');
			$dataSave['is_active']='active';
			$dataSave['is_featured']='1'; */
			$this->blogmodel->update_blog($id,$dataSave);
			redirect(base_url('admin/blog-list'));
		}
		else{
			$this->template->load('adminTemplate','admin/editblogcontent',$data);
		}
	}
public function updateBlogCategory($id){
		$data['category_name']=$this->input->post('inputName');
		$data['category_url']=$this->input->post('inputUrl');
		$data['parent_id']=$this->input->post('inputParent');
		$data['ip_address']=getenv('REMOTE_ADDR');
		$this->blogmodel->updateblogCategoryData($id,$data);
		redirect(base_url('admin/blog-category'));
	}
	public function updateBlogMeta($id){
		$data=array();
		$data['blog']=$this->blogmodel->get_meta_by_id($id);
		$data['blogs']=$this->blogmodel->getblogById($id);
		if(($this->input->post('metaUpdateId')) && $this->input->post('metaUpdateId') > 0){
			$dataMeta['blog_title']=trim($this->input->post('inputTitle'));
			$dataMeta['meta_description']=trim($this->input->post('inputMetaDesc'));
			$dataMeta['meta_keyword']=trim($this->input->post('inputMetaKeyWord'));
			$dataMeta['meta_robot']=trim($this->input->post('inputMetaRobot'));
			$dataMeta['meta_revisit_after']=trim($this->input->post('inputRevisitAfter'));
			$dataMeta['canonical_link']=trim($this->input->post('inputCanonicalLink'));
			$dataMeta['og_locale']=trim($this->input->post('inputOglocale'));
			$dataMeta['og_type']=trim($this->input->post('inputOgType'));
			$dataMeta['og_image']=trim($this->input->post('inputOgImage'));
			$dataMeta['og_title']=trim($this->input->post('inputOgTitle'));
			$dataMeta['og_description']=trim($this->input->post('inputOgDescription'));
			$dataMeta['og_url']=trim($this->input->post('inputOgUrl'));
			$dataMeta['og_site_name']=trim($this->input->post('inputOgSiteName'));
			$dataMeta['extraheadcode']=trim($this->input->post('inputExtraHeadCode'));
			$this->blogmodel->update_blog_meta($id,$dataMeta);
			$this->session->set_flashdata('msg','Meta information updated successfully');
			redirect(base_url('admin/blog-list'));
		}
		else{
			$this->template->load('adminTemplate','admin/blog_meta',$data);
		}
	}
		
		public function getMetaDetails($blogId=false) {
		$metaString = "";
		$blogId = 10;
		 if($blogId){
		 		$metaVal =  $this->blogmodel->get_meta_by_id($blogId);

					if($metaVal['page_title'])
						 $metaString = $metaString."<title>".$metaVal['page_title']."</title>".PHP_EOL;

					if( $metaVal['meta_description'])
						$metaString = $metaString.'<meta name="description" content="'.$metaVal["meta_description"].'" />'.PHP_EOL;
						
					if( $metaVal['blog_title'])
						$metaString = $metaString.'<meta name="title" content="'.$metaVal["blog_title"].'" />'.PHP_EOL;

					if( $metaVal['meta_keyword'])
						$metaString = $metaString.'<meta name="keywords" content="'.$metaVal['meta_keyword'].'" />'.PHP_EOL;
					if( $metaVal['meta_robot'])
						$metaString = $metaString.'<meta name="robots" content="'.$metaVal['meta_robot'].'" />'.PHP_EOL;
					if( $metaVal['meta_revisit_after'])
						$metaString = $metaString.'<meta name="revisit-after" content="'.$metaVal['meta_revisit_after'].'" />'.PHP_EOL;
					if( $metaVal['canonical_link'])
						$metaString = $metaString.'<link rel="canonical" href="'.$metaVal['canonical_link'].'"/>'.PHP_EOL;
					if( $metaVal['og_locale'])
						$metaString = $metaString.'<meta property="og:locale" content="'.$metaVal['og_locale'].'" />'.PHP_EOL;
					if( $metaVal['og_type'])
						$metaString = $metaString.'<meta property="og:type" content="'.$metaVal['og_type'].'"/>'.PHP_EOL;
					if( $metaVal['og_image'])
						$metaString = $metaString.'<meta property="og:image" content="'.$metaVal['og_image'].'" />'.PHP_EOL;
					if( $metaVal['og_title'])
						$metaString = $metaString.'<meta property="og:title" content="'.$metaVal['og_title'].'"  />'.PHP_EOL;
					if( $metaVal['og_description'])
						$metaString = $metaString.'<meta property="og:description" content="'.$metaVal['og_description'].'" />'.PHP_EOL;
					if($metaVal['og_url'])
						$metaString = $metaString.'<meta property="og:url" content="'.$metaVal['og_url'].'"/>'.PHP_EOL;
					if( $metaVal['og_site_name'])
						$metaString = $metaString.'<meta property="og:site_name" content="'.$metaVal['og_site_name'].'" />'.PHP_EOL;

					if( $metaVal['msvalidate'])
						$metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal['msvalidate'].'" />'.PHP_EOL;

					if( $metaVal['p_domain_verify'])
						$metaString = $metaString.'<meta name="p:domain_verify" content="'.$metaVal['p_domain_verify'].'"/>'.PHP_EOL;

					if( $metaVal['icbm'])
						$metaString = $metaString.'<meta name="ICBM" content="'.$metaVal['icbm'].'" />'.PHP_EOL;

					if( $metaVal['alexaverifyid'])
						$metaString = $metaString.'<meta name="alexaVerifyID" content="'.$metaVal['alexaverifyid'].'"/>'.PHP_EOL;

					if( $metaVal['dc_title'])
						$metaString = $metaString.'<meta name="DC.title" content="'.$metaVal['dc_title'].'" />'.PHP_EOL;

					if( $metaVal['geo_region'])
						$metaString = $metaString.'<meta name="geo.region" content="'.$metaVal['geo_region'].'" />'.PHP_EOL;

					if( $metaVal['geo_placename'])
						$metaString = $metaString.'<meta name="geo.placename" content="'.$metaVal['geo_placename'].'" />'.PHP_EOL;

					if( $metaVal['geo_position'])
						$metaString =$metaString. '<meta name="geo.position" content="'.$metaVal['geo_position'].'" />'.PHP_EOL;

					if( $metaVal['place_location_latitude'])
						$metaString =$metaString. '<meta property="place:location:latitude" content="'.$metaVal['place_location_latitude'].'" />'.PHP_EOL;

					if( $metaVal['place_location_longitude'])
						$metaString =$metaString. '<meta property="place:location:longitude" content="'.$metaVal['place_location_longitude'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_street_address'])
						$metaString =$metaString. '<meta property="business:contact_data:street_address" content="'.$metaVal['business_contact_street_address'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_locality'])
						$metaString =$metaString. '<meta property="business:contact_data:locality" content="'.$metaVal['business_contact_locality'].'" />'.PHP_EOL ;

					if( $metaVal['business_contact_postal_code'])
						$metaString =$metaString. '<meta property="business:contact_data:postal_code" content="'.$metaVal['business_contact_postal_code'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_country_name'])
						$metaString =$metaString. '<meta property="business:contact_data:country_name" content="'.$metaVal['business_contact_country_name'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_email'])
						$metaString =$metaString. '<meta property="business:contact_data:email" content="'.$metaVal['business_contact_email'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_phone_number'])
						$metaString =$metaString. '<meta property="business:contact_data:phone_number" content="'.$metaVal['business_contact_phone_number'].'" />'.PHP_EOL;

					if( $metaVal['business_contact_website'])
						$metaString =$metaString. '<meta property="business:contact_data:website" content="'.$metaVal['business_contact_website'].'" />'.PHP_EOL;

					if( $metaVal['twitter_card'])
						$metaString =$metaString. '<meta name="twitter:card" content="'.$metaVal['twitter_card'].'" />'.PHP_EOL;

					if( $metaVal['twitter_description'])
						$metaString =$metaString. '<meta name="twitter:description" content="'.$metaVal['twitter_description'].'" />'.PHP_EOL;

					if( $metaVal['twitter_title'])
						$metaString =$metaString. '<meta name="twitter:title" content="'.$metaVal['twitter_title'].'" />'.PHP_EOL;

					if( $metaVal['twitter_site'])
						$metaString =$metaString. '<meta name="twitter:site" content="'.$metaVal['twitter_site'].'" />'.PHP_EOL;

					if( $metaVal['twitter_image'])
						$metaString =$metaString. '<meta name="twitter:image" content="'.$metaVal['twitter_image'].'" />'.PHP_EOL;

					if($metaVal['twitter_creator'])
						$metaString =$metaString. '<meta name="twitter:creator" content="'.$metaVal['twitter_creator'].'" />'.PHP_EOL;
 					if( $metaVal['extraheadcode'])
						$metaString = $metaString.$metaVal['extraheadcode'];
 				return stripslashes($metaString);
		 }else{
		 	return $metaString;
		 }

	}
		
		/* public function updateContent($id){
		$data=array();
		if(($this->input->post('updateId')) && $this->input->post('updateId') > 0){
			$data['page_content']=$this->input->post('inputContent');
			$data['ip_address']=getenv('REMOTE_ADDR');
			$this->adminmodel->update_content($id,$data);
			$this->session->set_flashdata('msg','Content updated successfully.');
			redirect(base_url('admin-dashboard'));
		}
		else{
			$data['page']=$this->adminmodel->get_page_content($id);
			$data['page_details']=$this->adminmodel->getPageById($id);
			$this->template->load('adminTemplate','admin/content.php',$data);
		}
	}
	public function updateBanner($id){
		$data=array();
		if(($this->input->post('updateId')) && $this->input->post('updateId') > 0){
			$data['banner_content']=$this->input->post('inputContent');
			$data['ip_address']=getenv('REMOTE_ADDR');
			
            
            //Check whether user upload picture
            if(!empty($_FILES['inputImage']['name'])){
				
                $config['upload_path'] = 'uploads/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = time(). $_FILES['inputImage']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('inputImage')){
                    $uploadData = $this->upload->data();
                    $picture = time().$uploadData['file_name'];
                }else{
					
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            
            //Prepare array of user data
            $bannerData = array(
                'banner_content' => $this->input->post('inputContent'),
                'ip_address' => getenv('REMOTE_ADDR'),
                'banner_path' => $picture
            );
			$this->adminmodel->update_banner($id,$bannerData);
			$this->session->set_flashdata('msg','Banner updated successfully.');
			redirect(base_url('admin-dashboard'));
       
    }
		else{
			$data['page']=$this->adminmodel->get_page_banner($id);
			$data['page_details']=$this->adminmodel->getPageById($id);
			$this->template->load('adminTemplate','admin/banner.php',$data);
		}
	}
	public function  removeBanner($id){
		$pageBanner=$this->adminmodel->get_page_banner($id);
		if($pageBanner['banner_path']!=NULL){
			$path=FCPATH .'uploads/banner/'.$pageBanner['banner_path'];
			
			$this->load->helper("file");
			delete_files($path);
			$this->adminmodel->remove_banner($id);
		$this->session->set_flashdata('msg','Banner removed successfully');
		redirect(base_url('admin-dashboard'));
		}
		else{
		redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function updatePageMeta($id){
		$data=array();
		$data['page']=$this->adminmodel->get_meta_by_id($id);
		$data['pages']=$this->adminmodel->getPageById($id);
		if(($this->input->post('metaUpdateId')) && $this->input->post('metaUpdateId') > 0){
			$dataMeta['page_title']=$this->input->post('inputTitle');
			$dataMeta['meta_description']=$this->input->post('inputMetaDesc');
			$dataMeta['meta_keyword']=$this->input->post('inputMetaKeyWord');
			$dataMeta['meta_robot']=$this->input->post('inputMetaRobot');
			$dataMeta['meta_revisit_after']=$this->input->post('inputRevisitAfter');
			$dataMeta['canonical_link']=$this->input->post('inputCanonicalLink');
			$dataMeta['og_locale']=$this->input->post('inputOglocale');
			$dataMeta['og_type']=$this->input->post('inputOgType');
			$dataMeta['og_image']=$this->input->post('inputOgImage');
			$dataMeta['og_title']=$this->input->post('inputOgTitle');
			$dataMeta['og_description']=$this->input->post('inputOgDescription');
			$dataMeta['og_url']=$this->input->post('inputOgUrl');
			$dataMeta['og_site_name']=$this->input->post('inputOgSiteName');
			$dataMeta['extraheadcode']=$this->input->post('inputExtraHeadCode');
			$this->adminmodel->update_page_meta($id,$dataMeta);
			$this->session->set_flashdata('msg','Meta information updated successfully');
			redirect(base_url('admin-dashboard'));
		}
		else{
			$this->template->load('adminTemplate','admin/page_meta',$data);
		}
	} */
}