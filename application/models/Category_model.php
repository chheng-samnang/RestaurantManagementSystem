<?php
class Category_model extends CI_Model
{
	private $table = "tbl_category";
	public function __construct(){
		parent::__construct();
	}
	function index(){
		return $this->db->get("$this->table");
	}
	function insert($param){
		$data = array(
			'cat_name'   => $param['cat_name'],
			'cat_name_kh'=> $param['cat_name_kh'],
			'desc'       => $param['desc'],
			'date_crea'  => date('Y-m-d')
			);
		$this->db->insert("$this->table",$data);
	}
	public function update_validation($cat_id){
		$this->db->where('cat_id',$cat_id);
		$query=$this->db->get("$this->table");
		return $query->row();
	}
	public function update($cat_id, $data){
		$data = array(
				'cat_name'=>$this->input->post('txtcategory_name'),
				'cat_name_kh'=>$this->input->post('category_name_kh'),
				'desc'=>$this->input->post('desciption'),
				'user_updt'=>$this->session->userLogin,
				'date_updt'=>date('Y-m-d H:i:s',now())
				);
		$this->db->where('cat_id',$cat_id);
		$this->db->update("$this->table",$data);

	}
	function delete($cat_id){
		$this->db->where( 'cat_id',$cat_id);
		$this->db->delete("$this->table");

	}
}