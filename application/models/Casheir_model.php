<?php
class Casheir_model extends CI_Model{
	private $table = "tbl_order_det";
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->db->select("*");
		$this->db->from('tbl_order_det');
		$this->db->join('tbl_menu', ' tbl_menu.m_id = tbl_order_det.m_id');
		$query = $this->db->get();
		return $query->result_array();
	}
}