<?php

class Change_table_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}
	public function index()
	{				
		$this->db->where('sta','Free');
		$query=$this->db->get('tbl_table');
		return $query->result();
	}
	public function update()
	{
		$old_tab_id=$this->input->post('old_tab_id');
		$new_tab_id=$this->input->post('new_tab_id');
		$data = array('tab_id'=>$new_tab_id);
		$this->db->where('tab_id',$old_tab_id);
		$this->db->update('tbl_order_hdr',$data);
		#update tbl_table to Free
		$data = array('sta'=>'Free');
		$this->db->where('tab_id',$old_tab_id);
		$this->db->update('tbl_table',$data);
		$data = array('sta'=>'Busy');
		$this->db->where('tab_id',$new_tab_id);
		$this->db->update('tbl_table',$data);

	}	
}