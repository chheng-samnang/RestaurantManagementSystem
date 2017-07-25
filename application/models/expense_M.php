<?php

class Expense_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}	
	public function index()
	{				
		$this->db->where('key_type','expense');
		$query=$this->db->get('tbl_sysdata');		
		return $query->result();			
	}
	public function insert()
	{
		#auto key_code				
		$query=$this->db->get('tbl_sysdata');
		if(!$query->last_row()){$id=0;}
		else{$id=$query->last_row()->key_id;}					
		$key_id=$id+1;
		$data= array('key_data' =>$this->input->post('txtName')
					,'key_data1' =>$this->input->post('txtQty')
					,'key_data2' =>$this->input->post('txtDolla')
					,'key_desc' =>$this->input->post('txtReil')
					,'user_crea'=>$this->session->userdata('userLogin')
                    ,'date_crea'=>date('Y-m-d H:i:s',now())
                    ,'key_type' =>'expense'
					,'key_code' =>'kh0'.$key_id);       
        $this->db->insert('tbl_sysdata',$data);                     
	}
	public function delete($id)
	{
		$this->db->where('key_id',$id);
		$this->db->delete('tbl_sysdata');
	}
	public function edit_validation($id)
	{
		$this->db->where('key_id',$id);
		$query=$this->db->get('tbl_sysdata');
		return $query->row();
	}
	public function change($id)
	{	
	 	$data=array('key_data'=>$this->input->post('txtName'),
                    'key_data1'=>$this->input->post('txtQty'),
                    'key_data2'=>$this->input->post('txtDolla'),
                    'key_desc' =>$this->input->post('txtReil'),                  
                    'user_updt'=>$this->session->userdata('userLogin'),
                    'date_updt'=>date('Y-m-d H:i:s',now())
                );
		$this->db->where('key_id',$id);
		$this->db->update('tbl_sysdata',$data);
	}	
}