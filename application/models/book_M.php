
<?php

class Book_M extends CI_Model
{
	
	public function __construct()
	{
		parent:: __construct();	
	}
	public function index($tab_id)
	{					
		$this->db->select("book_id,customer_name,tab_name,phone,tbl_book.people,time_book,tbl_book.des,tbl_book.user_crea,tbl_book.date_crea,tbl_book.user_updt,tbl_book.date_updt");
		$this->db->join('tbl_table','tbl_table.tab_id=tbl_book.tab_id','left');
		$this->db->where('tbl_book.tab_id',$tab_id);				
		$query=$this->db->get('tbl_book');			
		return $query->result();
	}
	public function add()
	{		
		$tab_id=$this->input->post('txtTabID');
		$time_book=$this->input->post('txtTime');
		$time_book1=date('h:i:s a',strtotime($time_book));				
		$time_two_hour=date('h:i:s a',strtotime($time_book1)+(2*60*60));		

		$query=$this->db->query("SELECT tab_id,time_book FROM tbl_book WHERE tab_id='$tab_id' AND time_book BETWEEN '$time_book1' AND '$time_two_hour'");		
		if($query->num_rows()>0){return $error="error messages";}
		else
		{
			$data = array('customer_name' =>$this->input->post('txtCustomerName')
					,'tab_id'=>$tab_id
					,'phone'=>$this->input->post('txtPhone')
					 ,'people'=>$this->input->post('txtPeople')
					 ,'time_book'=>$time_book
					 ,'des'=>$this->input->post('tarearDesc')
					 ,'user_crea'=>$this->session->userdata('userLogin')
					,'date_crea'=>date('Y-m-d H:i:s',now('Asia/Phnom_Penh')));
			$this->db->insert('tbl_book',$data);			
			redirect('bookController/index/'.$this->input->post('txtTabID')); 			
		}	
		
	}
	public function edit($id)
	{
		$this->db->where('book_id',$id);
		$query=$this->db->get('tbl_book');
		return $query->row();		
	}
	public function select_table_free()
	{
		$this->db->where('sta','Free');
		$query=$this->db->get('tbl_table');
		return $query->result();
	}
	public function edit_validation($id)
	{		
		if($this->input->post('rad')=="")
		{
			$data = array('customer_name' =>$this->input->post('txtCustomerName')					
						,'phone'=>$this->input->post('txtPhone')
						 ,'people'=>$this->input->post('txtPeople')
						 ,'time_book'=>$this->input->post('txtTime')
						 ,'des'=>$this->input->post('tarearDesc')
						 ,'user_updt'=>$this->session->userdata('userLogin')
						,'date_updt'=>date('Y-m-d H:i:s',now('Asia/Phnom_Penh')));
			$this->db->where('book_id',$id);
			$this->db->update('tbl_book',$data);
		}
		else
		{
			$data = array('customer_name' =>$this->input->post('txtCustomerName')
						,'tab_id'=>$this->input->post('rad')					
						,'phone'=>$this->input->post('txtPhone')
						 ,'people'=>$this->input->post('txtPeople')
						 ,'time_book'=>$this->input->post('txtTime')
						 ,'des'=>$this->input->post('tarearDesc')
						 ,'user_updt'=>$this->session->userdata('userLogin')
						,'date_updt'=>date('Y-m-d H:i:s',now('Asia/Phnom_Penh')));
			$this->db->where('book_id',$id);
			$this->db->update('tbl_book',$data);
		}
		#update time book and status
		$now=date('Y-m-d',now('Asia/Phnom_Penh'));
		$query=$this->db->query("SELECT tab_id,time_book FROM tbl_book WHERE date_crea='$now'");
		$result=$query->result();
		foreach($result as $value)
		{						
			$time_book=date("h:i a",strtotime($value->time_book)+(1*60*60));
			$time_now=date('h:i a',now('Asia/Phnom_Penh'));
			if($time_book!=$time_now)
			{
				$data = array('sta' =>'Free');
				$this->db->where('tab_id',$value->tab_id);
				$this->db->update('tbl_table',$data);
			}			
		}
		redirect("bookController/index/".$this->input->post('txtTabID'));

	}
	public function delete($id)
	{		
		$query=$this->db->query("SELECT tab_id FROM tbl_book where book_id=$id");
		$id1=$query->row()->tab_id;		
		#update sta at tbl_table
		$data = array('sta' =>'Free');
		$this->db->where('tab_id',$id1);
		$this->db->update('tbl_table',$data);
		$this->db->where('book_id',$id);		
		$this->db->delete('tbl_book');					
		redirect("index.php/POS_C/index");
	}

}

