<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blogmodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
    public function saveBlogCategoryData($data){
		$this->db->insert('blog_category',$data);
		
	}
	public function saveBlog($data){
		$this->db->insert('blog_post',$data);
		$lastId=$this->db->insert_id();
		$blogMeta['blog_id']=$lastId;
		$this->db->insert('blog_meta',$blogMeta);
		/* $dataId['page_id']=$lastId;
		$dataId['ip_address']=getenv('REMOTE_ADDR');
		$this->db->insert('page_content',$dataId);
		$this->db->insert('page_meta',$dataId);
		$this->db->insert('page_banner',$dataId); */
		
	}
	public function getParentList(){
		$this->db->where('is_active','active');
		$res=$this->db->get('blog_category');
		return $res->result_array();
	}
	public function getParentListAll(){
		$res=$this->db->get('pages');
		return $res->result_array();
	}
	public function getBlogList(){
		$this->db->where('is_active','active');
		$this->db->order_by('blog_post_id', 'desc');
		$res=$this->db->get('blog_post');
		return $res->result_array();
	}	
	public function getBlogListByCategory($url){
		//$this->db->where('is_active','active');
		$this->db->where('category_url',$url);
		$res=$this->db->get('blog_category')->row();
		$categoryId=$res->blog_category_id;
		$this->db->where('blog_category_id',$categoryId);
		$res=$this->db->get('blog_post');
		return $res->result_array();
	}
	public function getFeaturedPost(){
		$this->db->where('is_featured','1');
		$this->db->order_by('blog_post_id', 'desc');
		$this->db->limit(3);
		$res=$this->db->get('blog_post');
		return $res->result_array();
		
	}
	public function get_blog_by_url($url){
		$this->db->where('blog_url',$url);
		$res=$this->db->get('blog_post');
		return $res->row_array();
	}
	public function change_blog_category_status($id,$data){
		$this->db->where('blog_category_id',$id);
		$this->db->update('blog_category',$data);
	}
	public function getBlogCategoryById($id){
		$this->db->where('blog_category_id',$id);
		$res=$this->db->get('blog_category');
		return $res->row_array();
	}
	public function get_all_blog_category(){
		$res=$this->db->get('blog_category');
		return $res->result_array();
	}
	public function getBlogById($id){
		$this->db->where('blog_post_id',$id);
		$res=$this->db->get('blog_post');
		return $res->row_array();
	}
	public function delete_blog($id){
		$this->db->where('blog_post_id',$id);
		$this->db->delete('blog_post');
	}
	public function change_blog_status($id,$data){
		$this->db->where('blog_post_id',$id);
		$this->db->update('blog_post',$data);
	}
	public function get_active_blog_category(){
		$this->db->where('is_active','active');
		$res=$this->db->get('blog_category');
		return $res->result_array();
	}
	public function get_all_blogs(){
		$res=$this->db->get('blog_post');
		return $res->result_array();
	}
	public function get_fabulus_article(){
		$this->db->where('fabulus','1');
		$res=$this->db->get('blog_post');
		return $res->row_array();
	}
	public function delete_blog_category($id){
		$this->db->where('blog_category_id',$id);
		$this->db->delete('blog_category');
		
	}
	public function updateblogCategoryData($id,$data){
		$this->db->where('blog_category_id',$id);
		$this->db->update('blog_category',$data);
	}
	public function update_content($id,$data){
		$this->db->where('page_id',$id);
		$this->db->update('page_content',$data);
	}
	public function update_blog($id,$data){
		$this->db->where('blog_post_id',$id);
		$this->db->update('blog_post',$data);
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
		$this->db->where('blog_id',$id);
		$res=$this->db->get('blog_meta');
		return $res->row_array();
	}
	
	public function update_blog_meta($id,$data){
		$this->db->where('blog_id',$id);
		$this->db->update('blog_meta',$data);
	}
}