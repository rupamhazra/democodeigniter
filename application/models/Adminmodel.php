<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model{

	function __construct(){

		parent::__construct();

	}

	public function checkLogin($email,$pass){

		$this->db->where("admin_email",$email);

		$this->db->where("admin_password",$pass);

		$sql=$this->db->get('admin')->row_array();

		if($sql){

			$_SESSION['adminLogin']=true;

			$_SESSION['adminName']=$res['admin_name'];

			$_SESSION['adminEmail']=$res['admin_password'];

			return true;

		}

		else{

			return false;

		}

	}

	public function savePageData($data){

		$this->db->insert('pages',$data);

		$lastId=$this->db->insert_id();

		$dataId['page_id']=$lastId;

		$dataId['ip_address']=getenv('REMOTE_ADDR');

		$this->db->insert('page_content',$dataId);

		$this->db->insert('page_meta',$dataId);

		$this->db->insert('page_banner',$dataId);



	}

	public function getParentList(){

		$this->db->where('is_active','active');

		$res=$this->db->get('pages');

		return $res->result_array();

	}

	public function getParentListAll(){

		$res=$this->db->get('pages');

		return $res->result_array();

	}

	public function chage_page_status($id,$data){

		$this->db->where('page_id',$id);

		$this->db->update('pages',$data);

	}

	public function getPageById($id){

		$this->db->where('page_id',$id);

		$res=$this->db->get('pages');

		return $res->row_array();

	}

	public function delete_page($id){

		$this->db->where('page_id',$id);

		$this->db->delete('pages');

		$this->db->where('page_id',$id);

		$this->db->delete('page_content');

		$this->db->where('page_id',$id);

		$this->db->delete('page_banner');

		$this->db->where('page_id',$id);

		$this->db->delete('page_meta');

	}

	public function updatePageData($id,$data){

		$this->db->where('page_id',$id);

		$this->db->update('pages',$data);

	}

	public function update_content($id,$data){

		$this->db->where('page_id',$id);

		$this->db->update('page_content',$data);

	}

	public function get_page_content($id){

		$this->db->where('page_id',$id);

		$res=$this->db->get('page_content');

		return $res->row_array();

	}

	public function update_banner($id,$data){

		$this->db->where('page_id',$id);

		$this->db->update('page_banner',$data);

	}

	public function get_page_banner($id){

		$this->db->where('page_id',$id);

		$res=$this->db->get('page_banner');

		return $res->row_array();

	}

	public function remove_banner($id){

		$data['banner_path']=NULL;

		$this->db->where('page_id',$id);

		$this->db->update('page_banner',$data);

	}

	public function get_meta_by_id($id){

		$this->db->where('page_id',$id);

		$res=$this->db->get('page_meta');

		return $res->row_array();

	}

	public function update_page_meta($id,$data){

		$this->db->where('page_id',$id);

		$this->db->update('page_meta',$data);

	}

	public function get_contacts(){

		$this->db->order_by('contact_date','desc');

		$res=$this->db->get('contact');

		return $res->result_array();

	}

	public function delete_contact($id){

		$this->db->where('contact_id',$id);

		$this->db->delete('contact');

	}

	public function track_list(){
		$date = date("Y-m-d");
		$day_before = date( 'Y-m-d 00:00:00', strtotime( $date . ' -3 day' ) );
		$this->db->order_by("track_id", "desc");
		$this->db->limit(50);
		$res=$this->db->get('page_tracker');
		return $res->result_array();
	}

	public function delete_track($id){

		$this->db->where('track_id',$id);

		$this->db->delete('page_tracker');

	}
	
	public function get_all_homeaboutcontents(){
		$res=$this->db->get('home_about_content');
		return $res->result_array();
	}
	
	public function saveHomeAboutContent($data){
		$this->db->insert('home_about_content',$data);
		$lastId=$this->db->insert_id();
		//$blogMeta['blog_id']=$lastId;
		//$this->db->insert('blog_meta',$blogMeta);
		/* $dataId['page_id']=$lastId;
		$dataId['ip_address']=getenv('REMOTE_ADDR');
		$this->db->insert('page_content',$dataId);
		$this->db->insert('page_meta',$dataId);
		$this->db->insert('page_banner',$dataId); */
		
	}

	public function getHomeAboutContentById($id){
		$this->db->where('home_about_content_id',$id);
		$res=$this->db->get('home_about_content');
		return $res->row_array();
	}
	
	public function update_home_about_content($id,$data){
		$this->db->where('home_about_content_id',$id);
		$this->db->update('home_about_content',$data);
	}
}

