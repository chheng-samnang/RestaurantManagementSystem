<?php

class Customer_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}
	public function index()
	{				
		$query=$this->db->get('tbl_customer');
		return $query->result();
	}
	public function add()
	{
		$data=array('cus_name'=>$this->input->post('txtCustomerName'),
                    'desc'=>$this->input->post('tarearDesc'),
                    'discount'=>$this->input->post('txtDiscount'),
                    'user_crea'=>$this->session->userdata('userLogin'),
                    'date_crea'=>date('Y-m-d H:i:s',now())
                    );  
		$this->db->insert('tbl_customer',$data);
	}
	public function delete($cus_id)
	{
		$this->db->where('cus_id',$cus_id);
		$this->db->delete('tbl_customer');
	}
	public function edit_validation($cus_id)
	{		        
		$this->db->where('cus_id',$cus_id);
		$query=$this->db->get('tbl_customer');
		return $query->row();
	}
	public function change($cus_id)
{	
	 $data=array('cus_name'=>$this->input->post('txtCustomerName'),
                    'desc'=>$this->input->post('tarearDesc'),
                    'discount'=>$this->input->post('txtDiscount'),
                    'user_updt'=>$this->session->userdata('userLogin'),
                    'date_updt'=>date('Y-m-d H:i:s',now())
                );
		$this->db->where('cus_id',$cus_id);
		$this->db->update('tbl_customer',$data);
	}	
}