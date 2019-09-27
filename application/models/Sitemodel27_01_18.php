<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sitemodel extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	public function get_page_by_url($url){
		$sql="SELECT p1.*,p2.*,p3.* FROM `pages` as p1 LEFT OUTER JOIN page_banner AS p2 ON p1.page_id = p2.page_id LEFT OUTER JOIN page_content AS p3 ON p1.page_id = p3.page_id WHERE p1.page_url ='". $url ."'";
		$res=$this->db->query($sql);
		return $res->row_array();
	}
	public function get_meta_info($id){
		$this->db->where('page_id',$id);
		$res=$this->db->get('page_meta');
		return $res->row_array();
	}
	public function save_contact($data){
		$this->db->insert('contact',$data);
	}
	public function getPagesAsMenu($parent,$position){
		 $sql='SELECT m.page_id, m.page_name, m.page_url,m.parent_id, D.Count,D.page_url as url
		FROM `pages` m
		LEFT OUTER JOIN (SELECT `parent_id`,`page_url`, COUNT(*) AS Count FROM `pages` GROUP BY `parent_id`) D
		ON m.page_id = D.parent_id  WHERE m.is_active="active" and m.location="header" and m.parent_id=' . $parent.' order by m.position asc'  ;
		//$sql='select * from page_menu where position=2 OR position=3';
		$result=$this->db->query($sql);
		return $result->result_array();
	}
	public function getParentUrl($id){
		$this->db->where('page_id',$id);
		$res=$this->db->get('pages')->row_array();
		return $res['page_url'];
	}
	public function get_footer_menu(){
		$this->db->where('is_active','active');
		$this->db->where('page_url!=','digital-marketing');
		$this->db->where('parent_id','0');
		$res=$this->db->get('pages');
		return $res->result_array();
	}
	public function get_services(){
		$this->db->where('is_active','active');
		$this->db->where('parent_id','3');
		$res=$this->db->get('pages');
		return $res->result_array();
	}


}
