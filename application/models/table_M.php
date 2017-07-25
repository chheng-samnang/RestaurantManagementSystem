<?php

class Table_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}
	public function index()
	{				
		$query=$this->db->get('tbl_table');
		return $query->result();
	}	
	public function add()
	{							
		$data=array('tab_name'=>$this->input->post('txtTableName'),                                                
                    'seats'=>$this->input->post('txtSeats'),
                    'price'=>$this->input->post('txtPrice'),                    
                    'sta'=>$this->input->post('radSta'),
                    'user_crea'=>$this->session->userdata('userLogin'),
                    'date_crea'=>date('Y-m-d H:i:s',now())
                    );
		$this->db->insert('tbl_table',$data);			
	}		
	public function get_to_edit($tab_id)
	{
		$this->db->where('tab_id',$tab_id);
		$query=$this->db->get('tbl_table');
		return $query->row();
	}
	public function save_change($tab_id)
	{					
		$data=array('tab_name'=>$this->input->post('txtTableName'),                                                
                'seats'=>$this->input->post('txtSeats'),
                'price'=>$this->input->post('txtPrice'),                    
                'sta'=>$this->input->post('radSta'),
                'user_updt'=>$this->session->userdata('userLogin'),
                'date_updt'=>date('Y-m-d H:i:s',now())
                );
		$this->db->where('tab_id',$tab_id);
		$this->db->update('tbl_table',$data);		
	}
	public function delete($tab_id)
	{
		$this->db->where('tab_id',$tab_id);					
		$this->db->delete('tbl_table');		
	}	
}