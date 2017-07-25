<?php

class POS_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();		
	}
	public function index()
	{	
		$date_now=date('Y-m-d',now('Asia/Phnom_Penh'));
		$time_now=date('H:i:s',now('Asia/Phnom_Penh')+(1*60*60));
		$time_one_hour=date('H:i:s',now('Asia/Phnom_Penh')-(1*60*60));
		$query=$this->db->query("SELECT tbl_book.tab_id,time_book,sta,book_id FROM tbl_book LEFT JOIN tbl_table ON tbl_book.tab_id=tbl_table.tab_id WHERE tbl_book.date_crea='$date_now' AND time_book BETWEEN '$time_one_hour' AND '$time_now' AND status='0'");
		$result=$query->result();
		foreach($result as $value)
		{																																
			if($value->sta="Free")
			{
				$data=array('sta' => 'Book');
				$this->db->where('tab_id',$value->tab_id);
				$this->db->update('tbl_table',$data);

				$data1 = array('status'=>'1');
				$this->db->where('book_id',$value->book_id);
				$this->db->update('tbl_book',$data1);
			}																		
		}								
		$query=$this->db->query("SELECT t.*,customer_name,book_id FROM tbl_table t left join tbl_book b on t.tab_id=b.tab_id and b.status is null");
		return $query->result();
	}
	public function tbl_book()
	{		
		$this->db->select("customer_name,tbl_book.tab_id");
		$this->db->join('tbl_table','tbl_table.tab_id=tbl_book.tab_id','left');						
		$query=$this->db->get('tbl_book');
		return $query->result();
	}	
	public function check_status($id)
	{
		$this->db->where('tab_id',$id);
		$this->db->select('sta,tab_name');
		$query=$this->db->get('tbl_table');
		return $query->row();
	}
	public function check_book($id)
	{
		$this->db->where('tab_id',$id);
		$this->db->select('book_id');
		$query=$this->db->get('tbl_book');
		return $query->row();
	}	
}