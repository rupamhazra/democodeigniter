<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmanager extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Adminmodel','adminmodel');
	}
	public function index(){
		if(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)
			redirect(base_url('admin-dashboard'));
		else
			$this->load->view('admin/login');
	}

	public function doLogin(){
		$email=$this->input->post('inputEmail');
		$pass=md5($this->input->post('inputPassword'));
		$res=$this->adminmodel->checkLogin($email,$pass);
		if($res){
			redirect(base_url('admin-dashboard'));
		}
		else{
			$this->session->set_flashdata("login_error","Login failed! Provide actual login credentials.");
			redirect(base_url('admin'));
		}
	}
	public function logout(){
		session_destroy();
		redirect(base_url('admin'));
	}
	public function dashboard()
	{
		$data=array();
		$data['parentList']=$this->adminmodel->getParentListAll();
		if($_SESSION['adminLogin']==true)
			$this->template->load('adminTemplate','admin/dashboard',$data);
		else
			redirect(base_url('admin'));
	}
	public function addPage(){
		$data=array();
		$data['parentList']=$this->adminmodel->getParentList();
		$this->template->load('adminTemplate','admin/addpage',$data);
	}
	public function savePage(){
		$data['page_name']=$this->input->post('inputName');
		$data['page_url']=$this->input->post('inputUrl');
		$data['parent_id']=$this->input->post('inputParent');
		$data['location']=$this->input->post('inputLocation');
		$data['position']=$this->input->post('inputPosition');
		$data['is_active']='active';
		$data['ip_address']=getenv('REMOTE_ADDR');
		$this->adminmodel->savePageData($data);
		redirect(base_url('admin-dashboard'));
	}
	public function chagePageStatus($id){
		$page=$this->adminmodel->getPageById($id);
		if($page['is_active']=='active')
			$data['is_active']='inactive';
		else
			$data['is_active']='active';
		$this->adminmodel->chage_page_status($id,$data);
		redirect(base_url('admin-dashboard'));
	}
	public function deletePage($id){
		$this->adminmodel->delete_page($id);
		redirect(base_url('admin-dashboard'));
	}
	public function editPage($id){
		$data=array();
		$data['parentList']=$this->adminmodel->getParentList();
		$data['page']=$this->adminmodel->getPageById($id);
		$this->template->load('adminTemplate','admin/editpage',$data);
	}
	public function updatePage($id){
		$data['page_name']=$this->input->post('inputName');
		$data['page_url']=$this->input->post('inputUrl');
		$data['parent_id']=$this->input->post('inputParent');
		$data['location']=$this->input->post('inputLocation');
		$data['position']=$this->input->post('inputPosition');
		$data['is_active']='active';
		$data['ip_address']=getenv('REMOTE_ADDR');
		$this->adminmodel->updatePageData($id,$data);
		redirect(base_url('admin-dashboard'));
	}
	public function updateContent($id){
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
                $config['file_name'] = time().$_FILES['inputImage']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('inputImage')){
                    $uploadData = $this->upload->data();
                    $picture = $config['file_name'];
                }else{
					 /* $error = array('error' => $this->upload->display_errors());
					 print_r($error); */
                    $picture = '';
                }
            }else{
                $picture = '';
            }

            //Prepare array of user data
            $bannerData = array(
                'banner_content' => $this->input->post('inputContent'),
                'ip_address' => getenv('REMOTE_ADDR')
            );
						if($picture!=''){
							$bannerData['banner_path']=$picture;
						}
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
			/* echo $path;
			die; */
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
			$dataMeta['page_title']=trim($this->input->post('inputTitle'));
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
			$this->adminmodel->update_page_meta($id,$dataMeta);
			$this->session->set_flashdata('msg','Meta information updated successfully');
			redirect(base_url('admin-dashboard'));
		}
		else{
			$this->template->load('adminTemplate','admin/page_meta',$data);
		}
	}
	public function uploadImage(){
		$data=array();
		if(!empty($_FILES['inputLargeImage']['name'])){

                $config['upload_path'] = 'uploads/images';
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
					 //print_r($error);
					 //die;
                    $lPicture = '';
                }
				redirect(base_url('admin/images'));
            }
			else{
				$this->template->load('adminTemplate','admin/uploadimage',$data);
			}
	}
	
	public function delete_uploaded_video($url){
		$filePath='./uploads/video/'.$url;
		unlink($filePath);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_uploaded_image($url){
		$filePath='./uploads/images/'.$url;
		unlink($filePath);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function contacts(){
		$data=array();
		$data['contactList']=$this->adminmodel->get_contacts();
		$this->template->load('adminTemplate','admin/contact_request',$data);
	}
	public function contact_delete($id){
		$data=array();
		$this->adminmodel->delete_contact($id);
		redirect(base_url('admin/contacts'));
		}
	public function imagelist(){
		$data=array();
		$this->template->load('adminTemplate','admin/image_list',$data);
	}
	public function tracklist(){
		$data=array();
		$data['trackList']=$this->adminmodel->track_list();
		$this->template->load('adminTemplate','admin/track_list',$data);
	}
	public function trackdelete($id){
		$data=array();
		$this->adminmodel->delete_track($id);
		redirect(base_url('admin/tracks'));
		}

	//List videos
	public function videolist(){
		$data=array();
		$this->template->load('adminTemplate','admin/video_list',$data);
		
		
	}
	//upload video
	public function uploadVideo(){
		
		$data=array();
		
		if(!empty($_FILES['inputVideo']['name'])){
				//echo "hhh";
                $config['upload_path'] = 'uploads/video';
                $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4|webm';
                $config['file_name'] = time().$_FILES['inputVideo']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if($this->upload->do_upload('inputVideo')){
                    $uploadData = $this->upload->data();
                    $lPicture = $config['file_name'];
                }else{
					 $error = array('error' => $this->upload->display_errors());
					// print_r($error);
					 //die;
                    $lPicture = '';
                }
				redirect(base_url('admin/videos'));
            }
			else{
				$this->template->load('adminTemplate','admin/uploadvideo',$data);
			}
		
	}
	
	public function addHomeAboutContent(){
		$this->template->load('adminTemplate','admin/homeaboutcontent');
	}
	
	public function saveHomeAboutContent(){
		$data=array();
		//echo "hhi";die;
		//$data['blogCategoryList']=$this->blogmodel->getParentList();
		//if($this->input->post('blogAdd') && $this->input->post('blogAdd')==1){
			//$dataSave['blog_category_id']=$this->input->post('inputBlogCategory');
			$dataSave['home_about_content_title']=$this->input->post('inputTitle');
			//$dataSave['blog_url']=$this->input->post('inputBlogUrl');
			$dataSave['home_about_content']=$this->input->post('inputContent');
			if(!empty($_FILES['inputLargeImage']['name'])){
				
                $config['upload_path'] = 'uploads/home_about_images';
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
            }else{
                $lPicture = '';
            }
			if(!empty($_FILES['inputSmallImage']['name'])){
				
                $config['upload_path'] = 'uploads/home_about_images';
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
            }else{
                $sPicture = '';
            }
			$dataSave['home_about_large_img']=$lPicture;
			$dataSave['home_about_small_img']=$sPicture;
			$dataSave['home_about_img_alt']=$this->input->post('inputImageAlt');
			$dataSave['date_created']=date('Y-m-d H:i:s');
			$dataSave['is_active']='active';
			//$dataSave['is_featured']='1';
			$this->adminmodel->saveHomeAboutContent($dataSave);
			redirect(base_url('admin/home-about-content-list'));
		/*}
		else{
			$this->template->load('adminTemplate','admin/blogcontent',$data);
		}*/
	}
	public function homeAboutContentList(){
		$data=array();
		$data['homeaboutcontentList']=$this->adminmodel->get_all_homeaboutcontents();
		$this->template->load('adminTemplate','admin/homeaboutcontentlist',$data);
	}
	
	public function editHomeAboutContent($id){
		$data=array();
		
		$data['homeaboutcontent']=$this->adminmodel->getHomeAboutContentById($id);
		$this->template->load('adminTemplate','admin/editblogcategory',$data);
	}
	
	public function updateHomeAboutContent($id){
		$data=array();
		//echo "hhh"; die;
		//$data['blogCategoryList']=$this->blogmodel->getParentList();
		$data['homeaboutcontent']=$this->adminmodel->getHomeAboutContentById($id);
		if($this->input->post('editBlog')){
			//$dataSave['blog_category_id']=$this->input->post('inputBlogCategory');
			$dataSave['home_about_content_title']=$this->input->post('inputTitle');
			$dataSave['home_about_content']=$this->input->post('inputContent');
			if(!empty($_FILES['inputLargeImage']['name'])){
				
                $config['upload_path'] = 'uploads/home_about_images';
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
				$dataSave['home_about_large_img']=$lPicture;
            }
			if(!empty($_FILES['inputSmallImage']['name'])){
				
                $config['upload_path'] = 'uploads/home_about_images';
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
				
				$dataSave['home_about_small_img']=$sPicture;
            }
			
			$dataSave['home_about_img_alt']=$this->input->post('inputImageAlt');
			/* $dataSave['date_created']=date('Y-m-d H:i:s');
			$dataSave['is_active']='active';
			$dataSave['is_featured']='1'; */
			$this->adminmodel->update_home_about_content($id,$dataSave);
			redirect(base_url('admin/home-about-content-list'));
		}
		else{
			$this->template->load('adminTemplate','admin/edithomeaboutcontent',$data);
		}
	}
}
