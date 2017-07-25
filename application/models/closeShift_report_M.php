<?php

class CloseShift_report_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}
	public function index()
	{	
		$this->db->select('clsft_id,clsft_date,staff_name,cash_usd,cash_riel,exchange_usd,exchange_riel,open_bal_usd,open_bal_riel,ending_bal_usd,ending_bal_riel');			
		$this->db->join('tbl_staff','tbl_staff.staff_id=tbl_closeshift.staff_id','left');
		$query=$this->db->get('tbl_closeshift');
		return $query->result();
	}
	public function search()
	{
		$from=$this->input->post("txtFrom");
		$to=$this->input->post("txtTo");
		$dateFrom=date("Y/m/d",strtotime($from));
		$dateTo=date("Y/m/d",strtotime($to));
		$valFrom=str_ireplace("/","-",$dateFrom);
		$valTo=str_ireplace("/","-",$dateTo);
		if($this->input->post("txtTo")=="" AND $this->input->post("txtFrom")!="")
		{
			$this->db->select('clsft_id,clsft_date,staff_name,cash_usd,cash_riel,exchange_usd,exchange_riel,open_bal_usd,open_bal_riel,ending_bal_usd,ending_bal_riel');			
			$this->db->join('tbl_staff','tbl_staff.staff_id=tbl_closeshift.staff_id','left');
			$this->db->like('clsft_date',$valFrom);		
			$query=$this->db->get('tbl_closeshift');
			return $query->result();	
		}
		else if($this->input->post("txtFrom")=="" AND $this->input->post("txtTo")==""){redirect('closeShift_report_C/index');}
		else
		{
			$query=$this->db->query("SELECT clsft_id,clsft_date,staff_name,cash_usd,cash_riel,exchange_usd,exchange_riel,open_bal_usd,open_bal_riel,ending_bal_usd,ending_bal_riel FROM tbl_closeshift LEFT JOIN tbl_staff ON tbl_closeshift.staff_id=tbl_staff.staff_id where substring(clsft_date,1,10) between '$valFrom' and '$valTo'");											
			return $query->result();			
		}					
	}
	public function delete($id)
	{		
		$this->db->where('clsft_id',$id);
		$this->db->delete('tbl_closeshift');
	}			
}