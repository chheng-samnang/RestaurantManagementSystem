<?php

class CloseShift_M extends CI_Model
{		
	public function __construct()
	{
		parent:: __construct();		
	}
	public function index()
	{		
		$this->db->select('sta');		
		$query=$this->db->get('tbl_table');
		return $query->row();
	}	
	public function income()
	{		
		$user_id=$this->session->userdata('userLogin');
		$query=$this->db->query("SELECT SUM(ttl_usd) AS usd,SUM(ttl_riel)AS riel,SUM(cash_usd)AS cash_usd,SUM(cash_riel)AS cash_riel,SUM('txtExchange_usd')AS exchange_usd,SUM('txtExchange_riel')AS exchange_riel FROM tbl_receipt WHERE user_crea='$user_id' AND status=0");		
		return $query->row();
	}
	public function balance()
	{		
		$user_id=$this->session->userdata('userLogin');
		$query=$this->db->query("SELECT SUM(open_bal_usd) AS bal_usd,SUM(open_bal_riel)AS bal_riel FROM tbl_balance WHERE staff_id='$user_id' AND status=0");		
		return $query->row();
	}
	public function expense()
	{		
		$user_id=$this->session->userdata('userLogin');
		$query=$this->db->query("SELECT SUM(key_data2) AS expense_usd,SUM(key_desc)AS expense_riel FROM tbl_sysdata WHERE key_type='expense' AND user_crea='$user_id' AND status=0");		
		return $query->row();
	}
	public function add_to_closeShift()
	{		
		$this->db->select('staff_id');
		$this->db->where('user_code',$this->session->userdata('userLogin'));
		$query=$this->db->get('tbl_staff');
		$staff_id=$query->row();
		$data=array('clsft_date' =>date('Y-m-d H:i:s',now('Asia/Phnom_Penh'))
					,'staff_id'=>$staff_id->staff_id
					,'cash_usd'=>$this->input->post('txtCashUsd')
					,'cash_riel'=>$this->input->post('txtCashRiel')
					,'exchange_usd'=>$this->input->post('txtExchange_usd')
					,'exchange_riel'=>$this->input->post('txtExchange_riel')
					,'open_bal_usd'=>$this->input->post('txtOpen_bal_usd')
					,'open_bal_riel'=>$this->input->post('txtOpen_bal_riel')
					,'ending_bal_usd'=>$this->input->post('txtEnding_bal_usd')
					,'ending_bal_riel'=>$this->input->post('txtEnding_bal_riel')
					,'user_crea'=>$this->session->userdata('userLogin')
					,'date_crea'=>date('Y-m-d H:i:s',now('Asia/Phnom_Penh')));
		$this->db->insert('tbl_closeshift',$data);
	}
	public function table3_status()
	{
		$data=array('status' =>1);
		#balance
		$this->db->where('status',0);
		$this->db->where('user_crea',$this->session->userdata('userLogin'));
		$this->db->update('tbl_balance',$data);
		#receipt
		$this->db->where('status',0);
		$this->db->where('user_crea',$this->session->userdata('userLogin'));
		$this->db->update('tbl_receipt',$data);
		#sysdata
		$this->db->where('status',0);
		$this->db->where('user_crea',$this->session->userdata('userLogin'));
		$this->db->where('key_type','expense');
		$this->db->update('tbl_sysdata',$data);
	}	
}